<?php 
    class M_kendaraan extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_kendaraan')->result();
        }

        public function dt_kendaraan()
        {
            $this->db->select('k.id_kendaraan, k.nik_tamu, t.nama_tamu, t.jenis_kelamin, t.tgl_lahir, t.no_telp, t.alamat, k.jenis_kendaraan, k.plat_nomor');
            $this->db->from('tb_kendaraan k');
            $this->db->join('tb_tamu t', 'k.nik_tamu = t.nik_tamu');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function dt_kendaraan_insert()
        {
            $data = array(
                'nik_tamu' => $this->input->post('nik_tamu'),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
                'plat_nomor' => $this->input->post('plat_nomor')
            );
            return $this->db->insert('tb_kendaraan', $data);
        }
        
        public function dt_kendaraan_update($id)
        {
            $data = array(
                'nik_tamu' => $this->input->post('nik_tamu'),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
                'plat_nomor' => $this->input->post('plat_nomor')
            );
            $this->db->where('id_kendaraan', $id);
            return $this->db->update('tb_kendaraan', $data);
        }
        
        function hapus_data($tabel, $kolom, $id)  
    {
        $this->db->delete($tabel, array($kolom => $id));
        if (!$this->db->affected_rows())
            return (FALSE);
        else
            return (TRUE);
    }

    public function dd_tamu()
    {
        $query = $this->db->get('tb_tamu');
        $result = $query->result();

        $nik = array('-Pilih-');
        $nama = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($nik, $result[$i]->nik_tamu);
            array_push($nama, $result[$i]->nama_tamu);
        }
        return array_combine($nik, $nama);
    }

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }
    
       public function jumlah_record_tabel($tabel)    
    {
        $query = $this->db->select("COUNT(*) as num")->get($tabel);
        $result = $query->row();
        if (isset($result))
            return $result->num;
        return 0;
    }
  
  
    public function cari_data($tabel, $namafield, $isifield)
{
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where($namafield,$isifield);
            $query = $this->db->get();
            return $query->row_array();           
    }
}
?>
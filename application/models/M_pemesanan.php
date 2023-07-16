<?php 
    class M_pemesanan extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_pemesanan')->result();
        }

        public function dt_pemesanan()
        {
            $this->db->select('p.id_pemesanan, p.tgl_pemesanan, t.nama_tamu, k.nomor_kamar, s.status');
            $this->db->from('tb_pemesanan p');
            $this->db->join('tb_tamu t', 'p.nik_tamu = t.nik_tamu');
            $this->db->join('tb_kamar k', 'p.id_kamar = k.id_kamar');
            $this->db->join('tb_status_pemesanan s', 'p.id_status_pemesanan = s.id_status_pemesanan');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function dt_pemesanan_insert()
        {
            $data = array(
                'tgl_pemesanan' => $this->input->post('tgl_pemesanan'),
                'nik_tamu' => $this->input->post('nik_tamu'),
                'id_kamar' => $this->input->post('id_kamar'),
                'id_status_pemesanan' => $this->input->post('id_status_pemesanan')
            );
            return $this->db->insert('tb_pemesanan', $data);
        }
        
        public function dt_pemesanan_update($id)
        {
            $data = array(
                'tgl_pemesanan' => $this->input->post('tgl_pemesanan'),
                'nik_tamu' => $this->input->post('nik_tamu'),
                'id_kamar' => $this->input->post('id_kamar'),
                'id_status_pemesanan' => $this->input->post('id_status_pemesanan')
            );
            $this->db->where('id_pemesanan', $id);
            return $this->db->update('tb_pemesanan', $data);
        }

        function hapus_data($tabel, $kolom, $id)  
        {
            $this->db->delete($tabel, array($kolom => $id));
            if (!$this->db->affected_rows())
                return (FALSE);
            else
                return (TRUE);
        }

    public function dd_kamar()
    {
        $query = $this->db->get('tb_kamar');
        $result = $query->result();

        $id_kamar = array('-Pilih-');
        $nomor_kamar = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_kamar, $result[$i]->id_kamar);
            array_push($nomor_kamar, $result[$i]->nomor_kamar);
        }
        return array_combine($id_kamar, $nomor_kamar);
    }

    public function dd_status()
    {
        $query = $this->db->get('tb_status_pemesanan');
        $result = $query->result();

        $id_status_pemesanan = array('-Pilih-');
        $status = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_status_pemesanan, $result[$i]->id_status_pemesanan);
            array_push($status, $result[$i]->status);
        }
        return array_combine($id_status_pemesanan, $status);
    }

    public function dd_tamu()
    {
        $query = $this->db->get('tb_tamu');
        $result = $query->result();

        $nik = array('-Pilih-');
        $nama = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($nik, $result[$i]->nik);
            array_push($nama, $result[$i]->nama);
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
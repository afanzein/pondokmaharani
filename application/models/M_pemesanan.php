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

    public function dd_role()
    {
        $query = $this->db->get('tb_role');
        $result = $query->result();

        $id_role = array('-Pilih-');
        $nama_role = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_role, $result[$i]->id_role);
            array_push($nama_role, $result[$i]->nama_role);
        }
        return array_combine($id_role, $nama_role);
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
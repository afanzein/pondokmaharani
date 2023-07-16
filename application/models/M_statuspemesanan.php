<?php 
    class M_statuspemesanan extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_status_pemesanan')->result();
        }

            public function dt_status_pemesanan()
    {
        $this->db->select('sp.id_status_pemesanan, p.id_pemesanan, p.tgl_pemesanan, sp.status');
        $this->db->from('tb_status_pemesanan sp');
        $this->db->join('tb_pemesanan p', 'sp.id_pemesanan = p.id_pemesanan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_update_status($id_status_pemesanan, $status)
    {
       // Update the 'status' column for the specified 'id_status_pemesanan'
    $this->db->where('id_status_pemesanan', $id_status_pemesanan);
    $this->db->update('tb_status_pemesanan', array('status' => $status));
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
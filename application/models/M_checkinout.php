<?php 
    class M_checkinout extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_checkinout')->result();
        }

        public function dt_checkinout()
        {
            $this->db->select('cio.id_checkinout, p.id_pemesanan, cio.tgl_checkin, cio.tgl_checkout');
            $this->db->from('tb_checkinout cio');
            $this->db->join('tb_pemesanan p', 'cio.id_pemesanan = p.id_pemesanan');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function dt_checkinout_insert()
        {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'tgl_checkin' => $this->input->post('tgl_checkin'),
                'tgl_checkout' => $this->input->post('tgl_checkout')
            );
            return $this->db->insert('tb_checkinout', $data);
        }
        
        public function dt_checkinout_update($id)
        {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'tgl_checkin' => $this->input->post('tgl_checkin'),
                'tgl_checkout' => $this->input->post('tgl_checkout')
            );
            $this->db->where('id_checkinout', $id);
            return $this->db->update('tb_checkinout', $data);
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
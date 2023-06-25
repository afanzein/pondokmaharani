<?php 
    class M_detailpembayaran extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_detail_pembayaran')->result();
        }

        public function dt_detail_pembayaran()
        {
            $this->db->select('dp.id_detail_pembayaran, p.id_pemesanan, dp.item_pembayaran, dp.jumlah_pembayaran, dp.subtotal');
            $this->db->from('tb_detail_pembayaran dp');
            $this->db->join('tb_pemesanan p', 'dp.id_pemesanan = p.id_pemesanan');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function dt_detail_pembayaran_insert()
        {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'item_pembayaran' => $this->input->post('item_pembayaran'),
                'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran'),
                'subtotal' => $this->input->post('subtotal')
            );
            return $this->db->insert('tb_detail_pembayaran', $data);
        }
        
        public function dt_detail_pembayaran_update($id)
        {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'item_pembayaran' => $this->input->post('item_pembayaran'),
                'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran'),
                'subtotal' => $this->input->post('subtotal')
            );
            $this->db->where('id_detail_pembayaran', $id);
            return $this->db->update('tb_detail_pembayaran', $data);
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
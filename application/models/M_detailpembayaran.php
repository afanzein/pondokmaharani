<?php 
    class M_detailpembayaran extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_detail_pembayaran')->result();
        }

        public function dt_detail_pembayaran()
        {
            $this->db->select('dp.id_detail_pembayaran, dp.id_pembayaran, dp.item_pembayaran, dp.jumlah_pembayaran, dp.subtotal');
            $this->db->from('tb_detail_pembayaran dp');
            $this->db->join('tb_pembayaran p', 'dp.id_pembayaran = p.id_pembayaran');
            $query = $this->db->get();
            return $query->result_array();
        }
    
        public function get_detail_pembayaran($id_pembayaran){
            $this->db->where('id_pembayaran', $id_pembayaran);
            return $this->db->get('tb_detail_pembayaran')->result_array();
        }

        public function dt_detail_pembayaran_insert()
        {
            $data = array(
                'id_pembayaran' => $this->input->post('id_pembayaran'),
                'item_pembayaran' => $this->input->post('item_pembayaran'),
                'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran'),
                'subtotal' => $this->input->post('subtotal')
            );
            return $this->db->insert('tb_detail_pembayaran', $data);
        }
    
        public function dt_detail_pembayaran_update($id)
        {
            $data = array(
                'id_pembayaran' => $this->input->post('id_pembayaran'),
                'item_pembayaran' => $this->input->post('item_pembayaran'),
                'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran'),
                'subtotal' => $this->input->post('subtotal')
            );
            $this->db->where('id_detail_pembayaran', $id);
            return $this->db->update('tb_detail_pembayaran', $data);
        }
        
        function hapus_data($tabel, $kolom, $id)  
    {
        $this->db->delete($tabel, array($kolom => $id));
        if (!$this->db->affected_rows())
            return (FALSE);
        else
            return (TRUE);
    }

    public function dd_pembayaran()
    {
        $query = $this->db->get('tb_pembayaran');
        $result = $query->result();

        $id_pembayaran = array('-Pilih-');
        $tgl_pembayaran = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_pembayaran, $result[$i]->id_pembayaran);
            array_push($tgl_pembayaran, $result[$i]->tgl_pembayaran);
        }
        return array_combine($id_pembayaran, $tgl_pembayaran);
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
<?php 
    class M_pembayaran extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_pembayaran')->result();
        }

        public function dt_pembayaran()
        {
            $this->db->select('p.id_pembayaran, p.id_pemesanan, p.tgl_pembayaran, p.status_pembayaran');
            $this->db->from('tb_pembayaran p');
            $this->db->join('tb_pemesanan pem', 'p.id_pemesanan = pem.id_pemesanan');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_pembayaran_data($id_pemesanan) {
            $this->db->select('p.*, pem.tgl_pemesanan, s.status');
            $this->db->from('tb_pembayaran p');
            $this->db->join('tb_pemesanan pem', 'p.id_pemesanan = pem.id_pemesanan');
            $this->db->join('tb_status_pemesanan s', 'pem.id_pemesanan = s.id_pemesanan');
            $this->db->where('p.id_pemesanan', $id_pemesanan);
            $this->db->order_by('p.tgl_pembayaran', 'desc');
            return $this->db->get()->result_array();
        }
            
   
        public function dt_update_status($id_pembayaran, $status_pembayaran)
        {
           // Update the 'status_pembayaran' column for the specified 'id_pembayaran'
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('tb_pembayaran', array('status_pembayaran' => $status_pembayaran));
        }     

        public function dt_pembayaran_insert()
        {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'tgl_pembayaran' => $this->input->post('tgl_pembayaran'),
                'status_pembayaran' => $this->input->post('status_pembayaran')
            );
            return $this->db->insert('tb_pembayaran', $data);
        }

        public function dt_pembayaran_update($id)
        {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'tgl_pembayaran' => $this->input->post('tgl_pembayaran'),
                'status_pembayaran' => $this->input->post('status_pembayaran')
            );
            $this->db->where('id_pembayaran', $id);
            return $this->db->update('tb_pembayaran', $data);
        }

    function hapus_data($tabel, $kolom, $id)  
    {
        $this->db->delete($tabel, array($kolom => $id));
        if (!$this->db->affected_rows())
            return (FALSE);
        else
            return (TRUE);
    }

    public function dd_pemesanan()
    {
        $query = $this->db->get('tb_pemesanan');
        $result = $query->result();

        $id_pemesanan = array('-Pilih-');
        $nik_tamu = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_pemesanan, $result[$i]->id_pemesanan);
            array_push($nik_tamu, $result[$i]->nik_tamu);
        }
        return array_combine($id_pemesanan, $nik_tamu);
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
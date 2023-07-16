<?php 
    class M_laundry extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_laundry')->result();
        }

    public function dt_laundry()
{
    $this->db->select('l.id_laundry, p.id_pemesanan, p.tgl_pemesanan, l.harga_satuan, l.jumlah_laundry, l.subtotal');
    $this->db->from('tb_laundry l');
    $this->db->join('tb_pemesanan p', 'l.id_pemesanan = p.id_pemesanan');
    $query = $this->db->get();
    return $query->result_array();
}


    public function dt_laundry_insert()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'jumlah_laundry' => $this->input->post('jumlah_laundry'),
            'subtotal' => $this->input->post('subtotal')
        );
        return $this->db->insert('tb_laundry', $data);
    }

    public function dt_laundry_update($id)
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'jumlah_laundry' => $this->input->post('jumlah_laundry'),
            'subtotal' => $this->input->post('subtotal')
        );
        $this->db->where('id_laundry', $id);
        return $this->db->update('tb_laundry', $data);
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
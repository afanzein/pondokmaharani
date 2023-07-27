<?php 
    class M_tipekamar extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_tipe_kamar')->result();
        }

        public function dt_tipe_kamar()
    {
        $this->db->select('id_tipe_kamar, nama_tipe_kamar, fasilitas, harga_permalam, harga_perminggu, harga_perbulan');
        $this->db->from('tb_tipe_kamar');
        $query = $this->db->get();
        return $query->result_array();
    }

     public function getProducts() {
            // Query untuk mengambil data produk dari tabel tb_tipe_kamar
            $this->db->select('tb_tipe_kamar.id_tipe_kamar, tb_tipe_kamar.nama_tipe_kamar, tb_tipe_kamar.fasilitas, tb_tipe_kamar.harga_permalam,tb_foto_kamar.id_foto, tb_foto_kamar.deskripsi_foto');
            $this->db->from('tb_tipe_kamar');
            $this->db->join('tb_foto_kamar', 'tb_foto_kamar.id_tipe_kamar = tb_tipe_kamar.id_tipe_kamar', 'left');
            $query = $this->db->get();
            return $query->result_array();
        }

    public function getPhotosByTipeKamar($id_tipe_kamar) {
            $this->db->select('id_foto,deskripsi_foto');
            $this->db->where('id_tipe_kamar', $id_tipe_kamar);
            $query_fotos = $this->db->get('tb_foto_kamar');
            return $query_fotos->result_array();
        }

    public function dt_tipe_kamar_insert()
    {
        $data = array(
            'nama_tipe_kamar' => $this->input->post('nama_tipe_kamar'),
            'fasilitas' => $this->input->post('fasilitas'),
            'harga_permalam' => $this->input->post('harga_permalam'),
            'harga_perminggu' => $this->input->post('harga_perminggu'),
            'harga_perbulan' => $this->input->post('harga_perbulan')
        );
        return $this->db->insert('tb_tipe_kamar', $data);
    }

    public function dt_tipe_kamar_update($id)
    {
        $data = array(
            'nama_tipe_kamar' => $this->input->post('nama_tipe_kamar'),
            'fasilitas' => $this->input->post('fasilitas'),
            'harga_permalam' => $this->input->post('harga_permalam'),
            'harga_perminggu' => $this->input->post('harga_perminggu'),
            'harga_perbulan' => $this->input->post('harga_perbulan')
        );
        $this->db->where('id_tipe_kamar', $id);
        return $this->db->update('tb_tipe_kamar', $data);
    }

    function hapus_data($tabel, $kolom, $id)  
    {
        $this->db->delete($tabel, array($kolom => $id));
        if (!$this->db->affected_rows())
            return (FALSE);
        else
            return (TRUE);
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
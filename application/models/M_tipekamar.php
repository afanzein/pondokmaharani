<?php 
    class M_tipekamar extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_tipe_kamar')->result();
        }

        public function dt_tipe_kamar()
    {
        $this->db->select('tk.id_tipe_kamar, tk.nama_tipe_kamar, tk.fasilitas, tk.harga_permalam, tk.harga_perminggu, tk.harga_perbulan');
        $this->db->from('tb_tipe_kamar');
        $query = $this->db->get();
        return $query->result_array();
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
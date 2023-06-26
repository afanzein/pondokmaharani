<?php 
    class M_fotokamar extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_foto_kamar')->result();
        }

            public function dt_foto_kamar()
    {
        $this->db->select('fk.id_foto, tk.nama_tipe_kamar, fk.nama_foto, fk.deskripsi_foto');
        $this->db->from('tb_foto_kamar fk');
        $this->db->join('tb_tipe_kamar tk', 'fk.id_tipe_kamar = tk.id_tipe_kamar');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_foto_kamar_insert()
    {
        $data = array(
            'id_tipe_kamar' => $this->input->post('id_tipe_kamar'),
            'nama_foto' => $this->input->post('nama_foto'),
            'deskripsi_foto' => $this->input->post('deskripsi_foto')
        );
        return $this->db->insert('tb_foto_kamar', $data);
    }

    public function dt_foto_kamar_update($id)
    {
        $data = array(
            'id_tipe_kamar' => $this->input->post('id_tipe_kamar'),
            'nama_foto' => $this->input->post('nama_foto'),
            'deskripsi_foto' => $this->input->post('deskripsi_foto')
        );
        $this->db->where('id_foto', $id);
        return $this->db->update('tb_foto_kamar', $data);
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
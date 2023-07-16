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

    public function dt_foto_kamar_insert($id_tipe_kamar, $nama_foto, $deskripsi_foto)
    {
        $data = array(
            'id_tipe_kamar' => $id_tipe_kamar,
            'nama_foto' => $nama_foto,
            'deskripsi_foto' => $deskripsi_foto
        );
        return $this->db->insert('tb_foto_kamar', $data);
    }

    public function dt_foto_kamar_update($id, $id_tipe_kamar, $nama_foto, $deskripsi_foto)
    {
        $data = array(
            'id_tipe_kamar' => $id_tipe_kamar,
            'nama_foto' => $nama_foto,
            'deskripsi_foto' => $deskripsi_foto
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

    public function dd_tipekamar()
    {
        $query = $this->db->get('tb_tipe_kamar');
        $result = $query->result();

        $id_tipe_kamar = array('-Pilih-');
        $nama_tipe_kamar = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_tipe_kamar, $result[$i]->id_tipe_kamar);
            array_push($nama_tipe_kamar, $result[$i]->nama_tipe_kamar);
        }
        return array_combine($id_tipe_kamar, $nama_tipe_kamar);
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
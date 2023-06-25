<?php 
    class M_kamar extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_kamar')->result();
        }

        public function dt_kamar()
    {
        $this->db->select('k.id_kamar, k.nomor_kamar, tk.nama_tipe_kamar, k.status_kamar');
        $this->db->from('tb_kamar k');
        $this->db->join('tb_tipe_kamar tk', 'k.id_tipe_kamar = tk.id_tipe_kamar');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_kamar_insert()
    {
        $data = array(
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'id_tipe_kamar' => $this->input->post('id_tipe_kamar'),
            'status_kamar' => $this->input->post('status_kamar')
        );
        return $this->db->insert('tb_kamar', $data);
    }

    public function dt_kamar_update($id)
    {
        $data = array(
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'id_tipe_kamar' => $this->input->post('id_tipe_kamar'),
            'status_kamar' => $this->input->post('status_kamar')
        );
        $this->db->where('id_kamar', $id);
        return $this->db->update('tb_kamar', $data);
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
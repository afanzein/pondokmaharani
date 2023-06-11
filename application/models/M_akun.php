<?php 
    class M_akun extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_akun')->result();
        }

    public function dt_akun()
    {
        $this->db->select('id_akun, email, username, password, id_role');
        $this->db->from('tb_akun');
        $query = $this->db->get();
        return $query->result_array();        
    }

    public function dt_akun_insert()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'id_role' => $this->input->post('id_role')
        );
        return $this->db->insert('tb_akun', $data);
    }

    public function dt_akun_update($id)
    {
        $data = array(
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'id_role' => $this->input->post('id_role')
        );
        $this->db->where('id_akun', $id);
        return $this->db->update('tb_akun', $data);
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
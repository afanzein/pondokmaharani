<?php 
    class M_akun extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_akun')->result();
        }

        public function dt_akun()
        {
            $this->db->select('a.id_akun, a.email, a.username, a.password, r.id_role');
            $this->db->from('tb_akun a');
            $this->db->join('tb_role r', 'a.id_role = r.id_role');
            $query = $this->db->get();
            return $query->result_array();
        }
        

    public function dt_akun_insert()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->encrypt_password($this->input->post('password')),
            'id_role' => $this->input->post('id_role')
        );
        return $this->db->insert('tb_akun', $data);
    }

    public function dt_akun_update($id)
    {
        $data = array(
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->encrypt_password($this->input->post('password')),
            'id_role' => $this->input->post('id_role')
        );
        $this->db->where('id_akun', $id);
        return $this->db->update('tb_akun', $data);
    }

    public function daftar_user()
    {
        $email = $this->input->post('email');
        $username = $this->input->post('username');
    
        // Check if email already exists in the database
        $existing_email = $this->db->get_where('tb_akun', array('email' => $email))->row();
        if ($existing_email) {
            // Email already exists, return an error message or handle it as you prefer
            return "<script>alert('Email sudah terdaftar')</script>";
        }
    
        $data = array(
            'email' => $email,
            'username' => $username,
            'password' => $this->encrypt_password($this->input->post('password')),
            'id_role' => 3
        );
    
        if ($this->db->insert('tb_akun', $data)) {
            // Registration successful
            return true;
        } else {
            // Registration failed, return the database error message
            return $this->db->error()['message']; // Return the specific error message
        }
    }
    
    
    

    public function encrypt_password($password)
    {
        // Lakukan enkripsi password di sini (contoh: menggunakan password_hash() untuk hashing)
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        return $hashed_password;
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
        $roles = $this->get('tb_role');
    
        $id_role = array('-Pilih-');
        $nama_role = array('-Pilih-');
        
        foreach ($roles as $role) {
            array_push($id_role, $role['id_role']);
            array_push($nama_role, $role['nama_role']);
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
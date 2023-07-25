<?php
class M_login extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function cek_login()
    {
        $login = $this->input->post('USERNAME');
        $password = $this->input->post('PASSWORD');
        
        $this->db->select('user.*, tb_role.nama_role');
        $this->db->from('tb_akun AS user');
        $this->db->join('tb_role', 'tb_role.id_role = user.id_role');
        $this->db->where('(user.username = "'.$login.'" OR user.email = "'.$login.'")');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $user = $query->row_array();
            // Verify password using password_verify function with bcrypt
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

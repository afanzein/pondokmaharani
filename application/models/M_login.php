<?php
class M_login extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    function cek_login()
    {
        $username = $this->input->post('USERNAME');
        $password = $this->input->post('PASSWORD');
        
        $sql = "SELECT user.*, tb_role.nama_role 
                FROM tb_akun AS user
                JOIN tb_role ON tb_role.id_role = user.id_role
                WHERE user.username = ? AND user.password = ?";
        
        $query = $this->db->query($sql, array($username, $password));
        
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}

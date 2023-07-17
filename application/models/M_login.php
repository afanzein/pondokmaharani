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
        $this->db->where('user.password', $password);
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login'); // Load the M_login model
    }

    public function index()
    {
        $data['pesan'] = "";
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required', array('required'=>'Username tidak boleh kosong!'));   
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required', array('required'=>'Password tidak boleh kosong!'));
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("v_login", $data);
        } else {
            $user = $this->M_login->cek_login(); // Use M_login model

            if ($user) {
                $role = $user['id_role'];
                $this->session->set_userdata('role', $role); // Set user role in session
                $id_akun = $user['id_akun'];
                $this->session->set_userdata('id_akun', $id_akun);
                $username = $user['username'];
                $this->session->set_userdata('username', $username);
                $email = $user['email'];
                $this->session->set_userdata('email', $email);
    
                if ($role == 1 || $role == 2) {
                    // Redirect manager or admin to dashboard
                    redirect(base_url("dashboard"));
                } else if ($role == 3) {
                    // Redirect user to user page
                    redirect(base_url("landing"));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger"
                role="alert"> Login gagal. Username atau Password anda salah </div>');
                redirect(base_url('login'));
            }
        }       
    }

    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_akun',['email' => $emai])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();

            if($user_token){
                if (time() - $user_token['created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tb_akun');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success"
                    role="alert"> Aktivasi Akun'.$email.' <strong> Berhasil </strong> silahkan melakukan Login. </div>');
                    redirect(base_url('login'));
                } else {
                    $this->db->delete('tb_akun',['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger"
                    role="alert"> Aktivasi Akun gagal, token tidak ditemukan. </div>');
                    redirect(base_url('login'));
                }
            }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger"
            role="alert"> Aktivasi Akun gagal, token tidak ditemukan. </div>');
            redirect(base_url('login'));
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger"
            role="alert"> Aktivasi Akun gagal, email tidak ditemukan. </div>');
            redirect(base_url('login'));
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('role'); // Remove user role from session
        $this->session->unset_userdata('id_akun');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');

        unset(
            $_SESSION['USERNAME'],
            $_SESSION['PASSWORD']
        );  
        $data['pesan'] = 'Logout Sukses';
        $this->load->view("v_login", $data);
    }
}

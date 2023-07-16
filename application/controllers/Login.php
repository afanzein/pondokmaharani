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
            $user = $this->M_login->cek_login();

            if ($user) {
                $role = $user['id_role'];
                if ($role == 1 || $role == 2) {
                    // Redirect to admin dashboard
                    redirect(base_url("dashboard"));
                } else if ($role == 3) {
                    // Redirect to user page
                    redirect(base_url("user"));
                }
            } else {
                $this->session->set_flashdata('message', 'Username atau password salah');
                $this->load->view("v_login", $data);
            }
        }       
    }

    public function logout()
    {
        unset(
            $_SESSION['USERNAME'],
            $_SESSION['PASSWORD']
        );  
        $data['pesan'] = 'Logout Sukses';
        $this->load->view("v_login", $data);
    }
}

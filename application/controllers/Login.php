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
                
                if ($role == 1 || $role == 2) {
                    // Redirect manager or admin to dashboard
                    redirect(base_url("dashboard"));
                } else if ($role == 3) {
                    // Redirect user to user page
                    redirect(base_url("user"));
                }
            } else {
                $this->session->set_flashdata('message', 'Username or Email or Password is incorrect');
                $this->load->view("v_login", $data);
            }
        }       
    }

    public function logout()
    {
        $this->session->unset_userdata('role'); // Remove user role from session
        
        unset(
            $_SESSION['USERNAME'],
            $_SESSION['PASSWORD']
        );  
        $data['pesan'] = 'Logout Sukses';
        $this->load->view("v_login", $data);
    }
}

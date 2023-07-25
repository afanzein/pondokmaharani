<?php
class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_daftar'); // Load the M_daftar model
    }

    public function daftar()
    {
        // Set validation rules for the form fields
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        
        if ($this->form_validation->run() === false) {
            // Form validation failed, show the registration form again with validation errors
            $this->load->view('daftar');
        } else {

            
            // Call the M_daftar model to insert data into the database
            if ($this->M_akun->daftar_user()) {
                // Registration successful, redirect to a success page or login page
                redirect(base_url("login"));
            } else {
                // Registration failed, display an error message
                $data['error_message'] = 'Registration failed. Please try again.';
                $this->load->view('daftar', $data);
            }
        }
    }
}
?>

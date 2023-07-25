<?php
class Landing extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pondok Maharani';
        $this->load->view('user/header', $data);
        $this->load->view('user/landing');
        $this->load->view('user/footer');
    }
}
?>
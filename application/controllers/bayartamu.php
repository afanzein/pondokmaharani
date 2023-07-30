<?php
class Bayartamu extends CI_Controller{

public function index()
    {
        $data['title']='List Tamu';
        $this->load->view('user/header', $data);
        $this->load->view('user/bayar');
        $this->load->view('user/footer');
    }
}
?>
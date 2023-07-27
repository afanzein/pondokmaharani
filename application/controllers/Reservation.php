<?php
class Reservation extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pemesanan Kamar - Pondok Maharani';
        $this->load->view('user/header', $data);
        $this->load->view('user/reservation');
        $this->load->view('user/footer');
    }

    public function pesan(){

    }
}
?>
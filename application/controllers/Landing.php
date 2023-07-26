<?php
class Landing extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_tipekamar');
         // Panggil fungsi getProducts() dari model untuk mendapatkan data produk
        $data['products'] = $this->M_tipekamar->getProducts();
        $data['title'] = 'Pondok Maharani';
        $this->load->view('user/header', $data);
        $this->load->view('user/landing',$data);
        $this->load->view('user/footer');
    }



}
?>
<?php
class Landing extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_tipekamar');
         // Panggil fungsi getProducts() dari model untuk mendapatkan data produk
        $data['products'] = $this->M_tipekamar->getProducts();
            // Dapatkan data gambar untuk setiap id_tipe_kamar
        foreach ($data['products'] as &$product) {
        $product['images'] = $this->M_tipekamar->getPhotosByTipeKamar($product['id_tipe_kamar']);
        }
        $data['title'] = 'Pondok Maharani';
        $this->load->view('user/header', $data);
        $this->load->view('user/landing',$data);
        $this->load->view('user/footer');
    }



}
?>
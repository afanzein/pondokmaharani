<?php
class Bayartamu extends CI_Controller{

    public function index($id_pemesanan){
        $this->load->model('M_pembayaran');
        $id_akun = $this->session->userdata('id_akun');
        $data['title'] = 'Halaman Pembayaran';
        $data['pembayaran'] = $this->M_pembayaran->get_pembayaran_data($id_akun, $id_pemesanan);

        $this->load->view('user/header', $data);
        $this->load->view('user/bayar', $data);
        $this->load->view('user/footer');
    }
}
?>
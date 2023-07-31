<?php
class Bayartamu extends CI_Controller{

    public function index($id_pemesanan){
// Load the required models
$this->load->model('M_pembayaran');
$this->load->model('M_detail_pembayaran');

// Get the user's id_akun from the session
$id_akun = $this->session->userdata('id_akun');

// Retrieve the id_pemesanan from the URL query parameter
$id_pemesanan = $this->input->get('id_pemesanan');

// Retrieve data for tb_pembayaran
$data['pembayaran'] = $this->M_pembayaran->get_pembayaran_data($id_akun, $id_pemesanan);

// Retrieve data for tb_detail_pembayaran
$data['detail_pembayaran'] = $this->M_detail_pembayaran->get_detail_pembayaran_data($id_pemesanan);

echo '<pre>';
echo prin_r($data);
echo '</pre>';
        // Use the id_pemesanan as needed, for example, pass it to the view
        $data['id_pemesanan'] = $id_pemesanan;
        $data['title'] = 'Halaman Pembayaran';
        $this->load->view('user/header', $data);
        $this->load->view('user/bayar', $data);
        $this->load->view('user/footer');
    }
}
?>
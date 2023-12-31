<?php
class Bayartamu extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembayaran');
        $this->load->model('M_detailpembayaran');
        $this->load->model('M_tamu');
           
    }

    public function tampil(){
// Load the required models


// Get the user's id_akun from the session
$id_akun = $this->session->userdata('id_akun');

// Retrieve the id_pemesanan from the URL query parameter
$id_pemesanan = $this->input->get('id_pemesanan');
// Retrieve data for tb_pembayaran
$data['nama_tamu'] = $this->M_tamu->getuserNameByIdAkun($id_akun);
$data['nik_tamu'] = $this->M_tamu->getNikTamuByIdAkun($id_akun);
$data['pembayaran'] = $this->M_pembayaran->get_pembayaran_data($id_pemesanan);
// Retrieve data for tb_detail_pembayaran
$id_pembayaran = $data['pembayaran'][0]['id_pembayaran'];
$data['detail_pembayaran'] = $this->M_detailpembayaran->get_detail_pembayaran($id_pembayaran);


        // Use the id_pemesanan as needed, for example, pass it to the view
        $data['id_pemesanan'] = $id_pemesanan;
        $data['title'] = 'Halaman Pembayaran';
        $this->load->view('user/header', $data);
        $this->load->view('user/bayar', $data);
        $this->load->view('user/footer');
    }

    public function update_status()
    {
        $id_pembayaran = $this->input->get('id');
        $status = $this->input->get('status');
        // Update the status in the model
        $this->M_pembayaran->dt_update_status($id_pembayaran, $status);
        // Redirect to the page where the table is displayed
        redirect(base_url('riwayat'));
    }

}
?>

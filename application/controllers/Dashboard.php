<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemesanan');
    }

    public function index()
    {
        $data['title'] = 'Data kelas';
        $data['total'] =$this->M_pemesanan->jumlah_record_tabel('tb_pemesanan');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
}
?>
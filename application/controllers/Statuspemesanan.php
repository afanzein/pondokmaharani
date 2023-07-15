<?php
class Statuspemesanan extends CI_Controller{

function __construct()
{
    parent::__construct();
    $this->load->model('M_statuspemesanan');
}

public function index()
{
    $data['title'] = 'Status Pemesanan';
    $data['statuspemesanan'] = $this->M_statuspemesanan->dt_status_pemesanan();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/statuspemesanan/v_statuspemesanan');
    $this->load->view('admin/footer');
}


}
?>

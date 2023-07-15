<?php
class Checkinout extends CI_Controller{

function __construct()
{
    parent::__construct();
    $this->load->model('M_checkinout');
}

public function index()
{
    $data['title'] = 'List Check In & Out';
    $data['checkinout'] = $this->M_checkinout->dt_checkinout();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/checkinout/v_checkinout');
    $this->load->view('admin/footer');
}

}
?>

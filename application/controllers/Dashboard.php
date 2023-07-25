<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data kelas';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
}
?>
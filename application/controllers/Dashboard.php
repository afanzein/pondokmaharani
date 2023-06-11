<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        // if (!$this->session->userdata('username')) {
        //     redirect('login');
        // }
        // $data['kelas'] = $this->M_kelas->get_kelas();
        $data['title'] = 'Data kelas';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
}
?>
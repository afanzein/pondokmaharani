 <?php

 class Riwayat extends CI_Controller{
  
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemesanan');
        $this->load->model('M_laundry');
    }

    public function index()
    {
        $data['title']='Riwayat Pemesanan ';

        
        // Ambil data session dari variabel yang telah diatur di header.php
        $email_session = $this->session->userdata('email');
        $username_session = $this->session->userdata('username');
        
        $data['username'] = $username_session;
        $data['email'] = $email_session;
        
        $id_akun_session = $this->session->userdata('id_akun');
        
        $data['reservasi']=$this->M_pemesanan->dt_reservasi_user($id_akun_session);
        $data['laundry']=$this->M_laundry->dt_laundry_user($id_akun_session);

        $data['email'] = $email_session;
        $data['username'] = $username_session;
        $this->load->view('user/header', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('user/footer');
    }

 }

 ?>
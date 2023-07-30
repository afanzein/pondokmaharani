<?php
class Profil extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
        $this->load->model('M_akun');
    }

    public function index()
    {
        $data['title']='Profil';
        $data['profil']=$this->M_tamu->dt_tamu();
        // Ambil data session dari variabel yang telah diatur di header.php
        $email_session = $this->session->userdata('email');
        $username_session = $this->session->userdata('username');
        
        $data['username'] = $username_session;
        $data['email'] = $email_session;

        $id_akun_session = $this->session->userdata('id_akun');
        
        // Check if data for the user exists in the tb_tamu table
        $existing_data = $this->M_tamu->getTamuByIdAkun($id_akun_session);

        if ($existing_data) {
            // Data exists, populate the form for update
            $data['data'] = $existing_data;
        } else {
            // Data doesn't exist, leave the form fields empty
            $data['data'] = array(
                'nik_tamu' => '',
                'nama_tamu' => '',
                'jenis_kelamin' => '',
                'tgl_lahir' => '',
                'no_telp' => '',
                'alamat' => ''
            );
        }

        $data['email'] = $email_session;
        $data['username'] = $username_session;
        $this->load->view('user/header', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('user/footer');
    }

    public function update_profil($id = FALSE)
    {

        // Validation rules here...
        $this->form_validation->set_rules('nik_tamu', 'NIK', 'required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('nama_tamu', 'Nama', 'required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('jenis_kelamin', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp.', 'required|min_length[5]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() === FALSE) {
            // If validation fails, load the view again with the errors
            $data['title'] = 'Profil Pengguna';
            $data['data'] = array(
                'nik_tamu' => $this->input->post('nik_tamu'),
                'nama_tamu' => $this->input->post('nama_tamu'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            );
            $this->load->view('user/header', $data);
            $this->load->view('user/profil', $data);
            $this->load->view('user/footer');
        } else {
            // If validation succeeds, update the profile data in the model
            $id_akun = $this->session->userdata('id_akun');
            $this->M_tamu->updateProfil($id_akun);
            // Set flashdata to show a success message
            $this->session->set_flashdata('success_message', 'Profil berhasil diperbarui.');
            // Redirect to the profile page
            redirect('profil');
        }
    }
}
?>

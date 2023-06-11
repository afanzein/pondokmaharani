<?php
class Akun extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_akun');
    }

public function index()
    {
        $data['title']='List Akun';
        $data['akun']=$this->M_akun->dt_akun();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/akun/v_akun');
        $this->load->view('admin/footer');
    }

    public function akun_insert()
	{
		$data['title'] = 'Tambah Data Akun';

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('username', 'Username', 
        'required|min_length[4]|max_length[45]', array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('password', 'Password', 
        'required|min_length[4]|max_length[16]', array('required' => '%s harus diisi.'));

        $this->form_validation->set_rules('id_role', 'ID Role', 'required', array('required' => '%s harus dipilih'));
        // $this->form_validation->set_rules('ID_MATERIAL', 'Pilih ID material', 'callback_dd_cek');
        $data['ddrole'] = $this->M_akun->dd_role();
		if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/akun/v_insert');
            $this->load->view('admin/footer');
		} else {
			$this->M_akun->dt_akun_insert();
			redirect(base_url('akun'));
		}
	}
	public function akun_update($id = FALSE)
	{
		$data['title'] = 'Update Data Akun';
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('username', 'Username', 
        'required|min_length[4]|max_length[45]', array('required' => '%s harus dipilih'));
		$this->form_validation->set_rules('password', 'Password', 
        'required|min_length[4]|max_length[16]', array('required' => '%s harus dipilih'));
        $this->form_validation->set_rules('id_role', 'ID Role', 'required', array('required' => '%s harus dipilih'));
		
        $data['d'] = $this->M_akun->cari_data('tb_akun', 'id_akun', $id);
        $data['ddrole'] = $this->M_akun->dd_role();

		if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/akun/v_update');
            $this->load->view('admin/footer');
		} else {
			$this->M_akun->dt_akun_update($id);
			redirect(base_url('akun'));
		}
	}

public function akun_delete($id)
	{
		$this->m_akun->hapus_data('tb_akun', 'id_akun', $id);
		redirect(base_url('akun'));
	}

    function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
{
	if ($str == '-Pilih-') {
	  $this->form_validation->set_message('dd_cek', 'Harus dipilih');
	  return FALSE;
	} else
	  return TRUE;
}
}
    ?>
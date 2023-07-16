<?php
class Pegawai extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai');
    }

public function index()
    {
        $data['title']='List Akun';
        $data['pegawai']=$this->M_pegawai->dt_pegawai();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pegawai/v_pegawai');
        $this->load->view('admin/footer');
    }

    public function pegawai_insert()
	{
		$data['title'] = 'Tambah Data Pegawai';
        
        $this->form_validation->set_rules('nik_pegawai','NIK',
		'required|min_length[16]|max_length[45]',array('required' => '%s NIK harus diisi.'));
        $this->form_validation->set_rules('nama_pegawai','Nama',
		'required|min_length[3]|max_length[45]',array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('jenis_kelamin','Gender',
		'required',array('required' => '%s harus dipilih.'));
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir',
		'required',array('required' => '%s harus dipilih.'));
		$this->form_validation->set_rules('jabatan','Jabatan',
		'required',array('required' => '%s harus dipilih.'));
		$this->form_validation->set_rules('no_telp', 'No Telp.', 
        'required|min_length[5]|max_length[13]', array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('alamat', 'Alamat', 
        'required', array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('id_akun', 'Pilih Email', 'callback_dd_cek');
        $data['ddakun'] = $this->M_pegawai->dd_pegawai();
		if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/pegawai/v_insert');
            $this->load->view('admin/footer');
		} else {
			$this->M_pegawai->dt_pegawai_insert();
			redirect(base_url('pegawai'));
		}
	}
	public function pegawai_update($id = FALSE)
	{
		$data['title'] = 'Update Data Pegawai';
		$this->form_validation->set_rules('nik_pegawai','NIK',
		'required|min_length[16]|max_length[45]',array('required' => '%s NIK harus diisi.'));
        $this->form_validation->set_rules('nama_pegawai','Nama',
		'required|min_length[3]|max_length[45]',array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('jenis_kelamin','Jenkel',
		'required',array('required' => '%s harus dipilih.'));
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir',
		'required',array('required' => '%s harus dipilih.'));
		$this->form_validation->set_rules('jabatan','Jabatan',
		'required',array('required' => '%s harus dipilih.'));
		$this->form_validation->set_rules('no_telp', 'notelp', 
        'required|min_length[5]|max_length[13]', array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('alamat', 'Alamat', 
        'required', array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('id_akun', 'Pilih Email', 'callback_dd_cek');
        $data['d'] = $this->M_pegawai->cari_data('tb_pegawai', 'nik_pegawai', $id);
        $data['ddakun'] = $this->M_pegawai->dd_pegawai();

		if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/pegawai/v_update');
            $this->load->view('admin/footer');
		} else {
			$this->M_pegawai->dt_pegawai_update($id);
			redirect(base_url('pegawai'));
		}
	}

public function pegawai_delete($id)
	{
		$this->M_pegawai->hapus_data('tb_pegawai', 'nik_pegawai', $id);
		redirect(base_url('pegawai'));
	}

    function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
{
	if ($str == '-Pilih-') {
	  $this->form_validation->set_message('dd_cek', 'Role harus dipilih');
	  return FALSE;
	} else
	  return TRUE;
}
}
    ?>
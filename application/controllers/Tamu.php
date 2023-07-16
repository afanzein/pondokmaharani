<?php
class Tamu extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
    }

public function index()
    {
        $data['title']='List Tamu';
        $data['tamu']=$this->M_tamu->dt_tamu();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/tamu/v_tamu');
        $this->load->view('admin/footer');
    }

    public function tamu_insert()
	{
		$data['title'] = 'Tambah Data Tamu';

		$this->form_validation->set_rules('nik_tamu','NIK',
		'required|min_length[16]|max_length[45]',array('required' => '%s NIK harus diisi.'));
        $this->form_validation->set_rules('nama_tamu','Nama',
		'required|min_length[3]|max_length[45]',array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('jenis_kelamin','Gender',
		'required',array('required' => '%s harus dipilih.'));
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir',
		'required',array('required' => '%s harus dipilih.'));
		$this->form_validation->set_rules('no_telp', 'No Telp.', 
        'required|min_length[5]|max_length[13]', array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('alamat','Alamat','required',array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('id_akun', 'Pilih Email', 'callback_dd_cek');
        $data['ddakun'] = $this->M_tamu->dd_tamu();
		if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/tamu/v_insert');
            $this->load->view('admin/footer');
		} else {
			$this->M_tamu->dt_tamu_insert();
			redirect(base_url('tamu'));
		}
	}
	public function tamu_update($id = FALSE)
	{
		$data['title'] = 'Update Data Tamu';
		$this->form_validation->set_rules('nik_tamu','NIK',
		'required|min_length[16]|max_length[16]',array('required' => '%s NIK harus diisi.'));
        $this->form_validation->set_rules('nama_tamu','Nama',
		'required|min_length[3]|max_length[45]',array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('jenis_kelamin','Gender',
		'required',array('required' => '%s harus dipilih.'));
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir',
		'required',array('required' => '%s harus dipilih.'));
		$this->form_validation->set_rules('no_telp', 'No Telp.', 
        'required|min_length[5]|max_length[13]', array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('alamat', 'Alamat', 
        'required', array('required' => '%s harus diisi.'));
		$this->form_validation->set_rules('id_akun', 'Pilih Email', 'callback_dd_cek');
        $data['d'] = $this->M_tamu->cari_data('tb_tamu', 'nik_tamu', $id);
        $data['ddakun'] = $this->M_tamu->dd_tamu();

		if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/tamu/v_update');
            $this->load->view('admin/footer');
		} else {
			$this->M_tamu->dt_tamu_update($id);
			redirect(base_url('tamu'));
		}
	}

public function tamu_delete($id)
	{
		$this->M_tamu->hapus_data('tb_tamu', 'nik_tamu', $id);
		redirect(base_url('tamu'));
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
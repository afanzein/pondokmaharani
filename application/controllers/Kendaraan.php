<?php
class Kendaraan extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kendaraan');
    }

public function index()
    {
        $data['title']='List kendaraan';
        $data['kendaraan']=$this->M_kendaraan->dt_kendaraan();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/kendaraan/v_kendaraan');
        $this->load->view('admin/footer');
    }

    public function kendaraan_insert()
	{
		$data['title'] = 'Tambah Data Kendaraan';
        $this->form_validation->set_rules('nik_tamu', 'Pilih Tamu', 'callback_dd_cek');
        $this->form_validation->set_rules('nik_tamu', 'Jenis Kendaraan', 'callback_dd_cek');
		$this->form_validation->set_rules('plat_nomor','Plat Nomor',
		'required|min_length[3]|max_length[9]',array('required' => '%s harus diisi.'));
        $data['ddkendaraan'] = $this->M_kendaraan->dd_role();
		if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/kendaraan/v_insert');
            $this->load->view('admin/footer');
		} else {
			$this->M_kendaraan->dt_kendaraan_insert();
			redirect(base_url('kendaraan'));
		}
	}
	public function kendaraan_update($id = FALSE)
	{
		$data['title'] = 'Update Data Kendaraan';
        $this->form_validation->set_rules('nik_tamu', 'Pilih Tamu', 'callback_dd_cek');
        $this->form_validation->set_rules('nik_tamu', 'Jenis Kendaraan', 'callback_dd_cek');
		$this->form_validation->set_rules('plat_nomor','Plat Nomor',
		'required|min_length[3]|max_length[9]',array('required' => '%s harus diisi.'));
        $data['d'] = $this->M_kendaraan->cari_data('tb_kendaraan', 'id_kendaraan', $id);
        $data['ddkendaraan'] = $this->M_kendaraan->dd_kendaraan();

		if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/kendaraan/v_update');
            $this->load->view('admin/footer');
		} else {
			$this->M_kendaraan->dt_kendaraan_update($id);
			redirect(base_url('kendaraan'));
		}
	}

public function kendaraan_delete($id)
	{
		$this->m_kendaraan->hapus_data('tb_kendaraan', 'id_kendaraan', $id);
		redirect(base_url('kendaraan'));
	}

    function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
{
	if ($str == '-Pilih-') {
	  $this->form_validation->set_message('dd_cek', '%s harus dipilih');
	  return FALSE;
	} else
	  return TRUE;
}
}
    ?>
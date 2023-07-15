<?php
class Tipekamar extends CI_Controller{

function __construct()
{
    parent::__construct();
    $this->load->model('M_tipekamar');
}

public function index()
{
    $data['title'] = 'List Tipe Kamar';
    $data['tipekamar'] = $this->M_tipekamar->dt_tipe_kamar();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/tipekamar/v_tipekamar');
    $this->load->view('admin/footer');
}

public function tipekamar_insert()
{
    $data['title'] = 'Tambah Data Tipe Kamar';

    $this->form_validation->set_rules('nama_tipe_kamar', 'Nama Tipe Kamar', 'required|min_length[3]|max_length[45]', array('required' => '%s harus diisi.'));
    $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required', array('required' => '%s harus diisi.'));
    $this->form_validation->set_rules('harga_permalam', 'Harga per Malam', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
    $this->form_validation->set_rules('harga_perminggu', 'Harga per Minggu', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
    $this->form_validation->set_rules('harga_perbulan', 'Harga per Bulan', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/tipekamar/v_insert');
        $this->load->view('admin/footer');
    } else {
        $this->M_tipekamar->dt_tipe_kamar_insert();
        redirect(base_url('tipekamar'));
    }
}

public function tipekamar_update($id = FALSE)
{
    $data['title'] = 'Update Data Tipe Kamar';
    $this->form_validation->set_rules('nama_tipe_kamar', 'Nama Tipe Kamar', 'required|min_length[3]|max_length[45]', array('required' => '%s harus diisi.'));
    $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required', array('required' => '%s harus diisi.'));
    $this->form_validation->set_rules('harga_permalam', 'Harga per Malam', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
    $this->form_validation->set_rules('harga_perminggu', 'Harga per Minggu', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
    $this->form_validation->set_rules('harga_perbulan', 'Harga per Bulan', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
   
    $data['d'] = $this->M_tipekamar->cari_data('tb_tipe_kamar', 'id_tipe_kamar', $id);

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/tipekamar/v_update');
        $this->load->view('admin/footer');
    } else {
        $this->M_tipekamar->dt_tipe_kamar_update($id);
        redirect(base_url('tipekamar'));
    }
}

public function tipekamar_delete($id)
{
    $this->M_tipekamar->hapus_data('tb_tipe_kamar', 'id_tipe_kamar', $id);
    redirect(base_url('tipekamar'));
}

}
?>

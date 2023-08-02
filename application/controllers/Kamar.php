<?php
class Kamar extends CI_Controller{

function __construct()
{
    parent::__construct();
    $this->load->model('M_kamar');
}

public function index()
{
    $data['title'] = 'List Kamar';
    $data['kamar'] = $this->M_kamar->dt_kamar();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/kamar/v_kamar');
    $this->load->view('admin/footer');
}

public function kamar_insert()
{
    $data['title'] = 'Tambah Data Kamar';

    $this->form_validation->set_rules('nomor_kamar', 'Nomor Kamar', 'required|min_length[2]|max_length[45]', array('required' => '%s harus diisi.'));
    $this->form_validation->set_rules('id_tipe_kamar', 'Tipe Kamar', 'callback_dd_tipe');
    $this->form_validation->set_rules('status_kamar', 'Status Kamar', 'callback_dd_cek');
    $data['ddtipekamar'] = $this->M_kamar->dd_tipekamar();
    if ($this->form_validation->run() === FALSE) {
        $data['tipekamar'] = $this->M_kamar->get('tb_tipe_kamar');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/kamar/v_insert');
        $this->load->view('admin/footer');
    } else {
        $this->M_kamar->dt_kamar_insert();
        redirect(base_url('kamar'));
    }
}

public function update_status()
{
    $id_kamar = $this->input->get('id');
    $status = $this->input->get('status');
    // Update the status in the model
    $this->M_kamar->dt_update_status($id_kamar, $status);

    // Redirect to the page where the table is displayed
    redirect(base_url('kamar'));
}

public function kamar_update($id = FALSE)
{
    $data['title'] = 'Update Data Kamar';
    $this->form_validation->set_rules('nomor_kamar', 'Nomor Kamar', 'required|min_length[2]|max_length[45]', array('required' => '%s harus diisi.'));
    $this->form_validation->set_rules('id_tipe_kamar', 'Tipe Kamar', 'callback_dd_tipe');
    $this->form_validation->set_rules('status_kamar', 'Status Kamar', 'callback_dd_cek');
    
    $data['ddtipekamar'] = $this->M_kamar->dd_tipekamar();
    $data['d'] = $this->M_kamar->cari_data('tb_kamar', 'id_kamar', $id);
    $data['tipekamar'] = $this->M_kamar->get('tb_tipe_kamar');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/kamar/v_update');
        $this->load->view('admin/footer');
    } else {
        $this->M_kamar->dt_kamar_update($id);
        redirect(base_url('kamar'));
    }
}

public function kamar_delete($id)
{
    $this->M_kamar->hapus_data('tb_kamar', 'id_kamar', $id);
    redirect(base_url('kamar'));
}

public function dd_tipe($str)
{
    if ($str == '-Pilih-') {
        $this->form_validation->set_message('dd_tipe', '%s harus dipilih');
        return FALSE;
    } else {
        return TRUE;
    }
}

public function dd_cek($str)
{
    if ($str == '-Pilih-') {
        $this->form_validation->set_message('dd_cek', '%s harus dipilih');
        return FALSE;
    } else {
        return TRUE;
    }
}

}
?>

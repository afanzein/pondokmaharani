<?php
class Pemesanan extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemesanan');
    }

    public function index()
    {
        $data['title'] = 'List Pemesanan';
        $data['pemesanan'] = $this->M_pemesanan->dt_pemesanan();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pemesanan/v_pemesanan');
        $this->load->view('admin/footer');
    }

    public function pemesanan_insert()
    {
        $data['title'] = 'Tambah Data Pemesanan';

        $this->form_validation->set_rules('tgl_pemesanan', 'Tanggal Pemesanan', 'required', array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('nik_tamu', 'NIK Tamu', 'callback_dd_cek');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'callback_dd_cek');
        $this->form_validation->set_rules('id_status_pemesanan', 'ID Status Pemesanan', 'callback_dd_cek');

        $data['ddkamar'] = $this->M_pemesanan->dd_kamar();
        $data['ddstatus'] = $this->M_pemesanan->dd_status();
        $data['ddtamu'] = $this->M_pemesanan->dd_tamu();
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/pemesanan/v_insert');
            $this->load->view('admin/footer');
        } else {
            $this->M_pemesanan->dt_pemesanan_insert();
            redirect(base_url('pemesanan'));
        }
    }

    public function pemesanan_update($id = FALSE)
    {
        $data['title'] = 'Update Data Pemesanan';
        $this->form_validation->set_rules('tgl_pemesanan', 'Tanggal Pemesanan', 'required', array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('nik_tamu', 'NIK Tamu', 'callback_dd_cek');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'callback_dd_cek');
        $this->form_validation->set_rules('id_status_pemesanan', 'ID Status Pemesanan', 'callback_dd_cek');

        $data['ddkamar'] = $this->M_pemesanan->dd_kamar();
        $data['ddstatus'] = $this->M_pemesanan->dd_status();
        $data['ddtamu'] = $this->M_pemesanan->dd_tamu();
        $data['d'] = $this->M_pemesanan->cari_data('tb_pemesanan', 'id_pemesanan', $id);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/pemesanan/v_update');
            $this->load->view('admin/footer');
        } else {
            $this->M_pemesanan->dt_pemesanan_update($id);
            redirect(base_url('pemesanan'));
        }
    }

    public function pemesanan_delete($id)
    {
        $this->M_pemesanan->hapus_data('tb_pemesanan', 'id_pemesanan', $id);
        redirect(base_url('pemesanan'));
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

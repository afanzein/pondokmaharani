<?php
class Laundry extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_laundry');
    }

    public function index()
    {
        $data['title'] = 'List Laundry';
        $data['laundry'] = $this->M_laundry->dt_laundry();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/laundry/v_laundry');
        $this->load->view('admin/footer');
    }

    public function laundry_insert()
    {
        $data['title'] = 'Tambah Data Laundry';

        $this->form_validation->set_rules('id_pemesanan', 'ID Pemesanan', 'callback_dd_pemesanan');
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
        $this->form_validation->set_rules('jumlah_laundry', 'Jumlah Laundry', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
        $this->form_validation->set_rules('subtotal', 'Subtotal', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));

        $data['ddpemesanan'] = $this->M_laundry->dd_pemesanan();

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/laundry/v_insert');
            $this->load->view('admin/footer');
        } else {
            $this->M_laundry->dt_laundry_insert();
            redirect(base_url('laundry'));
        }
    }

    public function laundry_update($id = FALSE)
    {
        $data['title'] = 'Update Data Laundry';

        $this->form_validation->set_rules('id_pemesanan', 'ID Pemesanan', 'callback_dd_pemesanan');
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
        $this->form_validation->set_rules('jumlah_laundry', 'Jumlah Laundry', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));
        $this->form_validation->set_rules('subtotal', 'Subtotal', 'required|numeric', array('required' => '%s harus diisi dengan angka.'));

        $data['ddpemesanan'] = $this->M_laundry->dd_pemesanan();
        $data['d'] = $this->M_laundry->cari_data('tb_laundry', 'id_laundry', $id);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/laundry/v_update');
            $this->load->view('admin/footer');
        } else {
            $this->M_laundry->dt_laundry_update($id);
            redirect(base_url('laundry'));
        }
    }

    public function laundry_delete($id)
    {
        $this->M_laundry->hapus_data('tb_laundry', 'id_laundry', $id);
        redirect(base_url('laundry'));
    }

    public function dd_pemesanan($str)
    {
        if ($str == '-Pilih-') {
            $this->form_validation->set_message('dd_pemesanan', '%s harus dipilih');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
?>

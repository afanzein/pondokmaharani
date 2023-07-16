<?php
class Detailpembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detailpembayaran');
    }

    public function index()
    {
        $data['title'] = 'Detail Pembayaran';
        $data['detail_pembayaran'] = $this->M_detailpembayaran->dt_detail_pembayaran();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/detailpembayaran/v_detailpembayaran');
        $this->load->view('admin/footer');
    }

    public function detailpembayaran_insert()
    {
        $data['title'] = 'Tambah Detail Pembayaran';

        $this->form_validation->set_rules('id_pembayaran', 'ID Pembayaran', 'callback_dd_cek');
        $this->form_validation->set_rules('item_pembayaran', 'Item Pembayaran', 'required');
        $this->form_validation->set_rules('jumlah_pembayaran', 'Jumlah Pembayaran', 'required');
        $this->form_validation->set_rules('subtotal', 'Subtotal', 'required');

        $data['ddpembayaran'] = $this->M_detailpembayaran->dd_pembayaran();
        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/header', $data);
            $this->load->view('admin/detailpembayaran/v_insert');
            $this->load->view('admin/footer');
        } else {
            $this->M_detailpembayaran->dt_detail_pembayaran_insert();
            redirect('detailpembayaran');
        }
    }

    public function detailpembayaran_update($id)
    {
        $data['title'] = 'Edit Detail Pembayaran';

        $this->form_validation->set_rules('id_pembayaran', 'ID Pembayaran', 'callback_dd_cek');
        $this->form_validation->set_rules('item_pembayaran', 'Item Pembayaran', 'required');
        $this->form_validation->set_rules('jumlah_pembayaran', 'Jumlah Pembayaran', 'required');
        $this->form_validation->set_rules('subtotal', 'Subtotal', 'required');

        $data['ddpembayaran'] = $this->M_detailpembayaran->dd_pembayaran();
        $data['d'] = $this->M_detailpembayaran->cari_data('tb_detail_pembayaran', 'id_detail_pembayaran', $id);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/detailpembayaran/v_update');
            $this->load->view('admin/footer');
        } else {
            $this->M_detailpembayaran->dt_detail_pembayaran_update($id);
            redirect('detailpembayaran');
        }
    }

    public function detailpembayaran_delete($id)
    {
        $this->M_detailpembayaran->hapus_data('tb_detail_pembayaran', 'id_detail_pembayaran', $id);
        redirect('detailpembayaran');
    }

    public function dd_cek($str)
    {
        if ($str == '-Pilih-') {
            $this->form_validation->set_message('dd_cek', 'Pilih {field} terlebih dahulu.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
?>

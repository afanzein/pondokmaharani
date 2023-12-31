<?php
class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembayaran');
    }

    public function index()
    {
        $data['title'] = 'Pembayaran';
        $data['pembayaran'] = $this->M_pembayaran->dt_pembayaran();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembayaran/v_pembayaran', $data);
        $this->load->view('admin/footer');
    }

        public function update_status()
    {
        $id_pembayaran = $this->input->get('id');
        $status = $this->input->get('status');
        // Update the status in the model
        $this->M_pembayaran->dt_update_status($id_pembayaran, $status);
        // Redirect to the page where the table is displayed
        redirect(base_url('pembayaran'));
    }

    public function get_pembayaran_data($id_akun, $id_pemesanan){
        $this->db->select('p.*, t.nama_tamu, t.nik_tamu');
        $this->db->from('tb_pembayaran p');
        $this->db->join('tb_tamu t', 'p.id_akun = t.id_akun');
        $this->db->where('p.id_akun', $id_akun);
        $this->db->where('p.id_pemesanan', $id_pemesanan); // Add this line to match id_pemesanan
        $this->db->order_by('p.tanggal_pembayaran', 'desc');
        return $this->db->get()->result_array();
    }

    public function pembayaran_insert()
    {
        $data['title'] = 'Tambah Pembayaran';

        $this->form_validation->set_rules('id_pemesanan', 'ID Pemesanan', 'callback_dd_cek');
        $this->form_validation->set_rules('tgl_pembayaran', 'Tanggal Pembayaran', 'required');
        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'callback_dd_cek');

        $data['ddpemesanan'] = $this->M_pembayaran->dd_pemesanan();
        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/header', $data);
            $this->load->view('admin/pembayaran/v_insert');
            $this->load->view('admin/footer');
        } else {
            $this->M_pembayaran->dt_pembayaran_insert();
            redirect('pembayaran');
        }
    }

    public function pembayaran_update($id)
    {
        $data['title'] = 'Edit Pembayaran';
        
        $this->form_validation->set_rules('id_pemesanan', 'ID Pemesanan', 'callback_dd_cek');
        $this->form_validation->set_rules('tgl_pembayaran', 'Tanggal Pembayaran', 'required');
        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'callback_dd_cek');
        
        $data['ddpemesanan'] = $this->M_pembayaran->dd_pemesanan();
        $data['d'] = $this->M_pembayaran->cari_data('tb_tamu', 'nik_tamu', $id);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/pembayaran/v_update');
            $this->load->view('admin/footer');
        } else {
            $this->M_pembayaran->dt_pembayaran_update($id);
            redirect('pembayaran');
        }
    }

    public function pembayaran_delete($id)
    {
        $this->M_pembayaran->hapus_data('tb_pembayaran', 'id_pembayaran', $id);
        redirect('pembayaran');
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

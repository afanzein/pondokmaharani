<?php
class Fotokamar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_fotokamar');
    }

    public function index()
    {
        $data['title'] = 'List Foto Kamar';
        $data['foto_kamar'] = $this->M_fotokamar->dt_foto_kamar();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/fotokamar/v_fotokamar');
        $this->load->view('admin/footer');
    }

    public function fotokamar_insert()
{
    $data['title'] = 'Tambah Foto Kamar';

    $this->form_validation->set_rules('id_tipe_kamar', 'Tipe Kamar', 'callback_dd_cek');
    $this->form_validation->set_rules('deskripsi_foto', 'Deskripsi Foto', 'required');
    $this->form_validation->set_rules('foto[]', 'Foto', 'callback_check_file_upload');

    $data['ddtipekamar'] = $this->M_fotokamar->dd_tipekamar();

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/fotokamar/v_insert');
        $this->load->view('admin/footer');
    } else {
        $id_tipe_kamar = $this->input->post('id_tipe_kamar');
        $deskripsi_foto = $this->input->post('deskripsi_foto');

        // Upload images
        $image_data = $this->upload_images();

        // Insert foto_kamar records
        foreach ($image_data as $image) {
            $this->M_fotokamar->dt_foto_kamar_insert($id_tipe_kamar, $image['file_name'], $deskripsi_foto);
        }

        redirect(base_url('fotokamar'));
    }
}


    public function fotokamar_update($id)
    {
        $data['title'] = 'Update Foto Kamar';

        $this->form_validation->set_rules('id_tipe_kamar', 'Tipe Kamar', 'callback_dd_cek');
        $this->form_validation->set_rules('deskripsi_foto', 'Deskripsi Foto', 'required');
        
        $data['d'] = $this->M_fotokamar->get('tb_foto_kamar', null, array('id_foto' => $id));
        $data['ddtipekamar'] = $this->M_fotokamar->dd_tipekamar();
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/fotokamar/v_update');
            $this->load->view('admin/footer');
        } else {
            $id_tipe_kamar = $this->input->post('id_tipe_kamar');
            $deskripsi_foto = $this->input->post('deskripsi_foto');

            // Check if new images are uploaded
            $image_data = $this->upload_images();

            if (!empty($image_data)) {
                // New images are uploaded, update all images for the given ID
                $this->M_fotokamar->delete_images($id);
                foreach ($image_data as $image) {
                    $this->M_fotokamar->dt_foto_kamar_insert($id_tipe_kamar, $image['file_name'], $deskripsi_foto);
                }
            } else {
                // No new images are uploaded, update other fields without modifying images
                $this->M_fotokamar->dt_foto_kamar_update($id_tipe_kamar,$nama_foto, $deskripsi_foto);
            }

            redirect(base_url('fotokamar'));
        }
    }

    private function upload_images()
    {
        $config['upload_path'] = './uploads/foto_kamar/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048; // Maximum file size in kilobytes
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $uploaded_images = [];
        $files = $_FILES['images'];

        // Check if files were uploaded
        if (!empty($files['name'][0])) {
            $count = count($files['name']);

            // Loop through each uploaded file
            for ($i = 0; $i < $count; $i++) {
                $_FILES['image']['name'] = $files['name'][$i];
                $_FILES['image']['type'] = $files['type'][$i];
                $_FILES['image']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['image']['error'] = $files['error'][$i];
                $_FILES['image']['size'] = $files['size'][$i];

                // Upload the file
                if ($this->upload->do_upload('image')) {
                    $uploaded_images[] = $this->upload->data();
                }
            }
        }

        return $uploaded_images;
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

    public function check_file_upload($files)
{
    if (empty($files['name'][0])) {
        $this->form_validation->set_message('check_file_upload', 'Gambar harus diupload minimal 1 file.');
        return FALSE;
    }
    return TRUE;
}

    public function fotokamar_delete($id)
    {
        $this->M_kamar->hapus_data('tb_fotokamar', 'id_foto', $id);
        redirect(base_url('kamar'));
    }

}
?>

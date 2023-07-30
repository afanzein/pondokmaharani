<?php
class Reservation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tipekamar'); // Load the M_daftar model
        $this->load->model('M_reservation');
        $this->load->model('M_tamu');
    }

    public function pesan()
    {
        // Assuming you have received the id_tipe_kamar from the URL parameter
        $id_tipe_kamar = $this->input->get('id_tipe_kamar');
    
        $data['products'] = $this->M_tipekamar->getProducts();
    
        // Populate the 'images' index for each product
        foreach ($data['products'] as &$product) {
            $product['images'] = $this->M_tipekamar->getPhotosByTipeKamar($product['id_tipe_kamar']);
        }
    
        // Find the selected room based on the provided id_tipe_kamar
        $selected_room = null;
        foreach ($data['products'] as $product) {
            if ($product['id_tipe_kamar'] == $id_tipe_kamar) {
                $selected_room = $product;
                break;
            }
        }
    
        if ($selected_room) {
            $data['selected_room'] = $selected_room;
            $data['room_name'] = $selected_room['nama_tipe_kamar'];
            $data['fasilitas'] = $selected_room['fasilitas'];
            $data['harga_permalam'] = $selected_room['harga_permalam'];
            $data['harga_perminggu'] = $selected_room['harga_perminggu'];
            $data['harga_perbulan'] = $selected_room['harga_perbulan'];
    
            // Ambil data session dari variabel yang telah diatur di header.php
            $id_akun_session = $this->session->userdata('id_akun');
            $user_name = $this->M_tamu->getUserNameByIdAkun($id_akun_session);
    
            // If the user's name is found, assign it to $data['nama_pengguna']
            if ($user_name) {
                $data['nama_pengguna'] = $user_name;
            } else {
                // If user's name is not found, you can set a default name or handle it as needed
                $data['nama_pengguna'] = "Guest";
            }
    
            // Fetch room photos for the selected room
            $data['photos'] = $this->M_tipekamar->getPhotosByTipeKamar($selected_room['id_tipe_kamar']);
    
            $data['title'] = 'Pondok Maharani';
            $this->load->view('user/header', $data);
            $this->load->view('user/reservation', $data); // Load the reservation.php view
            $this->load->view('user/footer');
        } else {
            // Handle the case where the selected room is not found
            // You can redirect to an error page or perform any other action as needed.
        }
    }    
    
}
?>
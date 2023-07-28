<?php
class M_reservation extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertReservationData($tgl_pemesanan, $nik_tamu, $id_kamar, $tgl_checkin, $tgl_checkout)
{
    try {
        // Step 1: Insert reservation details into tb_pemesanan table
        $data_pemesanan = array(
            'tgl_pemesanan' => $tgl_pemesanan,
            'nik_tamu' => $nik_tamu,
            'id_kamar' => $id_kamar
        );
        $this->db->insert('tb_pemesanan', $data_pemesanan);

        // Success: Reservation details inserted into tb_pemesanan

        // Step 2: Retrieve the generated id_pemesanan
        $generated_id = $this->db->insert_id();

        // Step 3: If tb_pemesanan insertion is successful, then insert check-in and check-out details into tb_checkinout table
        if ($generated_id) {
            $data_checkinout = array(
                'id_pemesanan' => $generated_id,
                'tgl_checkin' => $tgl_checkin,
                'tgl_checkout' => $tgl_checkout
            );
            $this->db->insert('tb_checkinout', $data_checkinout);

            // Success: Check-in and check-out details inserted into tb_checkinout
            // Perform any further actions or display a success message
        } else {
            // Handle the case where tb_pemesanan insertion fails
            // You can raise an error, log a message, or perform any other action as needed.
            // For example:
            throw new Exception("Failed to insert data into tb_pemesanan");
        }
    } catch (Exception $e) {
        // Handle the error or display an error message
    }
}

}
?>
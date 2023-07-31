<?php 
    class M_pemesanan extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_pemesanan')->result();
        }

        public function dt_pemesanan()
        {
            $this->db->select('p.id_pemesanan, p.tgl_pemesanan, t.nama_tamu, k.nomor_kamar, s.status');
            $this->db->from('tb_pemesanan p');
            $this->db->join('tb_tamu t', 'p.nik_tamu = t.nik_tamu');
            $this->db->join('tb_kamar k', 'p.id_kamar = k.id_kamar');
            $this->db->join('tb_status_pemesanan s', 'p.id_pemesanan = s.id_pemesanan');
            $query = $this->db->get();
            return $query->result_array();
        }            
        
        public function dt_pemesanan_insert()
        {
            // Assuming you have received the form data and stored it in variables
            $tgl_pemesanan = $this->input->post('tgl_pemesanan');
            $nik_tamu = $this->input->post('nik_tamu');
            $id_kamar = $this->input->post('id_kamar');
            $tgl_checkin = $this->input->post('tgl_checkin');
            $tgl_checkout = $this->input->post('tgl_checkout');
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

        public function user_pemesanan($id_tipe_kamar){
        // Assuming you have received the form data and stored it in variables
        $tgl_pemesanan = date('Y-m-d');
        $tgl_checkin = $this->input->post('tgl_checkin');
        $tgl_checkout = $this->input->post('tgl_checkout');

        // Retrieve nik_tamu from tb_tamu based on id_akun from session
        $id_akun_session = $this->session->userdata('id_akun');
        $this->load->model('M_tamu');
        $nik_tamu = $this->M_tamu->getNikTamuByIdAkun($id_akun_session);

        // Retrieve the available id_kamar based on the selected id_tipe_kamar and status_kamar
        $this->load->model('M_kamar');
        $id_kamar = $this->M_kamar->getAvailableKamarId($id_tipe_kamar);
        echo $id_tipe_kamar;


            try {
                // Step 1: Insert reservation details into tb_pemesanan table
                $data_pemesanan = array(
                    'tgl_pemesanan' => $tgl_pemesanan,
                    'nik_tamu' => $nik_tamu,
                    'id_kamar' => $id_kamar // Use the retrieved id_kamar
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
                alert("Pemesanan gagal dilakukan");
            }
        }
        
        public function dt_pemesanan_update($id)
        {
            $data = array(
                'tgl_pemesanan' => $this->input->post('tgl_pemesanan'),
                'nik_tamu' => $this->input->post('nik_tamu'),
                'id_kamar' => $this->input->post('id_kamar')
            );
            $this->db->where('id_pemesanan', $id);
            return $this->db->update('tb_pemesanan', $data);
        }

        function hapus_data($tabel, $kolom, $id)  
        {
            $this->db->delete($tabel, array($kolom => $id));
            if (!$this->db->affected_rows())
                return (FALSE);
            else
                return (TRUE);
        }

    public function dd_kamar()
    {
        $this->db->where('status_kamar !=', 'Tidak Tersedia');
        $query = $this->db->get('tb_kamar');
        $result = $query->result();

        $id_kamar = array('-Pilih-');
        $nomor_kamar = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_kamar, $result[$i]->id_kamar);
            array_push($nomor_kamar, $result[$i]->nomor_kamar);
        }
        return array_combine($id_kamar, $nomor_kamar);
    }


    public function dd_tamu()
    {
        $query = $this->db->get('tb_tamu');
        $result = $query->result();

        $nik = array('-Pilih-');
        $nama = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($nik, $result[$i]->nik_tamu);
            array_push($nama, $result[$i]->nama_tamu);
        }
        return array_combine($nik, $nama);
    }


    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }
    
       public function jumlah_record_tabel($tabel)    
    {
        $query = $this->db->select("COUNT(*) as num")->get($tabel);
        $result = $query->row();
        if (isset($result))
            return $result->num;
        return 0;
    }
  
  
    public function cari_data($tabel, $namafield, $isifield)
{
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where($namafield,$isifield);
            $query = $this->db->get();
            return $query->row_array();           
    }
}
?>
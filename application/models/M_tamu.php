<?php 
    class M_tamu extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_tamu')->result();
        }

            public function dt_tamu()
    {
        $this->db->select('t.nik_tamu, t.nama_tamu, t.jenis_kelamin, t.tgl_lahir, t.no_telp, t.alamat, a.id_akun');
        $this->db->from('tb_tamu t');
        $this->db->join('tb_akun a', 't.id_akun = a.id_akun');
        $query = $this->db->get();
        return $query->result_array();        
    }

    public function getUserNameByIdAkun($id_akun)
    {
        $this->db->select('nama_tamu');
        $this->db->from('tb_tamu');
        $this->db->join('tb_akun', 'tb_tamu.id_akun = tb_akun.id_akun');
        $this->db->where('tb_tamu.id_akun', $id_akun);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->nama_tamu;
        } else {
            return false;
        }
    }

    public function getNikTamuByIdAkun($id_akun)
    {
        // Assuming the table name is 'tb_tamu'
        $this->db->where('id_akun', $id_akun);
        $query = $this->db->get('tb_tamu');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nik_tamu;
        }

        return null;
    }

    public function getTamuByIdAkun($id_akun) {
        $this->db->where('id_akun', $id_akun);
        $query = $this->db->get('tb_tamu');
        return $query->row_array();
    }

    public function updateProfil($id_akun) {
        // Check if data for the user already exists
        $existing_data = $this->getTamuByIdAkun($id_akun);
        $data = array(
            'nik_tamu' => $this->input->post('nik_tamu'),
            'nama_tamu' => $this->input->post('nama_tamu'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'id_akun' => $id_akun // Set the id_akun based on the logged-in user
        );
        
        if ($existing_data) {
            // Data already exists, perform an update
            $this->db->where('id_akun', $id_akun);
            $this->db->update('tb_tamu', $data);
        } else {
            // Data doesn't exist, perform an insert
            $this->db->insert('tb_tamu', $data);
        }
    }

    public function dt_tamu_insert()
    {
        $data = array(
            'nik_tamu' => $this->input->post('nik_tamu'),
            'nama_tamu' => $this->input->post('nama_tamu'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'id_akun' => $this->input->post('id_akun')
        );
        return $this->db->insert('tb_tamu', $data);
    }

    public function dt_tamu_update($nik)
    {
        $data = array(
            'nama_tamu' => $this->input->post('nama_tamu'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'id_akun' => $this->input->post('id_akun')
        );
        $this->db->where('nik_tamu', $nik);
        return $this->db->update('tb_tamu', $data);
    }

    function hapus_data($tabel, $kolom, $id)  
    {
        $this->db->delete($tabel, array($kolom => $id));
        if (!$this->db->affected_rows())
            return (FALSE);
        else
            return (TRUE);
    }

    public function dd_tamu()
    {
        $query = $this->db->get('tb_akun');
        $result = $query->result();

        $id_akun = array('-Pilih-');
        $email = array('-Pilih-');
        
        for ($i = 0; $i < count($result); $i++) {
            array_push($id_akun, $result[$i]->id_akun);
            array_push($email, $result[$i]->email);
        }
        return array_combine($id_akun, $email);
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
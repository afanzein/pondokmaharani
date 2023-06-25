<?php 
    class M_pegawai extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_pegawai')->result();
        }

        public function dt_pegawai()
        {
            $this->db->select('p.nik_pegawai, p.nama_pegawai, p.jenis_kelamin, p.tgl_lahir, p.jabatan, p.no_telp, p.alamat, a.id_akun');
            $this->db->from('tb_pegawai p');
            $this->db->join('tb_akun a', 'p.id_akun = a.id_akun');
            $query = $this->db->get();
            return $query->result_array();        
        }
        
        public function dt_pegawai_insert()
        {
            $data = array(
                'nik_pegawai' => $this->input->post('nik_pegawai'),
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jabatan' => $this->input->post('jabatan'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'id_akun' => $this->input->post('id_akun')
            );
            return $this->db->insert('tb_pegawai', $data);
        }
        
        public function dt_pegawai_update($nik)
        {
            $data = array(
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jabatan' => $this->input->post('jabatan'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'id_akun' => $this->input->post('id_akun')
            );
            $this->db->where('nik_pegawai', $nik);
            return $this->db->update('tb_pegawai', $data);
        }
        

    public function dd_role()
    {
        $query = $this->db->get('tb_role');
        $result = $query->result();

        $id_role = array('-Pilih-');
        $nama_role = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_role, $result[$i]->id_role);
            array_push($nama_role, $result[$i]->nama_role);
        }
        return array_combine($id_role, $nama_role);
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
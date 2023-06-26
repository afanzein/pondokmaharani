<?php 
    class M_statuspemesanan extends CI_Model{

        public function __construct()
        {
            $this->load->database();
            return $this->db->get('tb_status_pemesanan')->result();
        }

            public function dt_status_pemesanan()
    {
        $this->db->select('sp.id_status_pemesanan, p.id_pemesanan, sp.status');
        $this->db->from('tb_status_pemesanan sp');
        $this->db->join('tb_pemesanan p', 'sp.id_pemesanan = p.id_pemesanan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_status_pemesanan_insert()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'status' => $this->input->post('status')
        );
        return $this->db->insert('tb_status_pemesanan', $data);
    }

    public function dt_status_pemesanan_update($id)
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'status' => $this->input->post('status')
        );
        $this->db->where('id_status_pemesanan', $id);
        return $this->db->update('tb_status_pemesanan', $data);
    }

    function hapus_data($tabel, $kolom, $id)  
    {
        $this->db->delete($tabel, array($kolom => $id));
        if (!$this->db->affected_rows())
            return (FALSE);
        else
            return (TRUE);
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
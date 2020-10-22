<?php

class M_SuratBebas extends CI_Model {
    
    //Fungsi untuk mendapatkan data dari database grt(nama table)
    public function get_data($limit,$start)
    {
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = surat_bebas_labkom.nim','LEFT');
        $query = $this->db->get('surat_bebas_labkom',$limit, $start);
        return $query;
    }

    public function get_details($where,$table){
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = surat_bebas_labkom.nim','LEFT');
        $query = $this->db->get_where($table,$where);
        return $query;
    }

    //Fungsi untuk input data 
    public function insert_entry($data)
    {
        $this->db->insert('surat_bebas_labkom',$data);

    }

    public function get_id()
    {
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    //Fungsi untuk hapus data
    public function delete_entry($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Fungsi untuk edit data 
    
    
    public function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
    }


    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }


} 
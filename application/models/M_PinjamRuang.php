<?php

class M_PinjamRuang extends CI_Model {
    
    //Fungsi untuk mendapatkan data dari database grt(nama table)
    public function get_data($limit,$start)
    {
        // return $this->db->get('peminjaman_ruang')->result_array();
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_ruang.nim','LEFT');
        $this->db->join('lab','lab.id_lab = peminjaman_ruang.id_lab','LEFT');
        $query = $this->db->get('peminjaman_ruang',$limit,$start);
        return $query;

    }


    public function get_lab()
    {
            $query = $this->db->get('lab');
            return $query;
    }

    public function get_details($where,$table){
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_ruang.nim','LEFT');
        $this->db->join('lab','lab.id_lab = peminjaman_ruang.id_lab','LEFT');
        $query = $this->db->get_where($table,$where);
        return $query;
    }
    
    //Fungsi untuk input data 
    public function insert_entry($data)
    {
        $this->db->insert('peminjaman_ruang',$data);
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
<?php

class M_Search extends CI_Model {
    
    
    
    public function get_mhs($where)
    {
        return $this->db->get_where('mahasiswa',$where);
    }

    public function get_pinjam_ruang($where,$table)
    {
        $this->db->select('*');
        // $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_ruang.nim','LEFT');
        $this->db->join('lab','lab.id_lab = peminjaman_ruang.id_lab','LEFT');
        $query = $this->db->get_where($table,$where);
        return $query;
    }

    public function get_pinjam_alat($where,$table){
        $this->db->select('*');
        // $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_alat.nim','LEFT');
        $this->db->join('alat','alat.id_alat = peminjaman_alat.id_alat','LEFT');
        $query = $this->db->get_where($table,$where);
        return $query;
    }

    public function get_Surat($where,$table){
        $this->db->select('*');
        // $this->db->join('mahasiswa','mahasiswa.nim = surat_bebas_labkom.nim','LEFT');
        $query = $this->db->get_where($table,$where);
        return $query;
    }



} 
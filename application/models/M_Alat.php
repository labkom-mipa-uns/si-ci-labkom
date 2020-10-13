<?php

class M_Alat extends CI_Model {
    
    //Fungsi untuk mendapatkan data dari database grt(nama table)
    public function get_data()
    {
        return $this->db->get('alat')->result_array();
    }


    //Fungsi untuk input data 
    public function insert_entry($data)
    {
        $this->db->insert('alat',$data);
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
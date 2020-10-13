<?php

class C_Mhs extends CI_Controller {


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
        $this->load->model('M_Mhs');
        $data['mhs']=$this->M_Mhs->get_data();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('mhs/V_List',$data);
        $this->load->view('layouts/footer');
    }

    public function insert_entry(){

        $nim = $this->input->post('nim');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $prodi = $this->input->post('prodi');

        $data = array(

            'nim' => $nim,
            'nama_lengkap' => $nama_lengkap,
            'prodi' => $prodi
        );

        $this->M_Mhs->insert_entry($data);
        redirect('C_Mhs/index');
    }

    public function delete_entry($nim){
        $where = array('nim'=>$nim);
        $this->M_Mhs->delete_entry($where,'mahasiswa');
        redirect('C_Mhs/index');
    }

    public function edit($nim){

        $where = array('nim'=>$nim);
        $data['mhs'] = $this->M_Mhs->edit_data($where,'mahasiswa')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('mhs/V_edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update(){
        
        $nim = $this->input->post('nim');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $prodi = $this->input->post('prodi');


        $data = array(

            'nim' => $nim,
            'nama_lengkap' => $nama_lengkap,
            'prodi' => $prodi
        );

        $where = array (
            'nim' =>$nim
        );

        $this->M_Mhs->update_data($where,$data,'mahasiswa'); 
        redirect('C_Mhs/index');
    }



}
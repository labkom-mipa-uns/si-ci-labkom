<?php

class C_Alat extends CI_Controller {


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
        $this->load->model('M_Alat');
        $data['alat']=$this->M_Alat->get_data();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('alat/V_List',$data);
        $this->load->view('layouts/footer');
    }

    public function insert_entry(){

        $id_alat = $this->input->post('id_alat');
        $nama_alat = $this->input->post('nama_alat');
        $harga = $this->input->post('harga');

        $data = array(

            'id_alat' => $id_alat,
            'nama_alat' => $nama_alat,
            'harga' => $harga
        );

        $this->M_Alat->insert_entry($data);
        redirect('C_Alat/index');
    }

    public function delete_entry($id_alat){
        $where = array('id_alat'=>$id_alat);
        $this->M_Alat->delete_entry($where,'alat');
        redirect('C_Alat/index');
    }

    public function edit($id_alat){

        $where = array('id_alat'=>$id_alat);
        $data['alat'] = $this->M_Alat->edit_data($where,'alat')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('alat/V_edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update(){
        
        $id_alat = $this->input->post('id_alat');
        $nama_alat = $this->input->post('nama_alat');
        $harga = $this->input->post('harga');


        $data = array(

            'id_alat' => $id_alat,
            'nama_alat' => $nama_alat,
            'harga' => $harga
        );

        $where = array (
            'id_alat' =>$id_alat
        );

        $this->M_Alat->update_data($where,$data,'alat'); 
        redirect('C_Alat/index');
    }



}
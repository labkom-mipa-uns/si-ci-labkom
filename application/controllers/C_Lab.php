<?php

class C_Lab extends CI_Controller {


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
        $this->load->model('M_Lab');
        $data['lab']=$this->M_Lab->get_data();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('lab/V_List',$data);
        $this->load->view('layouts/footer');
    }

    public function insert_entry(){
        $nama_lab = $this->input->post('nama_lab');

        $data = array(

            'nama_lab' => $nama_lab,
        );

        $this->M_Lab->insert_entry($data);
        redirect('C_Lab/index');
    }

    public function delete_entry($id_lab){
        $where = array('id_lab'=>$id_lab);
        $this->M_Lab->delete_entry($where,'lab');
        redirect('C_Lab/index');
    }

    public function edit($id_lab){

        $where = array('id_lab'=>$id_lab);
        $data['lab'] = $this->M_Lab->edit_data($where,'lab')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('lab/V_edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update(){
        
        $id_lab       = $this->input->post('id_lab');
        $nama_lab     = $this->input->post('nama_lab');


        $data = array(

            'id_lab'        => $id_lab,
            'nama_lab'      => $nama_lab,
        );

        $where = array (
            'id_lab' =>$id_lab
        );

        $this->M_Lab->update_data($where,$data,'lab'); 
        redirect('C_Lab/index');
    }



}
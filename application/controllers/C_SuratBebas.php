<?php

class C_SuratBebas extends CI_Controller {


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
        $this->load->model('M_SuratBebas');
        $data['surat']=$this->M_SuratBebas->get_data();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('SuratBebas/V_List',$data);
        $this->load->view('layouts/footer');
    }

    public function insert_entry(){
        $nim = $this->input->post('nim');
        $email = $this->input->post('email');
        $no_wa = $this->input->post('no_wa');
        $tanggal = $this->input->post('tanggal');

        $data = array(

            'nim' => $nim,
            'email' => $email,
            'no_wa' => $no_wa,
            'tanggal' => $tanggal
        );

        $this->M_SuratBebas->insert_entry($data);
        redirect('C_SuratBebas/index');
    }

    public function delete_entry($id_surat){
        $where = array('id_surat'=>$id_surat);
        $this->M_SuratBebas->delete_entry($where,'surat_bebas_labkom');
        redirect('C_SuratBebas/index');
    }

    public function edit($id_surat){

        $where = array('id_surat'=>$id_surat);
        $data['surat'] = $this->M_SuratBebas->edit_data($where,'surat_bebas_labkom')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('SuratBebas/V_edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update(){
        
        $id_surat = $this->input->post('id_surat');
        $nim = $this->input->post('nim');
        $email = $this->input->post('email');
        $no_wa = $this->input->post('no_wa');
        $tanggal = $this->input->post('tanggal');


        $data = array(

            'id_surat' => $id_surat,
            'nim' => $nim,
            'email' => $email,
            'no_wa' => $no_wa,
            'tanggal' => $tanggal
        );

        $where = array (
            'id_surat' =>$id_surat
        );

        $this->M_SuratBebas->update_data($where,$data,'surat_bebas_labkom'); 
        redirect('C_SuratBebas/index');
    }

    public function details($id_surat){

        $where = array('id_surat'=>$id_surat);
        $data['surat'] = $this->M_SuratBebas->get_details($where,'surat_bebas_labkom')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('SuratBebas/V_details',$data);
        $this->load->view('layouts/footer');

    }




}
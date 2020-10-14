<?php

class C_PinjamRuang extends CI_Controller {


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
        $this->load->model('M_PinjamRuang');
        $data['p_ruang']=$this->M_PinjamRuang->get_data();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('PinjamRuang/V_list',$data);
        $this->load->view('layouts/footer');
    }

    public function insert_entry(){

        $nim = $this->input->post('nim');
        $tanggal = $this->input->post('tanggal');
        $id_lab = $this->input->post('id_lab');
        $jam_pinjam = $this->input->post('jam_pinjam');
        $jam_kembali = $this->input->post('jam_kembali');
        $keperluan = $this->input->post('keperluan');

        $data = array(

            'nim' => $nim,
            'tanggal' => $tanggal,
            'id_lab' => $id_lab,
            'jam_pinjam' => $jam_pinjam,
            'jam_kembali' => $jam_kembali,
            'keperluan' => $keperluan
        );

        $this->M_PinjamRuang->insert_entry($data);
        redirect('C_PinjamRuang/index');
    }

    public function delete_entry($id_pinjam_ruang){
        $where = array('id_pinjam_ruang'=>$id_pinjam_ruang);
        $this->M_PinjamRuang->delete_entry($where,'peminjaman_ruang');
        redirect('C_PinjamRuang/index');
    }

    public function edit($id_pinjam_ruang){

        $where = array('id_pinjam_ruang'=>$id_pinjam_ruang);
        $data['p_ruang'] = $this->M_PinjamRuang->edit_data($where,'peminjaman_ruang')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('PinjamRuang/V_edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update(){
        
        $id_pinjam_ruang = $this->input->post('id_pinjam_ruang');
        $nim = $this->input->post('nim');
        $tanggal = $this->input->post('tanggal');
        $id_lab = $this->input->post('id_lab');
        $jam_pinjam = $this->input->post('jam_pinjam');
        $jam_kembali = $this->input->post('jam_kembali');
        $keperluan = $this->input->post('keperluan');

        $data = array(

            'id_pinjam_ruang' => $id_pinjam_ruang,
            'nim' => $nim,
            'tanggal' => $tanggal,
            'id_lab' => $id_lab,
            'jam_pinjam' => $jam_pinjam,
            'jam_kembali' => $jam_kembali,
            'keperluan' => $keperluan
        );

        $where = array (
            'id_pinjam_ruang' =>$id_pinjam_ruang
        );

        $this->M_PinjamRuang->update_data($where,$data,'peminjaman_ruang'); 
        redirect('C_PinjamRuang/index');
    }


        public function details($id_pinjam_ruang){

            $where = array('id_pinjam_ruang'=>$id_pinjam_ruang);
            $data['p_ruang'] = $this->M_PinjamRuang->get_details($where,'peminjaman_ruang')->result();
            $this->load->view('layouts/header');
            $this->load->view('layouts/navbar');
            $this->load->view('layouts/sidebar');
            $this->load->view('PinjamRuang/V_details',$data);
            $this->load->view('layouts/footer');
    
        }



}
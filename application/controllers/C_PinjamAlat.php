<?php

class C_PinjamAlat extends CI_Controller {


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
        $this->load->model('M_PinjamAlat');
        $data['p_alat']=$this->M_PinjamAlat->get_data();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('PinjamAlat/V_list',$data);
        $this->load->view('layouts/footer');
    }

    public function insert_entry(){

        $nim = $this->input->post('nim');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $id_alat = $this->input->post('id_alat');
        
        $where = array('id_alat'=>$id_alat);
        $harga=$this->M_PinjamAlat->get_harga($where,'alat');

        $jumlah_alat = $this->input->post('jumlah_alat');
        $total_harga = $jumlah_alat*$harga;
        $status = $this->input->post('status');


        $data = array(

            'nim' => $nim,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'id_alat' => $id_alat,
            'jumlah_alat' => $jumlah_alat,
            'total_harga' => $total_harga,
            'status' => $status
        );

        $this->M_PinjamAlat->insert_entry($data);
        redirect('C_PinjamAlat/index');
    }

    public function delete_entry($id_pinjam_alat){
        $where = array('id_pinjam_alat'=>$id_pinjam_alat);
        $this->M_PinjamAlat->delete_entry($where,'peminjaman_alat');
        redirect('C_PinjamAlat/index');
    }

    public function edit($id_pinjam_alat){

        $where = array('id_pinjam_alat'=>$id_pinjam_alat);
        $data['p_alat'] = $this->M_PinjamAlat->edit_data($where,'peminjaman_alat')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('PinjamAlat/V_edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update(){
        
        $id_pinjam_alat = $this->input->post('id_pinjam_alat');
        $nim = $this->input->post('nim');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $id_alat = $this->input->post('id_alat');
        $jumlah_alat = $this->input->post('jumlah_alat');
        $total_harga = 10000;
        $status = $this->input->post('status');

        $data = array(

            'id_pinjam_alat' => $id_pinjam_alat,
            'nim' => $nim,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'id_alat' => $id_alat,
            'jumlah_alat' => $jumlah_alat,
            'total_harga' => $total_harga,
            'status' => $status
        );

        $where = array (
            'id_pinjam_alat' =>$id_pinjam_alat
        );

        $this->M_PinjamAlat->update_data($where,$data,'peminjaman_alat'); 
        redirect('C_PinjamAlat/index');
    }


        public function details($id_pinjam_alat){

            $where = array('id_pinjam_alat'=>$id_pinjam_alat);
            $data['p_alat'] = $this->M_PinjamAlat->get_details($where,'peminjaman_alat')->result();
            $this->load->view('layouts/header');
            $this->load->view('layouts/navbar');
            $this->load->view('layouts/sidebar');
            $this->load->view('PinjamAlat/V_details',$data);
            $this->load->view('layouts/footer');
        }



}
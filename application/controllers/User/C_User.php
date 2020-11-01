<?php

class C_User extends CI_Controller {

    //index untuk menampilkan data dan menampilkan layout
    public function index(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/Layouts/cover');
        $this->load->view('User/Layouts/footer');  
    }



    public function services(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/Services/services');
        $this->load->view('User/Layouts/footer');  
    }

    public function kontak(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/Kontak/kontak');
        $this->load->view('User/Layouts/footer');  
    }

    public function tentang(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/Tentang/tentang');
        $this->load->view('User/Layouts/footer');  
    }
    

}
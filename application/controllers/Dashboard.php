<?php 


class Dashboard extends CI_Controller {

    public function index(){

    }

    public function admin(){

        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('Dashboard/dashboard');
        $this->load->view('layouts/footer');

    }
}
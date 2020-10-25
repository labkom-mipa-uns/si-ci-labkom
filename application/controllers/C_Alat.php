<?php

class C_Alat extends CI_Controller {


    function __construct(){
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');
 
        //load the department_model
        $this->load->model('M_Alat');
    }

    //index untuk menampilkan data dan menampilkan layout
    public function index(){
        //konfigurasi pagination
        $config['base_url'] = site_url('C_Alat/index'); //site url
        $config['total_rows'] = $this->db->count_all('alat'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']         = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel M_Alat. 
        $data['data'] = $this->M_Alat->get_data($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Alat/V_list',$data);
        $this->load->view('Layouts/footer');  
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
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Alat/V_edit',$data);
        $this->load->view('Layouts/footer');
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
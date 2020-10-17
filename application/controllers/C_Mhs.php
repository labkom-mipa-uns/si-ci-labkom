<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class C_Mhs extends CI_Controller {


    function __construct(){
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');
 
        //load the department_model
        $this->load->model('M_Mhs');
    }


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
                //konfigurasi pagination
                $config['base_url'] = site_url('C_Mhs/index'); //site url
                $config['total_rows'] = $this->db->count_all('mahasiswa'); //total row
                $config['per_page'] = 15;  //show record per halaman
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
         
                //panggil function get_mahasiswa_list yang ada pada mmodel M_Mhs. 
                $data['data'] = $this->M_Mhs->get_data($config["per_page"], $data['page']);           
         
                $data['pagination'] = $this->pagination->create_links();

                $this->load->view('layouts/header');
                $this->load->view('layouts/navbar');
                $this->load->view('layouts/sidebar');
                $this->load->view('Mhs/V_List',$data);
                $this->load->view('layouts/footer');  
    }

    public function insert_entry(){

        $nim = $this->input->post('nim');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $angkatan = $this->input->post('angkatan');
        $prodi = $this->input->post('prodi');

        $data = array(

            'nim' => $nim,
            'nama_lengkap' => $nama_lengkap,
            'angkatan' => $angkatan,
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

    public function upload() 
    {
        $config['upload_path'] = './uploads/mahasiswa-excel';
        $config['allowed_types'] = 'xlsx';
 
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('file')) 
        {
            echo "error Bos";
        } 
        else 
        {
            ///ANYONE, SIAPAPUN YANG BESOK MEGANG SI INI, PESAN DARI FOUNDERNYA, INI MAAP DATABASE MASIH DI CONTROLLER HAHAHAHAH, 
            ///KALO BISA BESOK DI UBAH KE MVC YANG BENAR YA HAHAHAH
            $host       = "localhost";
            $user       = "root";
            $password   = "";
            $database   = "si_labkom02";
            $koneksi    = mysqli_connect($host, $user, $password, $database);

            $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
         
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
         
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
             
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for($i = 1;$i < count($sheetData);$i++)
            {
                $nim = $sheetData[$i]['1'];
                $nama_lengkap = $sheetData[$i]['2'];
                $angkatan = $sheetData[$i]['3'];
                $prodi = $sheetData[$i]['4'];

                
                
                mysqli_query($koneksi,"insert into mahasiswa (nim,nama_lengkap,angkatan, prodi) values ('$nim','$nama_lengkap','$angkatan','$prodi')");
            }
                    
            redirect('C_Mhs/index');
        }
    }

    public function download(){

        force_download('./downloads/data_excel.xlsx',NULL);
    }



}
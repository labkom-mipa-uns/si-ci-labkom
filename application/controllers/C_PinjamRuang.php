<?php
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

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
        $no_wa = $this->input->post('no_wa');
        $tanggal = $this->input->post('tanggal');
        $id_lab = $this->input->post('id_lab');
        $jam_pinjam = $this->input->post('jam_pinjam');
        $jam_kembali = $this->input->post('jam_kembali');
        $keperluan = $this->input->post('keperluan');

        $data = array(

            'nim' => $nim,
            'no_wa' => $no_wa,
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

        public function word($id_pinjam_ruang){
            $where = array('id_pinjam_ruang'=>$id_pinjam_ruang);
            $data= $this->M_PinjamRuang->get_details($where,'peminjaman_ruang')->result();
            
            $phpWord = new PhpWord();
            $template = $phpWord->loadTemplate('./uploads/template/surat-peminjaman-lab.docx');
    
            

            foreach ($data as $row) { 
                $nama_lengkap = $row->nama_lengkap;
                $nim = $row->nim;
                $no_wa = $row->no_wa;
                $keperluan = $row->keperluan;
                $nama_lab = $row->nama_lab;
                setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
                $tanggal = strftime( "%d %B %Y" , strtotime($row->tanggal));
                $jam_pinjam = date("H.i", strtotime($row->jam_pinjam));
                $jam_kembali = date("H.i", strtotime($row->jam_kembali));
                $today = strftime( "%d %B %Y" , time());
               
                $template->setValue('nama_lengkap', $nama_lengkap);
                $template->setValue('nim', $nim);
                $template->setValue('no_wa', $no_wa);
                $template->setValue('keperluan', $keperluan);
                $template->setValue('nama_lab', $nama_lab);
                $template->setValue('tanggal', $tanggal);
                $template->setValue('jam_pinjam', $jam_pinjam);
                $template->setValue('jam_kembali', $jam_kembali);
                $template->setValue('today', $today);
            }
    
            $temp_filename = 'SURAT PEMINJAMAN LAB.docx';
            $template->saveAs($temp_filename);
    
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.$temp_filename);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($temp_filename));
            flush();
            readfile($temp_filename);
            unlink($temp_filename);
            exit;    
        }

}
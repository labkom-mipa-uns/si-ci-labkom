<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

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
        $jam = $this->input->post('jam');
        $tempat = $this->input->post('tempat');
        $id_alat = $this->input->post('id_alat');
        
        $where = array('id_alat'=>$id_alat);
        $harga=$this->M_PinjamAlat->get_harga($where,'alat');

        $jumlah_alat = $this->input->post('jumlah_alat');
        $total_harga = $jumlah_alat*$harga;
        $keperluan = $this->input->post('keperluan');
        $status = $this->input->post('status');


        $data = array(

            'nim' => $nim,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'jam' => $jam,
            'tempat' => $tempat,
            'id_alat' => $id_alat,
            'jumlah_alat' => $jumlah_alat,
            'total_harga' => $total_harga,
            'keperluan' => $keperluan,
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
        $jam = $this->input->post('jam');
        $tempat = $this->input->post('tempat');
        $id_alat = $this->input->post('id_alat');

        $where = array('id_alat'=>$id_alat);
        $harga=$this->M_PinjamAlat->get_harga($where,'alat');

        $jumlah_alat = $this->input->post('jumlah_alat');
        $total_harga = $jumlah_alat*$harga;
        $keperluan = $this->input->post('keperluan');
        $status = $this->input->post('status');

        $data = array(

            'id_pinjam_alat' => $id_pinjam_alat,
            'nim' => $nim,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'jam' => $jam,
            'tempat' => $tempat,
            'id_alat' => $id_alat,
            'jumlah_alat' => $jumlah_alat,
            'keperluan' => $keperluan,
            'total_harga' => $total_harga,
            'keperluan' => $keperluan,
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

        public function word($id_pinjam_alat){
            $where = array('id_pinjam_alat'=>$id_pinjam_alat);
            $data= $this->M_PinjamAlat->get_details($where,'peminjaman_alat')->result();
            
            $phpWord = new PhpWord();
            $template = $phpWord->loadTemplate('./uploads/template/surat-peminjaman-alat.docx');
    
            

            foreach ($data as $row) { 
                $nama_lengkap = $row->nama_lengkap;
                $nim = $row->nim;
                $prodi = $row->prodi;
                $nama_alat = $row->nama_alat;
                $jumlah_alat = $row->jumlah_alat;
                $keperluan = $row->keperluan;
                setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
                $today = strftime( "%d %B %Y" , time());
                $tanggal_pinjam = strftime( "%d %B " , strtotime($row->tanggal_pinjam));
                $hari_pinjam = strftime( "%A" , strtotime($row->tanggal_pinjam));
                $tanggal_kembali = strftime( "%d %B %Y" , strtotime($row->tanggal_kembali));
                $hari_kembali = strftime( "%A" , strtotime($row->tanggal_kembali));
                $d=strtotime($row->jam);
                $jam = date("H.i", $d);
                $tempat = $row->tempat;
               
                $template->setValue('nama_lengkap', $nama_lengkap);
                $template->setValue('nim', $nim);
                $template->setValue('prodi', $prodi);
                $template->setValue('nama_alat', $nama_alat);
                $template->setValue('jumlah_alat', $jumlah_alat);
                $template->setValue('keperluan', $keperluan);
                $template->setValue('today', $today);
                $template->setValue('tanggal_pinjam', $tanggal_pinjam);
                $template->setValue('hari_pinjam', $hari_pinjam);
                $template->setValue('tanggal_kembali', $tanggal_kembali);
                $template->setValue('hari_kembali', $hari_kembali);
                $template->setValue('jam', $jam);
                $template->setValue('tempat', $tempat);
            }
    
            $temp_filename = 'SURAT PEMINJAMAN ALAT.docx';
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
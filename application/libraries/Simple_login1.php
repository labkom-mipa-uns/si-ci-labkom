<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 

class Simple_login1 {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function login($id_admin, $pass) {
		$query = $this->CI->db->get_where('user_admin',array('id_admin'=>$id_admin,'pass' => $pass));
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT id_admin FROM user_admin where id_admin = "'.$id_admin.'"');
			$admin 	= $row->row();
			$id 	= $admin->id_admin;
			$this->CI->session->set_userdata('id_admin', $id_admin);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			redirect(base_url('Dashboard/admin'));
		}else{
			$this->CI->session->set_flashdata('sukses','Oops... Username/pass salah');
			redirect(base_url('login'));
		}
		return false;
	}
	// Proteksi halaman
	public function cek_login() {
		if($this->CI->session->userdata('id_admin') == '') {
			$this->CI->session->set_flashdata('sukses','Anda belum login');
			redirect(base_url('login'));
		}
	}
	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('id_admin');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'));
	}
}
<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login?message=user&password_salah"));
		} else {
			$data['pegawai'] = $this->m_login->selectAll();
			redirect('dashboard1?login=success');
		}
	}

	function index(){
		$this->load->view('dashboard1');
	}
}

?>
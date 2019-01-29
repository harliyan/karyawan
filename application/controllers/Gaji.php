<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_gaji');
		$this->load->helper('url');
	}

	function index(){
		$data['gaji_pegawai'] = $this->m_data_gaji->selectAll();
		$this->load->view('gaji',$data);
	}
	
	function edit($no){
		$where = array('no' => $no);
		$data['gaji_pegawai'] = $this->m_data_gaji->edit_data($where,'gaji_pegawai')->result();
		$this->load->view('gaji_edit',$data);
	}
	
	function update(){
		$no = $this->input->post('no');
		$jabatan = $this->input->post('jabatan');
		$gaji = $this->input->post('gaji');
		
		$data = array(
			'jabatan' => $jabatan,
			'gaji' => $gaji
		);

		$where = array(
			'no' => $no
		);

		$this->m_data_gaji->update_data($where,$data,'gaji_pegawai');
		redirect('gaji/index');
	}
	
	function hapus($no){
		$where = array('no' => $no);
		$this->m_data_gaji->hapus_data($where,'gaji_pegawai');
		redirect('gaji/index');
	}
	
	function tambah(){
		$this->load->view('gaji_tambah');
	}

	function tambah_aksi(){
		error_reporting(E_ALL ^ E_DEPRECATED);
		include "/template/koneksi.php";
		$query = mysql_query("SELECT MAX(no) from gaji_pegawai");
		if($query === FALSE) { 
			die(mysql_error()); // TODO: better error handling
		}
		$no = mysql_fetch_array($query);
		$no++;
		$no = $this->input->post('no');
		$jabatan = $this->input->post('jabatan');
		$gaji = $this->input->post('gaji');
		
		$data = array(
			'no' => $no,
			'jabatan' => $jabatan,
			'gaji' => $gaji
		);
		
		$this->m_data_gaji->input_data($data,'gaji_pegawai');
		redirect('gaji/index');
	}
	
}
?>
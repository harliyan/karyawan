<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_manager');
		$this->load->helper('url');
	}

	function index(){
		$data['pegawai'] = $this->m_data_manager->selectAll();
		$this->load->view('manager',$data);
	}
	
	function edit($nip){
		$where = array('nip' => $nip);
		$data['pegawai'] = $this->m_data_manager->edit_data($where,'pegawai')->result();
		$this->load->view('manager_edit',$data);
	}
	
	function update(){
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$jabatan = $this->input->post('jabatan');
		$divisi = $this->input->post('divisi');
		
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'email' => $email,
			'jabatan' => $jabatan,
			'divisi' => $divisi
		);

		$where = array(
			'nip' => $nip
		);

		$this->m_manager->update_data($where,$data,'pegawai');
		redirect('manager/index');
	}
	
	function hapus($nip){
		$where = array('nip' => $nip);
		$this->m_data_manager->hapus_data($where,'pegawai');
		redirect('manager/index');
	}
	
	function tambah(){
		$this->load->view('manager_tambah');
	}

	function tambah_aksi(){
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$jabatan = $this->input->post('jabatan');
		$divisi = $this->input->post('divisi');
		$idadmin = $this->input->post('idadmin');
		
		$data = array(
			'nip' => $nip,
			'nama' => $nama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'email' => $email,
			'jabatan' => $jabatan,
			'divisi' => $divisi,
			'id_admin' => $idadmin
		);
		
		$this->m_data_manager->input_data($data,'pegawai');
		redirect('manager/index');
	}
	
}
?>
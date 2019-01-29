<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_karyawan');
		$this->load->helper('url');
	}

	function index(){
		$data['pegawai'] = $this->m_data_karyawan->selectAll();
		$this->load->view('karyawan',$data);
	}
	
	function edit($nip){
		$where = array('nip' => $nip);
		$data['pegawai'] = $this->m_data_karyawan->edit_data($where,'pegawai')->result();
		$this->load->view('karyawan_edit',$data);
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
			'nip' => $nip,
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

		$this->m_data_karyawan->update_data($where,$data,'pegawai');
		redirect('karyawan/index');
	}
	
	function hapus($nip){
		$where = array('nip' => $nip);
		$this->m_data_karyawan->hapus_data($where,'pegawai');
		redirect('karyawan/index');
	}
	
	function tambah(){
		$this->load->view('karyawan_tambah');
	}

	function tambah_aksi(){
		$idadmin = $this->input->post('idadmin');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$jabatan = $this->input->post('jabatan');
		$divisi = $this->input->post('divisi');
		
		
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
		
		$this->m_data_karyawan->input_data($data,'pegawai');
		redirect('karyawan/index');
	}

	
	
}
?>
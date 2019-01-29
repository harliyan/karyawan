<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_profile');
		$this->load->library('encrypt');
		$this->load->helper('url');
	}

	function index(){
		$data['user_admin'] = $this->m_data_profile->selectAll();
		$this->load->view('profile',$data);
	}
	
	function edit($nip){
		$where = array('nip' => $nip);
		$data['user_admin'] = $this->m_data_profile->edit_data($where,'user_admin')->result();
		$this->load->view('profile_edit',$data);
	}
	
	function update(){
		$idadmin = $this->input->post('idadmin');
		$nip = $this->input->post('nip');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$privileges = $this->input->post('privileges');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$jabatan = $this->input->post('jabatan');
		$divisi = $this->input->post('divisi');
		
					
			error_reporting(E_ALL ^ E_DEPRECATED);
            $user1 = $_SESSION['nama'];
            include "koneksi.php";
            $query = mysql_query("SELECT * from admin where username = '$user1'");
                
            if($query === FALSE) { 
                die(mysql_error()); // TODO: better error handling
            }

            while($row = mysql_fetch_array($query))
            { 
             	$pass = $row['password'];

             	if($pass != $password){
             		$dataadmin = array('idadmin' => $idadmin,
								'username' => $username,
			             		'password' => md5($password),
			             		'nama' => $nama,
								'privileges' => $privileges );
             	} else {
             		$dataadmin = array('idadmin' => $idadmin,
								'username' => $username,
			             		'nama' => $nama,
								'privileges' => $privileges );
             	}
            }
            
            
		

		$datapegawai = array(
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

		$this->m_data_profile->update_data($where,$datapegawai,'pegawai');
		$this->m_data_profile->update_data($where,$dataadmin,'admin');
		redirect('profile/index');
	}

	function upload_foto(){
		$idadmin = $this->input->post('idadmin');
		$foto = $this->input->post('foto');
		
		$data = array(
			'foto' => $foto
		);

		$where = array(
			'idadmin' => $idadmin
		);
		
		$this->m_data_profile->update_data($where,$data,'admin');
		redirect('profile/index');
	}
	
}
?>
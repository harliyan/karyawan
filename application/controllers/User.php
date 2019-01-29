<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class User extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data_user');
		$this->load->helper('url');
	}

	function index(){
		$data['user_admin'] = $this->m_data_user->selectAll();
		$this->load->view('user',$data);
	}
	
	function edit($nip){
		$where = array('nip' => $nip);
		$data['user_admin'] = $this->m_data_user->edit_data($where,'user_admin')->result();
		$this->load->view('user_edit',$data);
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

		$this->m_data_user->update_data($where,$datapegawai,'pegawai');
		$this->m_data_user->update_data($where,$dataadmin,'admin');
		redirect('user/index');
	}
	
	function hapus($nip){
		$where = array('nip' => $nip);
		$this->m_data_userr->hapus_data($where,'admin');
		redirect('user/index');
	}
	
	function tambah(){
		$this->load->view('user_tambah');
	}

	function tambah_aksi(){
		$nip = $this->input->post('nip');
		error_reporting(E_ALL ^ E_DEPRECATED);
		include "koneksi.php";
		$query = mysql_query("SELECT * from pegawai where nip = '$nip'");
        $cekadmin = mysql_query("SELECT MAX(idadmin) from admin");        
        $jum = mysql_fetch_array($cekadmin);
		if($query === FALSE) { 
    		die(mysql_error()); // TODO: better error handling
		}

		while($row = mysql_fetch_array($query)){

		$idadmin = $jum['MAX(idadmin)'];
		$idadmin++;
		$nip = $this->input->post('nip');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $row['nama'];
		$privileges = $this->input->post('privileges');
		$foto = 'default.jpg';
		
		
		
		$dataadmin = array(
					'idadmin' => $idadmin,
					'nip' => $nip,
					'username' => $username,
					'password' => md5($password),
		            'nama' => $nama,
		            'foto' => $foto,
					'privileges' => $privileges );	

		$this->m_data_user->input_data($dataadmin,'admin');
		}
		redirect('user/index');
	}
	
}
?>
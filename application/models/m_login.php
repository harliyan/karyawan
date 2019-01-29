<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function selectAll(){
		return $this->db->get('admin')->result();
	}
	
	function tampil_data(){
		return $this->db->get('pegawai');
	}
}

?>
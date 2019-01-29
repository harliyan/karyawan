<?php 

class M_data_profile extends CI_Model{
	function selectAll(){
		return $this->db->get('user_admin')->result();
	}
	
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function tampil_data(){
		return $this->db->get('user_admin');
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


}

?>
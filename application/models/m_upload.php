<?php 

class M_upload extends CI_Model{
	function selectAll(){
		return $this->db->get('user_admin')->result();
	}
	
	
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


}

?>
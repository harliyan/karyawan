<?php 

class M_data_gaji extends CI_Model{
	function selectAll(){
		return $this->db->get('gaji_pegawai')->result();
	}
	
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function tampil_data(){
		return $this->db->get('gaji_pegawai');
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}

?>
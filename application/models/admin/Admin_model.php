<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	protected $table = "ci_admin";

	public function get_user_detail(){
		$id = $this->session->userdata('user_id');
		$query = $this->db->get_where($this->table, array('user_id' => $id));
		return $result = $query->row_array();
	}
	//--------------------------------------------------------------------
	public function update_user($data){
		$id = $this->session->userdata('user_id');
		$this->db->where('user_id', $id);
		$this->db->update($this->table, $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('user_id', $id);
		$this->db->update($this->table, $data);
		return true;
	}

}

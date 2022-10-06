<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{

	/**
	 * Default Table Primary Key
	 */
	public $table_key = 'id';

	/**
	 * Get Data from table
	 *
	 * @return array Data
	 */
	public function get()
	{
		return $this->db->get($this->table)->result_array();
	}

	/**
	 * Get Data from table by id
	 *
	 * @return object Data Ex. {}
	 */
	public function getById($id)
	{
		return $this->db->get_where($this->table, [$this->table_key => $id])->row_array();
	}

	/**
	 * Get a particular field/row from table by its primary key eg. id
	 *
	 * @param int $id Primary Key Example - id 
	 * @param string $row coloumn name Example - name 
	 * 
	 * @return string
	 * 
	 */

	public function getRowById($id, $row)
	{
		return $this->db->get_where($this->table, [$this->table_key => $id])->row()->{$row};
	}

	/**
	 * Create/Insert the row in Table
	 * 
	 * @param array $data
	 *
	 * @return int Inserted Id
	 */
	function create($data)
	{

		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	/**
	 * Create/Insert the multiple rows in Table
	 * 
	 * @param array $data
	 *
	 * @return int Inserted Id
	 */
	function create_batch($data)
	{

		$this->db->insert_batch($this->table, $data);
		return $this->db->insert_id();
	}

	/**
	 * Update the row in Table by id
	 * 
	 * @param array $data
	 *
	 * @return int Updated Id
	 */
	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $id;
	}

	/**
	 * Change the status in Table by id
	 * 
	 * @param array $data
	 *
	 * @return int Updated Id
	 */

	function change_status($status, $id)
	{
		$this->db->set('is_active', $status);
		$this->db->where('id', $id);
		$this->db->update($this->table);
	}

	/**
	 * Delete the row in Table by id
	 * 
	 * @param int $id
	 *
	 * @return boolean true
	 */
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		return true;
	}


	/**
	 * Get Data Using Where condition from Table
	 * Quick Function to extract information from table
	 * 
	 * @param array $whereArg
	 * @param array $args Other conditions like order
	 *
	 * @return boolean true
	 */
	public function getByWhere($whereArg, $args = [])
	{

		if (isset($args['order']))
			$this->db->order_by($args['order'][0], $args['order'][1]);

		return $this->db->get_where($this->table, $whereArg)->result_array();
	}

	public function getByWhereSingle($whereArg, $args = [])
	{

		if (isset($args['order']))
			$this->db->order_by($args['order'][0], $args['order'][1]);

		return $this->db->get_where($this->table, $whereArg)->row_array();
	}

	/**
	 * Predict Id of table using simple algo
	 * 
	 * @return int
	 */
	public function predictId()
	{
		$this->db->order_by($this->table_key, 'desc');
		return ($query = $this->db->get_where($this->table)) && $query->num_rows() > 0 ? $query->row()->id + 1 : 1;
	}

	/**
	 * Return the total number of rows in the table
	 * 
	 * @return int
	 */
	public function countAll()
	{
		return $this->db->count_all_results($this->table);
	}

	public function getSelected($id, $field = ''){
		return $this->db->select($field)->where('id', $id)->get($this->table)->row_array();
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */

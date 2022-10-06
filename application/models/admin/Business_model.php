<?php
class Business_model extends MY_Model
{
    protected $table = "ci_businesses";

	public function __construct()
	{
		parent::__construct();
	}

	public function search($search = ''){
		return $this->db->select('b.business_name,b.price, b.location, b.category_id, b.feature_image, b.address, b.slug, c.category_name')
		->from('ci_businesses as b')
		->join('ci_category as c', 'c.id = b.category_id')
		->like('c.category_name', $search)
		->or_like('b.business_name', $search)
		->get()->result_array();
	}

	public function getBusinessAjax($category, $search){
		return $this->db->select('*')
		->from($this->table)
		->where('category_id', $category)
		->like('business_name', $search)
		->get()->result_array();
	}

}
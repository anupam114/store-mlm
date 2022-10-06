<?php defined('BASEPATH') or exit('No direct script access allowed');



class Category extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		auth_check();
		$this->load->model('admin/category_model', 'category_model');
	}

	//--------------------------------------------------------------------------

	public function index()
	{
		$data['title'] = 'Category List';
		$data['page_link'] = 'admin/category';
		$this->render('admin/category/list', $data);
	}

	public function datatable_json()
	{
		$records['data'] = $this->category_model->get();
		$data = array();

		$i = 0;
		foreach ($records['data']   as $row) {
			$status = ($row['is_active'] == 1) ? 'checked' : '';
			$data[] = array(
				++$i,
				'<img src="' . base_url() . 'uploads/' . $row['category_image'] . '" alt="" class="img-fluid">',
				$row['category_name'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row['id'] . '" 
				id="cb_' . $row['id'] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row['id'] . '"></label>',

				'
				<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url('admin/category/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url("admin/category/delete/" . $row['id']) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'


			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	function change_status()
	{
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$this->category_model->change_status($status, $id);
	}

	public function add()
	{
		$data['title'] = 'ADD Category';
		$data['page_link'] = 'admin/agents/add';
		$this->render('admin/category/add', $data);
	}

	public function save()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('category_image'))
		{
			$this->session->set_flashdata('errors', $this->upload->display_errors());
			redirect(base_url('admin/category'));
		}
		else
		{
			$uploadData = array('image' => $this->upload->data());
		}

		if ( ! $this->upload->do_upload('category_image_icon'))
		{
			$this->session->set_flashdata('errors', $this->upload->display_errors());
			redirect(base_url('admin/category'));
		}
		else
		{
			$uploadPng = array('image_png' => $this->upload->data());
		}
		
		$data = array(
			'category_name' => $this->input->post('category_name'),
			'category_image' => $uploadData['image']['file_name'],
			'category_image_icon' => $uploadPng['image_png']['file_name'],
			'slug' => slug($this->input->post('category_name')),
			'is_active' => $this->input->post('is_active'),

		);

		// dd($data);die();
		$create = $this->category_model->create($data);
		if ($create) {
			$this->session->set_flashdata('success', 'Category Created Successfully.');
			redirect(base_url('admin/category'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/category/add'));
		}
	}

	public function edit($id = 0)
	{
		$data['title'] = 'Update Category';
		$data['page_link'] = 'admin/category/edit';
		$data['single_category'] = $this->category_model->getById($id);
		// echo $this->db->last_query();
		// dd($data['single_category']);
		$this->render('admin/category/edit', $data);
	}

	public function update(){

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('category_image'))
		{
			$image = $this->input->post('category_image_text');
		}
		else
		{
			$uploadData = array('image' => $this->upload->data());
			$image = $uploadData['image']['file_name'];
		}

		if ( ! $this->upload->do_upload('category_image_icon'))
		{
			$icon= $this->input->post('category_image_icon_text');
		}
		else
		{
			$uploadPng = array('image_png' => $this->upload->data());
			$icon = $uploadData['image_png']['file_name'];
		}

		$id = $this->input->post('id');

		$data = array(
			'category_name' => $this->input->post('category_name'),
			'category_image' => $image,
			'category_image_icon' => $icon,
			'slug' => slug($this->input->post('category_name')),
			'is_active' => $this->input->post('is_active')
		);

		// dd($data);

		$update = $this->category_model->update($id, $data);
		if ($update) {
			$this->session->set_flashdata('success', 'Category updated Successfully.');
			redirect(base_url('admin/category'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/category/add'));
		}

	}


	public function delete($id = 0){
		// echo (base_url(). 'uploads/fii.jpg');die();
		$images = $this->category_model->getSelected($id, 'category_image');
		$delete = $this->category_model->delete($id);
		if ($delete) {
			unlink(base_url(). 'uploads/'.$images);
			$this->session->set_flashdata('success', 'Business Deleted Successfully.');
			redirect(base_url('admin/business'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/business'));
		}
	}

}

<?php defined('BASEPATH') or exit('No direct script access allowed');



class Testimonials extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		auth_check();
		$this->load->model('admin/testimonial_model', 'testimonial_model');
	}

	//--------------------------------------------------------------------------

	public function index()
	{
		$data['title'] = 'Testimonials';
		$data['page_link'] = 'admin/testmonials';
		$this->render('admin/testimonial/list', $data);
	}

    public function datatable_json()
	{
		$records['data'] = $this->testimonial_model->get();
		//dd($records);
		$data = array();

		$i = 0;
		foreach ($records['data']   as $row) {
			$status = ($row['is_active'] == 1) ? 'checked' : '';
			$data[] = array(
				++$i,
				'<img src="' . base_url() . 'uploads/' . $row['image'] . '" alt="" class="img-fluid">',
				$row['name'],
                $row['location'],
                $row['comments'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row['id'] . '" 
				id="cb_' . $row['id'] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row['id'] . '"></label>',

				'
				<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url('admin/testimonials/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url("admin/testimonials/delete/" . $row['id']) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'


			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

    function change_status()
	{
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$this->testimonial_model->change_status($status, $id);
	}

	public function add()
	{
		$data['title'] = 'Add Testimonials';
		$data['page_link'] = 'admin/testimonials';
		$this->render('admin/testimonial/add', $data);
	}

	public function save()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('image'))
		{
			$this->session->set_flashdata('errors', $this->upload->display_errors());
			redirect(base_url('admin/category'));
		}
		else
		{
			$uploadData = array('image' => $this->upload->data());
		}

		
		$data = array(
			'name' => $this->input->post('name'),
			'image' => $uploadData['image']['file_name'],
			'location' => $this->input->post('location'),
			'comments' => $this->input->post('comments'),
			'is_active' => $this->input->post('is_active'),

		);

		// dd($data);die();
		$create = $this->testimonial_model->create($data);
		if ($create) {
			$this->session->set_flashdata('success', 'Testimonial Created Successfully.');
			redirect(base_url('admin/testimonials'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/testimonials/add'));
		}
	}

	public function edit($id = 0)
	{
		$data['title'] = 'Update Testimonials';
		$data['page_link'] = 'admin/category/edit';
		$data['single_testimonial'] = $this->testimonial_model->getById($id);
		$this->render('admin/testimonial/edit', $data);
	}

	public function update(){

		// dd($_POST);

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('image'))
		{
			$image = $this->input->post('image_text');
		}
		else
		{
			$uploadData = array('image' => $this->upload->data());
			$image = $uploadData['image']['file_name'];
		}

		$id = $this->input->post('id');

		$data = array(
			'name' => $this->input->post('name'),
			'image' => $image,
			'location' => $this->input->post('location'),
			'comments' => $this->input->post('comments')
		);

		// dd($data);

		$update = $this->testimonial_model->update($id, $data);
		if ($update) {
			$this->session->set_flashdata('success', 'Testimonial updated Successfully.');
			redirect(base_url('admin/testimonials'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/testimonials/add'));
		}

	}


	public function delete($id = 0){
		$images = $this->testimonial_model->getSelected($id, 'image');
		$delete = $this->testimonial_model->delete($id);
		if ($delete) {
			unlink(base_url(). 'uploads/'.$images);
			$this->session->set_flashdata('success', 'Testimonial Deleted Successfully.');
			redirect(base_url('admin/testimonials'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/testimonials'));
		}
	}


}
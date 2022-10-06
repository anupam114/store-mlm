<?php defined('BASEPATH') or exit('No direct script access allowed');



class Contents extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		auth_check();
		$this->load->model('admin/contents_model', 'contents_model');
	}

	//--------------------------------------------------------------------------

	public function index(){
		$data['title'] = 'Static Contents';
		$data['page_link'] = 'admin/contents';
		$this->render('admin/contents/list', $data);
	}

	public function datatable_json()
	{
		$records['data'] = $this->contents_model->get();
		// dd($records);
		$data = array();

		$i = 0;
		foreach ($records['data']   as $row) {
			$data[] = array(
				++$i,
				$row['content_heading'],
				'<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url('admin/contents/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>'
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function edit($id = 0)
	{
		$data['title'] = 'Change Content';
		$data['page_link'] = 'admin/contents/edit';
		$data['contents'] = $this->contents_model->getById($id);
		$this->render('admin/contents/edit', $data);
	}

	public function update(){

		// dd($_POST);

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('content_img'))
		{
			$image = $this->input->post('content_img_text');
		}
		else
		{
			$uploadData = array('image' => $this->upload->data());
			$image = $uploadData['image']['file_name'];
		}

		$id = $this->input->post('id');

		$data = array(
			'content_img' => $image,
			'content_value' => $this->input->post('content_value')
		);

		// dd($data);

		$update = $this->contents_model->update($id, $data);
		if ($update) {
			$this->session->set_flashdata('success', 'Content updated Successfully.');
			redirect(base_url('admin/contents'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/contents'));
		}

	}
}
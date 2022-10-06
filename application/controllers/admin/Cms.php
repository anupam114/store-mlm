<?php defined('BASEPATH') or exit('No direct script access allowed');



class Cms extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		auth_check();
		$this->load->model('admin/cms_model', 'cms_model');
	}

	//--------------------------------------------------------------------------

	public function index()
	{
		$data['title'] = 'Cms Pages';
		$data['page_link'] = 'admin/CMS';
		$this->render('admin/cms/list', $data);
	}

    public function datatable_json()
	{
		$records['data'] = $this->cms_model->get();
		$data = array();

		$i = 0;
		foreach ($records['data']   as $row) {
			$data[] = array(
				++$i,
				$row['page_name'],

				'<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url('admin/cms/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>'


			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

    public function edit($id = 0)
	{
		$data['title'] = 'Change Content';
		$data['page_link'] = 'admin/category/edit';
		$data['cms'] = $this->cms_model->getById($id);
		$this->render('admin/cms/edit', $data);
	}

	public function update(){

		$id = $this->input->post('id');
		$data = array(
			'page_name' => $this->input->post('page_name'),
			'page_content' => $this->input->post('page_content'),
			'page_key' => $this->input->post('page_key'),
			'is_active' => 1
		);

		// dd($data);

		$update = $this->cms_model->update($id, $data);
		if ($update) {
			$this->session->set_flashdata('success', 'Cms updated Successfully.');
			redirect(base_url('admin/cms'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/cms'));
		}

	}

    // public function add(){
    //     $data['title'] = 'CMS Add';
	// 	$data['page_link'] = 'admin/cms/add';
	// 	$this->render('admin/cms/add', $data);
    // }

	// public function save()
	// {
		
	// 	$data = array(
	// 		'page_name' => $this->input->post('page_name'),
	// 		'page_content' => $this->input->post('page_content'),
	// 		'page_key' => slug($this->input->post('page_name')),
	// 		'is_active' => $this->input->post('is_active'),

	// 	);

	//     dd($data);die();
	// 	$create = $this->cms_model->create($data);
	// 	if ($create) {
	// 		$this->session->set_flashdata('success', 'Content Created Successfully.');
	// 		redirect(base_url('admin/cms'));
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Something Went Wrong.');
	// 		redirect(base_url('admin/cms/add'));
	// 	}
	// }

}
<?php defined('BASEPATH') or exit('No direct script access allowed');



class Business extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		auth_check();
		$this->load->model('admin/business_model', 'business_model');
        $this->load->model('admin/category_model', 'category_model');
		$this->load->helper('text');
	}

	//--------------------------------------------------------------------------

	public function index()
	{
		$data['title'] = 'Business List';
		$data['page_link'] = 'admin/business';
		$this->render('admin/business/list', $data);
	}

	public function datatable_json()
	{
		$records['data'] = $business = $this->business_model->get();
		// $category = $this->category_model->getById($business['category_id']);
		$data = array();

		$i = 0;
		foreach ($records['data']   as $row) {
			$status = ($row['is_active'] == 1) ? 'checked' : '';
			$featured = ($row['is_propular'] == 1) ? 'checked' : '';
			$category = $this->category_model->getById($row['category_id']) ? $this->category_model->getById($row['category_id']) : '';
			// dd($category);
			$data[] = array(
				++$i,
				'<img src="' . base_url() . 'uploads/' . $row['feature_image'] . '" alt="" class="img-fluid">',
				$row['business_name'],
				$row['title'],
				$category['category_name'],
				character_limiter($row['short_description'], 34),
				character_limiter($row['address'], 34),
				'<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row['id'] . '" 
				id="cb_' . $row['id'] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row['id'] . '"></label>',
				'
				<a title="view" class="update btn btn-sm btn-primary" href="' . base_url('admin/business/view/' . $row['id']) . '"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url('admin/business/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url("admin/business/delete/" . $row['id']) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'


			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function change_status()
	{
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$this->business_model->change_status($status, $id);
	}

	public function add()
	{
		$data['title'] = 'ADD Business';
		$data['page_link'] = 'admin/agents/add';
		$data['category'] = $this->category_model->get();
		$this->render('admin/business/add', $data);
	}

	public function save()
	{
		// $is_propular = 0;
		// if(isset($_POST['is_propular'])){
		// 	$is_propular= 1;
		// }

		// dd($is_propular);



		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('feature_image'))
		{
			$this->session->set_flashdata('errors', $this->upload->display_errors());
			redirect(base_url('admin/business'));
		}
		else
		{
			$uploadData = array('image' => $this->upload->data());
		}

		$amm_arr = [];
		foreach($this->input->post('ammenities') as $amm){
			$amm_arr[] = $amm;
		}

		$opn_arr = [];
		foreach($this->input->post('opening_hour') as $opn){
			$opn_arr[] = $opn;
		}

		$dataInfo = [];
		$galleryName = [];
		$files = $_FILES;
		$cpt = count($_FILES['gallery']['name']);
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['gallery']['name']= $files['gallery']['name'][$i];
			$_FILES['gallery']['type']= $files['gallery']['type'][$i];
			$_FILES['gallery']['tmp_name']= $files['gallery']['tmp_name'][$i];
			$_FILES['gallery']['error']= $files['gallery']['error'][$i];
			$_FILES['gallery']['size']= $files['gallery']['size'][$i];    
	
			$this->upload->initialize($config);
			$this->upload->do_upload('gallery');
			$dataInfo[] = $this->upload->data();
			$galleryName[] = $dataInfo[$i]['file_name'];
		}

		// dd($galleryName);
	
		
		$data = array(
			'business_name' => $this->input->post('business_name'),
			'category_id' => $this->input->post('category_id'),
			'title' => $this->input->post('title'),
			'short_description' => $this->input->post('short_description'),
			'long_description' => $this->input->post('long_description'),
			'price' => $this->input->post('price'),
			'address' => $this->input->post('address'),
			'feature_image' => $uploadData['image']['file_name'],
			'amenities' => json_encode($amm_arr),
			'opening_hours' => json_encode($opn_arr),
			'image_gllery' => json_encode($galleryName),
			'address' => $this->input->post('address'),
			'mobile_number' => $this->input->post('mobile_number'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
			'map' => $this->input->post('map'),
			'slug' => slug($this->input->post('business_name')),
			'is_active' => $this->input->post('is_active'),
			'is_propular' => $this->input->post('is_propular') or 0

		);

		// dd($data);die();
		$create = $this->business_model->create($data);
		if ($create) {
			$this->session->set_flashdata('success', 'Business Created Successfully.');
			redirect(base_url('admin/business'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/business/add'));
		}
	}

	public function edit($id = 0)
	{
		$data['title'] = 'Update Business';
		$data['page_link'] = 'admin/business/edit';
		$data['category'] = $this->category_model->get();
		$data['single_business'] = $this->business_model->getById($id);
		$this->render('admin/business/edit', $data);
	}


	public function delete($id = 0){
		// echo (base_url(). 'uploads/fii.jpg');die();
		$images = $this->business_model->getSelected($id, 'feature_image');
		$delete = $this->business_model->delete($id);
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

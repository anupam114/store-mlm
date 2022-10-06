<?php defined('BASEPATH') or exit('No direct script access allowed');



class Agents extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		auth_check();
		$this->load->model('admin/manager_model', 'manager_model');
		$this->load->model('admin/agent_model', 'agent_model');
	}

	//--------------------------------------------------------------------------

	public function index()
	{
		$data['title'] = 'Agent List';
		$data['page_link'] = 'admin/agent';
		// $records['data'] = $this->manager_model->get();
		// dd($records);
		$this->render('admin/agents/list', $data);
	}

	public function datatable_json()
	{
		$records['data'] = $this->agent_model->get();
		//dd($records);
		$data = array();

		$i = 0;
		foreach ($records['data']   as $row) {
			$status = ($row['is_active'] == 1) ? 'checked' : '';
			$data[] = array(
				++$i,
				'<img src="' . base_url() . 'uploads/' . $row['image'] . '" alt="">',
				$row['name'],
				$row['username'],
				$row['email'],
				$row['mobile'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row['id'] . '" 
				id="cb_' . $row['id'] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row['id'] . '"></label>',

				'
				<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url('admin/product/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url("admin/product/delete/" . $row['id']) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'


			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	function change_status()
	{
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$this->agent_model->change_status($status, $id);
	}

	public function add()
	{
		$data['title'] = 'ADD Agent';
		$data['page_link'] = 'admin/agents/add';
		$data['manager'] = $this->manager_model->get();
		// dd($data['manager']);
		$this->render('admin/agents/add', $data);
	}

	public function save()
	{
		$data = array(
			'username' => $this->generate_random(),
			'name' => $this->input->post('name'),
			'mn_id' => $this->input->post('mn_id'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'is_active' => $this->input->post('is_active'),

		);

		// dd($data);
		$create = $this->agent_model->create($data);
		if ($create) {
			$this->session->set_flashdata('success', 'Agent Created Successfully.');
			redirect(base_url('admin/agents'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/agents/add'));
		}
	}

	private function generate_random()
	{

		$OTP 	=	rand(0, 9);
		$OTP 	.=	rand(0, 9);
		$OTP 	.=	rand(0, 9);
		$OTP 	.=	rand(0, 9);
		$OTP 	.=	rand(0, 9);

		// $OTP = 123456;
		return 'AQ' . $OTP;
	}

	public function track()
	{
		$data['title'] = 'Track Agents';
		$data['page_link'] = 'admin/agents/agent_track';
		$data['agent'] = $this->agent_model->get();
		$this->render('admin/agents/agent_track', $data);
	}
}

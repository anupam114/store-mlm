<?php defined('BASEPATH') or exit('No direct script access allowed');



class Users extends MY_Controller
{

	public function __construct()
	{

		parent::__construct();
		auth_check();
		$this->load->model('admin/farmer_model', 'farmer_model');
		$this->load->model('admin/marketer_model', 'marketer_model');
		$this->load->model('admin/dealer_model', 'dealer_model');
	}

	//--------------------------------------------------------------------------

	public function farmer()
	{
		$data['title'] = 'Farmer List';
		$data['page_link'] = 'admin/user';
		$this->render('admin/users/farmer_list', $data);
	}

	public function farmer_datatable_json()
	{
		$records['data'] = $this->farmer_model->get();
		// dd($records);
		$data = array();

		$i = 0;
		foreach ($records['data']   as $row) {
			$status = ($row['is_active'] == 1) ? 'checked' : '';
			$marketer = $this->marketer_model->getById($row['mkt_id']);
			$data[] = array(
				++$i,
				$row['name'],
				$row['username'],
				$row['email'],
				$marketer['name'],
				$row['wallet_balance'],
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
}

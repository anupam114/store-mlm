<?php defined('BASEPATH') or exit('No direct script access allowed');



class Subscriptions extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();
        auth_check();
        $this->load->model('admin/subscription_model', 'subscription_model');
    }

    public function index()
    {
        $data['title'] = 'Subscription List';
        $data['page_link'] = 'admin/subscriptions';
        $this->render('admin/subscription/list', $data);
    }

    public function datatable_json()
    {
        $records['data']  = $this->subscription_model->get();
        $data = array();

        $i = 0;
        foreach ($records['data']   as $row) {
            $status = ($row['is_active'] == 1) ? 'checked' : '';
            // dd($category);
            $data[] = array(
                ++$i,
                $row['package_name'],
                $row['descriptions'],
                $row['price'] . CURRENCY_SYMBOL,
                '<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row['id'] . '" 
				id="cb_' . $row['id'] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row['id'] . '"></label>',
                '
				<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url('admin/business/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url("admin/subscriptions/delete/" . $row['id']) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'


            );
        }
        $records['data'] = $data;
        echo json_encode($records);
    }

    public function change_status()
    {
        $status = $this->input->post('status');
        $id = $this->input->post('id');
        $this->subscription_model->change_status($status, $id);
    }

    public function add()
    {
        $data['title'] = 'ADD Subscriptions';
        $data['page_link'] = 'admin/subscriptions/add';
        $this->render('admin/subscription/add', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('package_name', 'Package Name', 'required|trim');
        $this->form_validation->set_rules('price', 'Package Name', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('admin/subscriptions/add'));
        } else {
            $data = array(
                'package_name' => $this->input->post('package_name'),
                'descriptions' => $this->input->post('descriptions'),
                'price' => $this->input->post('price'),
                'is_active' => $this->input->post('is_active')
            );

            $create = $this->subscription_model->create($data);
            if ($create) {
                $this->session->set_flashdata('success', 'Package Created Successfully.');
                redirect(base_url('admin/subscriptions'));
            } else {
                $this->session->set_flashdata('error', 'Something Went Wrong.');
                redirect(base_url('admin/subscriptions/add'));
            }
        }
    }

    public function delete($id = 0){
		$delete = $this->subscription_model->delete($id);
		if ($delete) {
			$this->session->set_flashdata('success', 'Subscription Deleted Successfully.');
			redirect(base_url('admin/subscriptions'));
		} else {
			$this->session->set_flashdata('error', 'Something Went Wrong.');
			redirect(base_url('admin/subscriptions'));
		}
	}
}

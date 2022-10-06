<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends MY_Controller {



	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/dashboard_model', 'dashboard_model');
		// $data['menu'] = $menu = $this->getMenus(); 
		// print_r($menu);die();

	}

	//--------------------------------------------------------------------------

	public function index(){
		// $data['menu'] = $menu = $this->getMenus(); 
		$data['title'] = 'Dashboard';

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/dashboard', $data);
    	$this->load->view('admin/includes/_footer');

	}

}

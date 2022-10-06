<?php
class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('admin/setting_model', 'setting_model');
		$this->load->model('admin/category_model', 'category_model');

		//general settings

		$global_data['general_settings'] = $this->setting_model->get_general_settings();
		$global_data['navigation_menu'] = $this->category_model->getByWhere(['is_active' => 1]);

		$this->general_settings = $global_data['general_settings'];
		$this->navigation_menu = $global_data['navigation_menu'];

		//set timezone

		date_default_timezone_set($this->general_settings['timezone']);

		//recaptcha status

		$global_data['recaptcha_status'] = true;

		if (empty($this->general_settings['recaptcha_site_key']) || empty($this->general_settings['recaptcha_secret_key'])) {

			$global_data['recaptcha_status'] = false;
		}

		$this->recaptcha_status = $global_data['recaptcha_status'];

		$site_language = ($this->general_settings['default_language'] != "") ? $this->general_settings['default_language'] : "english";
		$language = ($this->session->userdata('site_lang') != "") ? $this->session->userdata('site_lang') : $site_language;
		$language = strtolower(get_lang_name_by_id($language));

		$this->config->set_item('language', $language);
		$this->lang->load(array('site'), $language);

		// $data['menu']     = $this->getMenus();

	}

	//verify recaptcha
	public function recaptcha_verify_request()
	{
		if (!$this->recaptcha_status) {
			return true;
		}

		$this->load->library('recaptcha');
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) && $response['success'] === true) {
				return true;
			}
		}
		return false;
	}


	public function render($view, $vars = array())
	{
		$this->load->view('admin/includes/_header', $vars);
		$this->load->view($view, $vars);
		$this->load->view('admin/includes/_footer', $vars);
	}

	public function frontend($view, $vars = array())
	{
		$this->load->view('includes/_header', $vars);
		$this->load->view($view, $vars);
		$this->load->view('includes/_footer', $vars);
	}

	// public function upload_file($path='', $file=''){
	// 	// $this->load->library('upload');
	// 	// $config['upload_path'] = './uploads/';


	// 	print_r($data);die();

	// }
}

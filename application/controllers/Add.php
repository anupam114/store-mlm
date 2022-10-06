<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add extends MY_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('paypal_lib'); 
		$this->load->model(
			array(
				'admin/category_model' => 'category_model',
				'admin/business_model', 'business_model',
				'admin/testimonial_model' => 'testimonial_model',
				'admin/cms_model'=>  'cms_model',
				'admin/contents_model' => 'contents_model',
				'admin/subcategory_model' => 'subcategory_model',
				'admin/booking_model' => 'booking_model',
				'admin/subscription_model' => 'subscription_model'
			)
	    );
	}

    public function index(){
        $data['title'] = 'Post Your Add';
		$data['subscription'] = $subscription = $this->subscription_model->get();
		$data['category'] = $category = $this->category_model->getByWhere(['is_active' => 1]);
		$this->frontend('post', $data);
    }
}
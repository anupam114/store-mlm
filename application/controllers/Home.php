<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(
			array(
				'admin/category_model' => 'category_model',
				'admin/business_model', 'business_model',
				'admin/testimonial_model' => 'testimonial_model',
				'admin/cms_model' =>  'cms_model',
				'admin/contents_model' => 'contents_model',
				'admin/subcategory_model' => 'subcategory_model',
				'admin/booking_model' => 'booking_model',
				'admin/subscription_model' => 'subscription_model'
			)
		);
	}

	public function site_lang($site_lang)
	{
		echo $site_lang;
		echo '<br>';
		echo 'you will be redirected to :' . $_SERVER['HTTP_REFERER'];
		$language_data = array(
			'site_lang' => $site_lang
		);

		$this->session->set_userdata($language_data);
		if ($this->session->userdata('site_lang')) {
			echo 'user session language is = ' . $this->session->userdata('site_lang');
		}
		redirect($_SERVER['HTTP_REFERER']);

		exit;
	}


	public function index()
	{

		$data['title'] = 'home';
		$data['home'] = $contents = $this->contents_model->getByWhereSingle(['content_key' => 'home-header-promotion']);
		// dd($contents);
		$data['category'] = $this->category_model->getByWhere(['is_active' => 1]);
		$data['business'] = $this->business_model->getByWhere(['is_active' => 1]);
		$data['testimonial'] = $this->testimonial_model->getByWhere(['is_active' => 1]);
		$data['propular_business'] = $this->business_model->getByWhere(['is_active' => 1, 'is_propular' => 1]);
		$this->frontend('home', $data);
	}

	public function cms($page_key = '')
	{
		$data['page_content'] = $page_content = $this->cms_model->getByWhereSingle(['page_key' => $page_key]) or redirect(base_url('404'));
		$this->frontend('cms', $data);
	}

	public function category($id)
	{
		// $data['all_category'] = $this->category_model->getByWhere(['is_active' => 1]);
		$data['category'] = $category =  $this->category_model->getByWhereSingle(['is_active' => 1, 'id' => $id]);
		// echo $this->db->last_query();die();
		$data['subcategory'] = $this->subcategory_model->getByWhere(['is_active' => 1, 'category_id' => $category['id']]);
		$data['all_business'] = $businesses =  $this->business_model->getByWhere(['is_active' => 1, 'category_id' => $id]);
		// echo $id; echo $this->db->last_query(); dd($category);
		$this->frontend('category', $data);
	}

	public function listing($slug = '')
	{

		$data['title'] = 'Business Listing';
		$data['business'] = $this->business_model->getByWhereSingle(['is_active' => 1, 'slug' => $slug]) or redirect(base_url('404'));
		$this->frontend('listing', $data);
	}

	public function search()
	{
		$search = $this->input->get('search_param');
		$data['search_param'] = $search;
		$data['contents'] = $contents = $this->business_model->search($search);
		// dd($contents);
		$this->frontend('search', $data);
	}

	public function ajax_business_listing()
	{
		sleep(1);
		$category = $this->input->get('category');
		$search = $this->input->get('search');
		// $subcategory = $this->input->get('subcategory');
		$data = $this->business_model->getBusinessAjax($category, $search);
		// echo $this->db->last_query();die();
		// dd($data);

		$output = '';
		if ($data) {
			foreach ($data as $listings) {
				$output =
					'<div class="col-lg-4 col-sm-12 col-md-4"><div class="single-listing-item">
				<div class="listing-image">
					<a href="' . base_url('listing/' . $listings['slug']) . '" class="d-block"><img src="' . base_url('uploads/' . $listings['feature_image']) . '" alt="image"></a>
					<div class="listing-rating">
						<div class="review-stars-rated">
							<i class="bx bxs-star"></i>
							<i class="bx bxs-star"></i>
							<i class="bx bxs-star"></i>
							<i class="bx bxs-star"></i>
							<i class="bx bxs-star"></i>
						</div>

						<div class="rating-total">
							5.0 (1 reviews)
						</div>
					</div>
				</div>

				<div class="listing-content">

					<h3>' . $listings['business_name'] . '</h3>
					<h3>' . '$' . $listings['price'] . '</h3>
					<span class="location"><i class="bx bx-map"></i> ' . $listings['address'] . '</span>
				</div>

				<div class="listing-box-footer contact_seller">
				<a href="' . base_url('listing/' . $listings['slug']) . '">Get Details</a>
				</div>
			</div></div>';
			}
		} else {
			$output = '<p>No Data Found</p>';
		}

		echo $output;
	}

	public function bookings()
	{

		// dd($_POST);

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect($_SERVER['HTTP_REFERER']);
			// echo validation_errors();
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'date' => date('Y-m-d', $this->input->post('date')),
			);

			// dd($data);
			$create = $this->booking_model->create($data);
			if ($create) {
				$this->session->set_flashdata('success', 'Booking Created Successfully.');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('error', 'Something Went Wrong.');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function addpost()
	{
		$data['title'] = 'Post Your Add';
		$data['subscription'] = $subscription = $this->subscription_model->get();
		$data['category'] = $category = $this->category_model->getByWhere(['is_active' => 1]);
		$this->frontend('post', $data);
	}

	public function submitpost()
	{
		// dd($_POST);

		$this->form_validation->set_rules('title', 'Add Title', 'required|trim');
		$this->form_validation->set_rules('business_name', 'Business Name', 'required|trim');
		$this->form_validation->set_rules('description', 'Business Description', 'required|trim');
		$this->form_validation->set_rules('category_id', 'Category', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			// $this->session->set_flashdata('error', validation_errors());
			// redirect(base_url('home/addpost'));
			echo validation_errors();
		} else {
			$business_data = array(
				'title' => $this->input->post('title'),
				'business_name' => $this->input->post('business_name'),
				'description' => $this->input->post('description'),
				'category_id' => $this->input->post('category_id'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile')
			);

			if ($this->session->set_userdata('submited_add_data', $business_data)) {
				redirect(base_url('subscription'));
			}
		}
	}


	public function subscription()
	{
		// dd($_SESSION['submited_add_data']);

		if (empty($_SESSION['submited_add_data']))
			return redirect(base_url('home/addpost'));

		$data['subscription'] = $subscription = $this->subscription_model->getByWhere(['is_active' => 1]);
		$this->frontend('subscription', $data);
	}

	public function subscribe()
	{
	}

	public function make_payment()
	{

		// Set variables for paypal form
		$returnURL = base_url() . 'paypal/success'; //payment success url
		$cancelURL = base_url() . 'paypal/cancel'; //payment cancel url
		$notifyURL = base_url() . 'paypal/ipn'; //ipn url

		// Get product data from the database
		// $product = $this->product->getRows($id);

		// Get current user ID from the session
		//$userID = $_SESSION['userID'];
		$userID = 1;

		// Add fields to paypal form
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', 'product');
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  '123');
		$this->paypal_lib->add_field('amount',  1);

		// Render paypal form
		$this->paypal_lib->paypal_auto_form();
	}
}

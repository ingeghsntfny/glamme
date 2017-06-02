<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_customer');
	}

	public function index()
	{
		
	}

	public function payment_confirmation()
	{

	}

	public function shopping_history()
	{
		$user = $this->session->userdata('username');
		$data['history'] = $this->model_customer->get_shopping_history($user);
		$this->load->view('customer/shopping_history_list', $data);
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_products');
		$this->load->library('cart');
	}

	public function index()
	{
		$data['produk'] = $this->model_products->all();
		$this->load->view('welcome_message', $data);
	}
	
	public function add_to_cart($p_id)
	{
		$p = $this->model_products->find($p_id);
		$data = array(
		        'id'      => $p->id,
		        'qty'     => 1,
		        'price'   => $p->harga,
		        'name'    => $p->nama
		);

		$this->cart->insert($data);
		redirect(base_url());
	}

	public function cart()
	{
		//menampilkan isi cart
		//var_dump($this->cart->contents());
		//print_r($this->cart->contents());
		$this->load->view('show_cart');
	}

	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}
}

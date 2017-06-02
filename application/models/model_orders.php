<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_orders extends CI_Model {

	public function process()
	{
		//buat invoice baru
		$invoice = array(
			'date' 		=> date('Y-m-d H:i:s'),
			'due_date'	=> date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+1, date('Y'))),
			'user_id' 	=> $this->get_logged_user_id(),
			'status'	=> 'unpaid'
		);
		$this->db->insert('invoices', $invoice);
		$invoice_id = $this->db->insert_id();

		//mengambil data order di tabel orders
		foreach($this->cart->contents() as $item)
		{
			$data = array(
				'invoice_id'	=> $invoice_id,
				'produk_id'		=> $item['id'],
				'produk_nama'	=> $item['name'],
				'qty'			=> $item['qty'],
				'harga'			=> $item['price'],
			);
			$this->db->insert('orders', $data);
		}

		return TRUE;
	}

	public function all() //mengembalikan semua record yg ada di tabel invoices
	{
		$res = $this->db->get('invoices');
		if($res->num_rows()>0)
		{
			return $res->result();
		}
		else
		{	
			return false;
		}
	}

	public function get_invoice_by_id($invoice_id)
	{
		$res = $this->db->where('id', $invoice_id)->limit(1)->get('invoices');
		if($res->num_rows>0)
		{
			return $res->row();
		}
		else
		{
			return false;
		}
	}

	public function get_orders_by_invoice($invoice_id)
	{
		$res = $this->db->where('invoice_id', $invoice_id) -> get('orders');
		if($res->num_rows>0)
		{
			return $res->row();
		}
		else
		{
			return false;
		}
	}

	public function get_logged_user_id()
	{
		$res = $this->db->select('id')->where('username', $this->session->userdata('username'))->limit(1)->get('users');
		if($res->num_rows>0)
		{
			return $res->row()->id;
		}
		else
		{
			return false;
		}
	}
}
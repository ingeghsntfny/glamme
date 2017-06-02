<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_products extends CI_Model {
	public function all()
	{
		//query semua record di table produk
		$hasil = $this->db->get('produk');
		if($hasil->num_rows() > 0)
		{
			return $hasil-> result();
		} 
		else 
		{
			return array();
		}
	}

	public function find($id)
	{
		//Query nyari record berdasarkan ID-nya
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('produk');
		if($hasil->num_rows() > 0)
		{
			return $hasil-> row();
		} 
		else 
		{
			return array();
		}
	}

	public function create($data_produk)
	{
		//Query INSERT INTO
		$this->db->insert('produk', $data_produk);
	}

	public function update($id, $data_produk)
	{
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('id', $id)
				 ->update('produk', $data_produk);
	}

	public function delete($id)
	{
		//Query Delete...where id=...
		$this->db->where('id', $id)
				 ->delete('produk');
	}
}
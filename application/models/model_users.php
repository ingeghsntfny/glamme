<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model {

	public function check_credential()
	{
		$username = set_value('username'); //drform login
		$password = set_value('password');

		$hasil = $this->db->where('username', $username) //nama field di tbl+variabel
						  ->where('password', $password)
						  ->limit(1)
						  ->get('users');

		if($hasil->num_rows() > 0)
		{
			return $hasil->row();
		}
		else
		{
			return array();
		}
	}
}
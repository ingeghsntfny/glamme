<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model {

	public function get_shopping_history($user)
	{
		$res = $this->db->select('i.*')
		            ->from('invoices i, users u')
		            ->where('u.username', $user)
		            ->where('u.id = i.user_id')
		            ->get();

		 if($res->num_rows() > 0)
		 {
		 	return $res->result();
		 } 
		 else
		 {
		 	return false;
		 }
	} //i.* (tabel invoice). where field username yg ada di tabel u dan tabel u adalah tabel user. trs dicocokin sm user	
}
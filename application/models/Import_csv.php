<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_csv extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($data){
		$this->db->insert('sp2d', $data);
		return TRUE;
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get1hour(){
		$query = $this->db->where('durasi >','01:00:00');
		$query = $this->db->select('*');
		$query = $this->db->get('sp2d');
		return $query->result();
	}

	public function getout(){
		$query = $this->db->where('durasi >','01:00:00');
		$query = $this->db->select('*');
		$query = $this->db->get('sp2d');
		if($query->num_rows() > 0){
			return $query->num_rows();
		}
	}

	public function getall(){
		$query = $this->db->get('sp2d');
		if($query->num_rows() > 0){
			return $query->num_rows();
		}
	}
}

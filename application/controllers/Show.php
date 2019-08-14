<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Show_model');
	}

	public function index()
	{
        $param['getout'] = $this->Show_model->getout();
        $param['getall'] = $this->Show_model->getall();
        $param['list'] = $this->Show_model->get1hour();
		$this->load->view('show.php', $param);
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->model('Import_csv');
	}

	public function index()
	{
		$this->load->view('form.php');
	}

	public function insert()
	{
		if(isset($_POST['submit'])){
			$filename = $_FILES['file']['name'];

			$config['upload_path'] = './uploads/';
			$config['file_name'] = $filename;
			$config['allowed_types'] = 'xls|xlsx|csv';

			$this->load->library('upload');
			$this->upload->initialize($config);

			if(! $this->upload->do_upload('file')){
				$this->upload->display_errors();	
			}else {
				echo "Uploaded";
			}
			

			$media = $this->upload->data('file');
			$inputFileName = './uploads/'.$filename;

			try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for($row = 5; $row <= $highestRow; $row++){
            	$rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
            	// print_r($rowData[0][0]);
            	// $rData = explode(";", $rowData[0][0]);
            	// print_r($rData);
            	// echo "<br>";
             //    echo "<br>";
            	

            	$data = array(
            		"no_invoice"=> $rowData[0][0],
            		"no_sp2d"=> $rowData[0][1],
            		"jenis_spm"=> $rowData[0][2],
            		"tgl_upload"=> $this->parseDate($rowData[0][3]),
            		"wkt_upload"=> $rowData[0][4],
            		"tgl_pd"=> $this->parseDate($rowData[0][5]),
            		"wkt_pd"=> $rowData[0][6],
            		"tgl_bank"=> $this->parseDate($rowData[0][7]),
            		"wkt_bank"=> $rowData[0][8],
            		"durasi"=> $rowData[0][9],
            		"jumlah"=> $rowData[0][10]
            	);

            	// print_r($data);

            	$this->Import_csv->insert($data);
            }
		}
	}
	public function parseDate($oridate)
	{
    	return date("Y-m-d", strtotime($oridate));
	}
	
}
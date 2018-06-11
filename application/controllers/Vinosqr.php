<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Vinosqr extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'Vinos_model' );
		$this->load->library ( 'form_validation' );
		$this->load->database ();
		$this->load->helper ( 'url' );
	}
	public function index() {
		if (isset ( $_SESSION ["usuario"] )) {
			$q = urldecode ( $this->input->get ( 'q', TRUE ) );
			$start = intval ( $this->input->get ( 'start' ) );
			
			if ($q != '') {
				$config ['base_url'] = base_url () . 'vinos/index.html?q=' . urlencode ( $q );
				$config ['first_url'] = base_url () . 'vinos/index.html?q=' . urlencode ( $q );
			} else {
				$config ['base_url'] = base_url () . 'vinos/index.html';
				$config ['first_url'] = base_url () . 'vinos/index.html';
			}
			
			$config ['per_page'] = 10;
			$config ['page_query_string'] = TRUE;
			$config ['total_rows'] = $this->Vinos_model->total_rows ( $q );
			$vinos = $this->Vinos_model->get_limit_data ( $config ['per_page'], $start, $q );
			
			$this->load->library ( 'pagination' );
			$this->pagination->initialize ( $config );
			
			$PNG_TEMP_DIR = dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
			$direccion = base_url () . "index.php/vinosqr";
			$direccionFoto = './uploads';
			// html PNG location prefix
			$PNG_WEB_DIR = 'temp/';
			
			include "qrCreator/qrlib.php";
			
			// ofcourse we need rights to create temp dir
			if (! file_exists ( $direccionFoto ))
				mkdir ( $direccionFoto );
			
			
			foreach ( $vinos as $vino ) {
				$filename = $direccionFoto . '/' . $vino->id . '.png';
				// processing form input
				// remember to sanitize user input in real-life solution !!!
				$errorCorrectionLevel = 'L';
					
				$matrixPointSize = 5;
					
				// user data
				$filename = './uploads/' . $vino->id . '.png';
				QRcode::png ( $vino->id, $filename, $errorCorrectionLevel, $matrixPointSize, 2 );
			}
			
			$data = array (
					'vinos_data' => $vinos,
					'q' => $q,
					'pagination' => $this->pagination->create_links (),
					'total_rows' => $config ['total_rows'],
					'start' => $start 
			);
			
			$this->load->view ( 'vinos_qr', $data );
		} else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}
	}
	
	function logout() {
		// $this->session->unset_userdata('logged_in');
		session_destroy ();
		
		redirect ( 'login', 'refresh' );
		
		// redirect('home_'.$this, 'refresh');
	}
}
class ExampleException extends Exception {
}

/* End of file Vinos.php */
/* Location: ./application/controllers/Vinos.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-18 19:15:16 */
/* http://harviacode.com */
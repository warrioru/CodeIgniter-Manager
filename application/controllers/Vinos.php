<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );


class Vinos extends CI_Controller {
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
			
			$data = array (
					'vinos_data' => $vinos,
					'q' => $q,
					'pagination' => $this->pagination->create_links (),
					'total_rows' => $config ['total_rows'],
					'start' => $start 
			);
			$this->load->view ( 'vinos_list', $data );
		}else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}
	}
	
	public function read($id) {
		$row = $this->Vinos_model->get_by_id ( $id );
		if ($row) {
			$data = array (
					'id' => $row->id,
					'nombre' => $row->nombre,
					'bodega' => $row->bodega,
					'tipo' => $row->tipo,
					'cepa' => $row->cepa,
					'anio' => $row->anio,
					'pais' => $row->pais,
					'imagen' => $row->imagen,
					'color' => $row->color,
					'nariz' => $row->nariz,
					'boca' => $row->boca,
					'maridaje' => $row->maridaje,
					'precio' => $row->precio,
					'descripcion' => $row->descripcion,
					'esPremium' => $row->esPremium,
					'tipoVarios' => $row->tipoVarios
			);
			$this->load->view ( 'vinos_read', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'vinos' ) );
		}
	}
	public function create() {
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'vinos/create_action' ),
				'id' => set_value ( 'id' ),
				'nombre' => set_value ( 'nombre' ),
				'bodega' => set_value ( 'bodega' ),
				'tipo' => set_value('tipo'),
				'cepa' => set_value ( 'cepa' ),
				'cepaString' => 'cepa',
				'anio' => set_value ( 'anio' ),
				'pais' => set_value ( 'pais' ),
				'imagen' => set_value ( 'imagen' ),
				'color' => set_value ( 'color' ),
				'nariz' => set_value ( 'nariz' ),
				'boca' => set_value ( 'boca' ),
				'maridaje' => set_value ( 'maridaje' ),
				'precio' => set_value ( 'precio' ),
				'descripcion' => set_value ( 'descripcion' ),
				'esPremium' => set_value ( 'esPremium' ),
				'tipoVarios' => set_value('tipoVarios')
		);
		$this->load->view ( 'vinos_form', $data );
	}
	public function create_action() {
		$this->_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->create ();
		} else {
			$url = $this->do_upload ();
			$cepas = $this->cepasToString();
			
			$data = array (
					'nombre' => $this->input->post ( 'nombre', TRUE ),
					'bodega' => $this->input->post ( 'bodega', TRUE ),
					'tipo' => $this->input->post('tipo',TRUE),
					'cepa' => $cepas,
					'anio' => $this->input->post ( 'anio', TRUE ),
					'pais' => $this->input->post ( 'pais', TRUE ),
					'imagen' => $url,
					'color' => $this->input->post ( 'color', TRUE ),
					'nariz' => $this->input->post ( 'nariz', TRUE ),
					'boca' => $this->input->post ( 'boca', TRUE ),
					'maridaje' => $this->input->post ( 'maridaje', TRUE ),
					'precio' => $this->input->post ( 'precio', TRUE ),
					'descripcion' => $this->input->post ( 'descripcion', TRUE ),
					'esPremium' => $this->input->post ( 'esPremium', TRUE ),
					'tipoVarios' => $this->input->post ( 'tipoVarios', TRUE )
			);
			
			$this->Vinos_model->insert ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'vinos' ) );
		}
	}
	private function do_upload() {
		if (empty ( $_FILES ['imagen'] ['name'] )) {
			return "no";
		}
		$image_path = realpath(APPPATH . '../uploads/vinos');
		
		$config ['upload_path'] = $image_path;
		$config ['allowed_types'] = 'gif|jpg|png|jpeg';
		/*
		 * $config['max_size'] = '100';
		 * $config['max_width'] = '1024';
		 * $config['max_height'] = '768';
		 */
		
		$this->load->library ( 'upload', $config );
		$field_name = "imagen";
		
		if (! $this->upload->do_upload ( $field_name )) {
			$error = array (
					'error' => $this->upload->display_errors () 
			);
			
			// $this->load->view('upload_form', $error);
		} else {
			$data = array (
					'upload_data' => $this->upload->data () 
			);
			$upload_data = $this->upload->data ();
			
			// $this->load->view('upload_success', $data);
			return "http://divinowines.com.ec/contenido/uploads/vinos/" . $upload_data ['file_name'];
		}
	}
	
	
	private function cepasToString() {
		$first = true;
		$values = $_POST['cepa'];
		
		foreach ( $values as $selectedOption){
			
			if($first) {
				$temp_arr = $selectedOption;
				$first = false;
			} else {
				$temp_arr .= "," . $selectedOption;
			}
		}
			return $temp_arr;
		}
	
	public function stringToArray($str){

		$arr=explode(",",$str);			
		return $arr;
	}

	public function update($id) {
		$row = $this->Vinos_model->get_by_id ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'vinos/update_action' ),
					'id' => set_value ( 'id', $row->id ),
					'nombre' => set_value ( 'nombre', $row->nombre ),
					'bodega' => set_value ( 'bodega', $row->bodega ),
					'tipo' => set_value('tipo', $row->tipo),
					'cepa' => set_value ( 'cepa', $row->cepa ),
					'cepaString' => $row->cepa,
					'anio' => set_value ( 'anio', $row->anio ),
					'pais' => set_value ( 'pais', $row->pais ),
					'imagen' => set_value ( 'imagen', $row->imagen ),
					'color' => set_value ( 'color', $row->color ),
					'nariz' => set_value ( 'nariz', $row->nariz ),
					'boca' => set_value ( 'boca', $row->boca ),
					'maridaje' => set_value ( 'maridaje', $row->maridaje ),
					'precio' => set_value ( 'precio', $row->precio ),
					'descripcion' => set_value ( 'descripcion', $row->descripcion ),
					'esPremium' => set_value ( 'esPremium', $row->esPremium ),
					'tipoVarios' => set_value ( 'tipoVarios', $row->tipoVarios )
			);
			$this->load->view ( 'vinos_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'vinos' ) );
		}
	}
	public function update_action() {
		$this->_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->update ( $this->input->post ( 'id', TRUE ) );
		} else {
			$url = $this->do_upload ();
			$cepas = $this->cepasToString();
			
			if ($url == "no") {
				$url = $this->input->post ( 'prueba', TRUE );
			}
			
			$data = array (
					'nombre' => $this->input->post ( 'nombre', TRUE ),
					'bodega' => $this->input->post ( 'bodega', TRUE ),
					'tipo' => $this->input->post('tipo',TRUE),
					'cepa' => $cepas,
					'anio' => $this->input->post ( 'anio', TRUE ),
					'pais' => $this->input->post ( 'pais', TRUE ),
					'imagen' => $url,
					'color' => $this->input->post ( 'color', TRUE ),
					'nariz' => $this->input->post ( 'nariz', TRUE ),
					'boca' => $this->input->post ( 'boca', TRUE ),
					'maridaje' => $this->input->post ( 'maridaje', TRUE ),
					'precio' => $this->input->post ( 'precio', TRUE ),
					'descripcion' => $this->input->post ( 'descripcion', TRUE ),
					'esPremium' => $this->input->post ( 'esPremium', TRUE ),
					'tipoVarios' => $this->input->post ( 'tipoVarios', TRUE )
			);
			
			$this->Vinos_model->update ( $this->input->post ( 'id', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Success' );
			redirect ( site_url ( 'vinos' ) );
		}
	}
	public function delete($id) {
		$row = $this->Vinos_model->get_by_id ( $id );
		
		if ($row) {
			$this->Vinos_model->delete ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'vinos' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'vinos' ) );
		}
	}
	public function _rules() {
		$this->form_validation->set_rules ( 'nombre', 'nombre', 'trim|required' );
		$this->form_validation->set_rules ( 'bodega', 'bodega', 'trim|required' );
		$this->form_validation->set_rules('tipo', 'tipo', 'trim|required');
		$this->form_validation->set_rules ( 'cepa[]', 'cepa[]', 'trim|required' );
		$this->form_validation->set_rules ( 'anio', 'anio', 'trim|required|numeric|greater_than[0]' );
		$this->form_validation->set_rules ( 'pais', 'pais', 'trim|required' );
		if (empty ( $_FILES ['imagen'] ['name'] ) && $_POST ['prueba'] == "") {
			$this->form_validation->set_rules ( 'imagen', 'imagen', 'required' );
		}
		$this->form_validation->set_rules ( 'color', 'color', 'trim|required' );
		$this->form_validation->set_rules ( 'nariz', 'nariz', 'trim|required' );
		$this->form_validation->set_rules ( 'boca', 'boca', 'trim|required' );
		$this->form_validation->set_rules ( 'maridaje', 'maridaje', 'trim|required' );
		$this->form_validation->set_rules ( 'precio', 'precio', 'trim|required|numeric|greater_than[0]' );
		$this->form_validation->set_rules ( 'descripcion', 'descripcion', 'trim|required' );
		
		$this->form_validation->set_rules ( 'id', 'id', 'trim' );
		$this->form_validation->set_error_delimiters ( '<span class="text-danger">', '</span>' );
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

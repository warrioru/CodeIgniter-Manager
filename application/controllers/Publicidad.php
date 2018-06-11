<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Publicidad extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'Publicidad_model' );
		$this->load->library ( 'form_validation' );
		$this->load->database ();
		$this->load->helper ( 'url' );
	}
	public function index() {
		if (isset ( $_SESSION ["usuario"] )) {
			$q = urldecode ( $this->input->get ( 'q', TRUE ) );
			$start = intval ( $this->input->get ( 'start' ) );
			
			if ($q != '') {
				$config ['base_url'] = base_url () . 'publicidad/index.html?q=' . urlencode ( $q );
				$config ['first_url'] = base_url () . 'publicidad/index.html?q=' . urlencode ( $q );
			} else {
				$config ['base_url'] = base_url () . 'publicidad/index.html';
				$config ['first_url'] = base_url () . 'publicidad/index.html';
			}
			
			$config ['per_page'] = 10;
			$config ['page_query_string'] = TRUE;
			$config ['total_rows'] = $this->Publicidad_model->total_rows ( $q );
			$publicidad = $this->Publicidad_model->get_limit_data ( $config ['per_page'], $start, $q );
			
			$this->load->library ( 'pagination' );
			$this->pagination->initialize ( $config );
			
			$data = array (
					'publicidad_data' => $publicidad,
					'q' => $q,
					'pagination' => $this->pagination->create_links (),
					'total_rows' => $config ['total_rows'],
					'start' => $start 
			);
			$this->load->view ( 'publicidad/publicidad_list', $data );
		} else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}
	}
	public function read($id) {
		$row = $this->Publicidad_model->get_by_id ( $id );
		if ($row) {
			$data = array (
					'id' => $row->id,
					'nombre' => $row->nombre,
					'imagenPublicidad' => $row->imagenPublicidad 
			);
			$this->load->view ( 'publicidad/publicidad_read', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'publicidad' ) );
		}
	}
	public function create() {
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'publicidad/create_action' ),
				'id' => set_value ( 'id' ),
				'nombre' => set_value ( 'nombre' ),
				'imagenPublicidad' => set_value ( 'imagenPublicidad' ) 
		);
		$this->load->view ( 'publicidad/publicidad_form', $data );
	}
	public function create_action() {
		$this->_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->create ();
		} else {
			$url = $this->do_upload ();
			
			$data = array (
					'nombre' => $this->input->post ( 'nombre', TRUE ),
					'imagenPublicidad' => $url 
			);
			
			$this->Publicidad_model->insert ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'publicidad' ) );
		}
	}
	private function do_upload() {
		if (empty ( $_FILES ['imagenPublicidad'] ['name'] )) {
			return "no";
		}
		// apppath + realpath, working
		$image_path = realpath ( APPPATH . '../uploads/publicidad' );
		
		$config ['upload_path'] = $image_path;
		$config ['allowed_types'] = 'gif|jpg|png|jpeg';
		/*
		 * $config['max_size'] = '100';
		 * $config['max_width'] = '1024';
		 * $config['max_height'] = '768';
		 */
		
		$this->load->library ( 'upload', $config );
		$field_name = "imagenPublicidad";
		
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
			return "http://divinowines.com.ec/contenido/uploads/publicidad/" . $upload_data ['file_name'];
		}
	}
	public function update($id) {
		$row = $this->Publicidad_model->get_by_id ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'publicidad/update_action' ),
					'id' => set_value ( 'id', $row->id ),
					'nombre' => set_value ( 'nombre', $row->nombre ),
					'imagenPublicidad' => set_value ( 'imagenPublicidad', $row->imagenPublicidad ) 
			);
			$this->load->view ( 'publicidad/publicidad_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'publicidad' ) );
		}
	}
	public function update_action() {
		$this->_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->update ( $this->input->post ( 'id', TRUE ) );
		} else {
			$url = $this->do_upload ();
			
			$data = array (
					'nombre' => $this->input->post ( 'nombre', TRUE ),
					'imagenPublicidad' => $url 
			);
			
			$this->Publicidad_model->update ( $this->input->post ( 'id', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Success' );
			redirect ( site_url ( 'publicidad' ) );
		}
	}
	public function delete($id) {
		$row = $this->Publicidad_model->get_by_id ( $id );
		
		if ($row) {
			$this->Publicidad_model->delete ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'publicidad' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'publicidad' ) );
		}
	}
	public function _rules() {
		$this->form_validation->set_rules ( 'nombre', 'nombre', 'trim|required' );
		if (empty ( $_FILES ['imagenPublicidad'] ['name'] ) && $_POST ['prueba'] == "") {
			$this->form_validation->set_rules ( 'imagenPublicidad', 'imagenPublicidad', 'required' );
		}
		
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

/* End of file Publicidad.php */
/* Location: ./application/controllers/Publicidad.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-30 02:33:26 */
/* http://harviacode.com */
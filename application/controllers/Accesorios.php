<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Accesorios extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'Accesorios_model' );
		$this->load->library ( 'form_validation' );
		$this->load->database ();
		$this->load->helper ( 'url' );
	}
	public function index() {
		if (isset ( $_SESSION ["usuario"] )) {
			$q = urldecode ( $this->input->get ( 'q', TRUE ) );
			$start = intval ( $this->input->get ( 'start' ) );
			
			if ($q != '') {
				$config ['base_url'] = base_url () . 'accesorios/index.html?q=' . urlencode ( $q );
				$config ['first_url'] = base_url () . 'accesorios/index.html?q=' . urlencode ( $q );
			} else {
				$config ['base_url'] = base_url () . 'accesorios/index.html';
				$config ['first_url'] = base_url () . 'accesorios/index.html';
			}
			
			$config ['per_page'] = 10;
			$config ['page_query_string'] = TRUE;
			$config ['total_rows'] = $this->Accesorios_model->total_rows ( $q );
			$accesorios = $this->Accesorios_model->get_limit_data ( $config ['per_page'], $start, $q );
			
			$this->load->library ( 'pagination' );
			$this->pagination->initialize ( $config );
			
			$data = array (
					'accesorios_data' => $accesorios,
					'q' => $q,
					'pagination' => $this->pagination->create_links (),
					'total_rows' => $config ['total_rows'],
					'start' => $start 
			);
			$this->load->view ( 'accesorios/accesorios_list', $data );
		} else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}
	}
	public function read($id) {
		$row = $this->Accesorios_model->get_by_id ( $id );
		if ($row) {
			$data = array (
					'id' => $row->id,
					'nombre' => $row->nombre,
					'imagenAcc' => $row->imagenAcc,
					'precio' => $row->precio,
					'descripcion' => $row->descripcion 
			);
			$this->load->view ( 'accesorios/accesorios_read', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'accesorios' ) );
		}
	}
	public function create() {
		$data = array (
				'button' => 'Create',
				'action' => site_url ( 'accesorios/create_action' ),
				'id' => set_value ( 'id' ),
				'nombre' => set_value ( 'nombre' ),
				'imagenAcc' => set_value ( 'imagenAcc' ),
				'precio' => set_value ( 'precio' ),
				'descripcion' => set_value ( 'descripcion' ) 
		);
		$this->load->view ( 'accesorios/accesorios_form', $data );
	}
	public function create_action() {
		$this->_rules ();
		
		if ($this->form_validation->run () == FALSE) {
			$this->create ();
		} else {
			$url = $this->do_upload ();
			
			$data = array (
					'nombre' => $this->input->post ( 'nombre', TRUE ),
					'imagenAcc' => $url,
					'precio' => $this->input->post ( 'precio', TRUE ),
					'descripcion' => $this->input->post ( 'descripcion', TRUE ) 
			);
			
			$this->Accesorios_model->insert ( $data );
			$this->session->set_flashdata ( 'message', 'Create Record Success' );
			redirect ( site_url ( 'accesorios' ) );
		}
	}
	private function do_upload() {
		if (empty ( $_FILES ['imagenAcc'] ['name'] )) {
			return "no";
		}
		// apppath + realpath, working
		$image_path = realpath ( APPPATH . '../uploads/accesorios' );
		
		$config ['upload_path'] = $image_path;
		$config ['allowed_types'] = 'gif|jpg|png|jpeg';
		/*
		 * $config['max_size'] = '100';
		 * $config['max_width'] = '1024';
		 * $config['max_height'] = '768';
		 */
		
		$this->load->library ( 'upload', $config );
		$field_name = "imagenAcc";
		
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
			return "http://divinowines.com.ec/contenido/uploads/accesorios/" . $upload_data ['file_name'];
		}
	}
	public function update($id) {
		$row = $this->Accesorios_model->get_by_id ( $id );
		
		if ($row) {
			$data = array (
					'button' => 'Update',
					'action' => site_url ( 'accesorios/update_action' ),
					'id' => set_value ( 'id', $row->id ),
					'nombre' => set_value ( 'nombre', $row->nombre ),
					'imagenAcc' => set_value ( 'imagenAcc', $row->imagenAcc ),
					'precio' => set_value ( 'precio', $row->precio ),
					'descripcion' => set_value ( 'descripcion', $row->descripcion ) 
			);
			$this->load->view ( 'accesorios/accesorios_form', $data );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'accesorios' ) );
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
					'imagenAcc' => $url,
					'precio' => $this->input->post ( 'precio', TRUE ),
					'descripcion' => $this->input->post ( 'descripcion', TRUE ) 
			);
			
			$this->Accesorios_model->update ( $this->input->post ( 'id', TRUE ), $data );
			$this->session->set_flashdata ( 'message', 'Update Record Success' );
			redirect ( site_url ( 'accesorios' ) );
		}
	}
	public function delete($id) {
		$row = $this->Accesorios_model->get_by_id ( $id );
		
		if ($row) {
			$this->Accesorios_model->delete ( $id );
			$this->session->set_flashdata ( 'message', 'Delete Record Success' );
			redirect ( site_url ( 'accesorios' ) );
		} else {
			$this->session->set_flashdata ( 'message', 'Record Not Found' );
			redirect ( site_url ( 'accesorios' ) );
		}
	}
	public function _rules() {
		$this->form_validation->set_rules ( 'nombre', 'nombre', 'trim|required' );
		if (empty ( $_FILES ['imagenAcc'] ['name'] ) && $_POST ['prueba'] == "") {
			$this->form_validation->set_rules ( 'imagenAcc', 'imagenAcc', 'required' );
		}
		$this->form_validation->set_rules ( 'descripcion', 'descripcion', 'trim|required' );
		$this->form_validation->set_rules ( 'precio', 'precio', 'trim|required|numeric|greater_than[0]' );
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

/* End of file Accesorios.php */
/* Location: ./application/controllers/Accesorios.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-15 15:42:17 */
/* http://harviacode.com */
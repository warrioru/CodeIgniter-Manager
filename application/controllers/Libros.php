<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Libros extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Libros_model');
        $this->load->library('form_validation');
        $this->load->database ();
        $this->load->helper ( 'url' );
    }

    public function index()
    {
    	if (isset ( $_SESSION ["usuario"] )) {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'libros/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'libros/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'libros/index.html';
            $config['first_url'] = base_url() . 'libros/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Libros_model->total_rows($q);
        $libros = $this->Libros_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'libros_data' => $libros,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('libros/libros_list', $data);
        }else {
        	// If no session, redirect to login page
        	redirect ( 'login', 'refresh' );
        }
    }

    public function read($id) 
    {
        $row = $this->Libros_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
        'imagenLibro' => $row->imagenLibro,
		'titulo' => $row->titulo,
		'autor' => $row->autor,
		'anio' => $row->anio,
		'editor' => $row->editor,
		'isbn' => $row->isbn,
		'idioma' => $row->idioma,
		'precio' => $row->precio,
		'numPaginas' => $row->numPaginas,
	    );
            $this->load->view('libros/libros_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('libros'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('libros/create_action'),
	    'id' => set_value('id'),
        'imagenLibro' => set_value ( 'imagenLibro' ),
	    'titulo' => set_value('titulo'),
	    'autor' => set_value('autor'),
	    'anio' => set_value('anio'),
	    'editor' => set_value('editor'),
	    'isbn' => set_value('isbn'),
	    'idioma' => set_value('idioma'),
	    'precio' => set_value('precio'),
	    'numPaginas' => set_value('numPaginas'),
	);
        $this->load->view('libros/libros_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	$url = $this->do_upload ();
        	
            $data = array(
        'imagenLibro' => $url,
		'titulo' => $this->input->post('titulo',TRUE),
		'autor' => $this->input->post('autor',TRUE),
		'anio' => $this->input->post('anio',TRUE),
		'editor' => $this->input->post('editor',TRUE),
		'isbn' => $this->input->post('isbn',TRUE),
		'idioma' => $this->input->post('idioma',TRUE),
		'precio' => $this->input->post('precio',TRUE),
		'numPaginas' => $this->input->post('numPaginas',TRUE),
	    );

            $this->Libros_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('libros'));
        }
    }
    
    private function do_upload() {
    	if (empty ( $_FILES ['imagenLibro'] ['name'] )) {
    		return "no";
    	}
    	//apppath + realpath, working
    	$image_path = realpath(APPPATH . '../uploads/libros');
    
    	$config ['upload_path'] = $image_path;
    	$config ['allowed_types'] = 'gif|jpg|png|jpeg';
    	/*
    	 * $config['max_size'] = '100';
    	 * $config['max_width'] = '1024';
    	 * $config['max_height'] = '768';
    	 */
    
    	$this->load->library ( 'upload', $config );
    	$field_name = "imagenLibro";
    
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
    		return "http://divinowines.com.ec/contenido/uploads/libros/" . $upload_data ['file_name'];
    	}
    }
    
    public function update($id) 
    {
        $row = $this->Libros_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('libros/update_action'),
		'id' => set_value('id', $row->id),
        'imagenLibro' => set_value ( 'imagenLibro', $row->imagenLibro ),
		'titulo' => set_value('titulo', $row->titulo),
		'autor' => set_value('autor', $row->autor),
		'anio' => set_value('anio', $row->anio),
		'editor' => set_value('editor', $row->editor),
		'isbn' => set_value('isbn', $row->isbn),
		'idioma' => set_value('idioma', $row->idioma),
		'precio' => set_value('precio', $row->precio),
		'numPaginas' => set_value('numPaginas', $row->numPaginas),
	    );
            $this->load->view('libros/libros_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('libros'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
        	
        	$url = $this->do_upload ();
        		
        	if ($url == "no") {
        		$url = $this->input->post ( 'prueba', TRUE );
        	}
        	
            $data = array(
        'imagenLibro' => $url,
		'titulo' => $this->input->post('titulo',TRUE),
		'autor' => $this->input->post('autor',TRUE),
		'anio' => $this->input->post('anio',TRUE),
		'editor' => $this->input->post('editor',TRUE),
		'isbn' => $this->input->post('isbn',TRUE),
		'idioma' => $this->input->post('idioma',TRUE),
		'precio' => $this->input->post('precio',TRUE),
		'numPaginas' => $this->input->post('numPaginas',TRUE),
	    );

            $this->Libros_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('libros'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Libros_model->get_by_id($id);

        if ($row) {
            $this->Libros_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('libros'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('libros'));
        }
    }

    public function _rules() 
    {
    if (empty ( $_FILES ['imagenLibro'] ['name'] ) && $_POST ['prueba'] == "") {
    	$this->form_validation->set_rules ( 'imagenLibro', 'imagenLibro', 'required' );
    }
	$this->form_validation->set_rules('titulo', 'titulo', 'trim|required');
	$this->form_validation->set_rules('autor', 'autor', 'trim|required');
	$this->form_validation->set_rules('anio', 'anio', 'trim|required|numeric|greater_than[0]');
	$this->form_validation->set_rules('editor', 'editor', 'trim|required');
	$this->form_validation->set_rules('isbn', 'isbn', 'trim|required');
	$this->form_validation->set_rules('idioma', 'idioma', 'trim|required');
	$this->form_validation->set_rules('precio', 'precio', 'trim|required|numeric|greater_than[0]');
	$this->form_validation->set_rules('numPaginas', 'numpaginas', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    function logout() {
    	// $this->session->unset_userdata('logged_in');
    	session_destroy ();
    
    	redirect ( 'login', 'refresh' );
    
    	// redirect('home_'.$this, 'refresh');
    }

}

/* End of file Libros.php */
/* Location: ./application/controllers/Libros.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-15 00:41:42 */
/* http://harviacode.com */
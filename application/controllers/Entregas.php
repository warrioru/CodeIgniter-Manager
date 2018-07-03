<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Entregas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Entregas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'entregas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'entregas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'entregas/index.html';
            $config['first_url'] = base_url() . 'entregas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Entregas_model->total_rows($q);
        $entregas = $this->Entregas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'entregas_data' => $entregas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('entregas/entregas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Entregas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nombreCliente' => $row->nombreCliente,
		'numFactura' => $row->numFactura,
		'fechaEntrega' => $row->fechaEntrega,
		'direccion' => $row->direccion,
		'observaciones' => $row->observaciones,
		'estado' => $row->estado,
		'id_encargado_fk' => $row->id_encargado_fk,
		'id_vendedor_fk' => $row->id_vendedor_fk,
	    );
            $this->load->view('entregas/entregas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('entregas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('entregas/create_action'),
	    'id' => set_value('id'),
	    'nombreCliente' => set_value('nombreCliente'),
	    'numFactura' => set_value('numFactura'),
	    'fechaEntrega' => set_value('fechaEntrega'),
	    'direccion' => set_value('direccion'),
	    'observaciones' => set_value('observaciones'),
	    'estado' => set_value('estado'),
	    'id_encargado_fk' => set_value('id_encargado_fk'),
	    'id_vendedor_fk' => set_value('id_vendedor_fk'),
	);
        $this->load->view('entregas/entregas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nombreCliente' => $this->input->post('nombreCliente',TRUE),
		'numFactura' => $this->input->post('numFactura',TRUE),
		'fechaEntrega' => $this->input->post('fechaEntrega',TRUE),
		'direccion' => $this->input->post('direccion',TRUE),
		'observaciones' => $this->input->post('observaciones',TRUE),
		'estado' => $this->input->post('estado',TRUE),
		'id_encargado_fk' => $this->input->post('id_encargado_fk',TRUE),
		'id_vendedor_fk' => $this->input->post('id_vendedor_fk',TRUE),
	    );

            $this->Entregas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('entregas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Entregas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('entregas/update_action'),
		'id' => set_value('id', $row->id),
		'nombreCliente' => set_value('nombreCliente', $row->nombreCliente),
		'numFactura' => set_value('numFactura', $row->numFactura),
		'fechaEntrega' => set_value('fechaEntrega', $row->fechaEntrega),
		'direccion' => set_value('direccion', $row->direccion),
		'observaciones' => set_value('observaciones', $row->observaciones),
		'estado' => set_value('estado', $row->estado),
		'id_encargado_fk' => set_value('id_encargado_fk', $row->id_encargado_fk),
		'id_vendedor_fk' => set_value('id_vendedor_fk', $row->id_vendedor_fk),
	    );
            $this->load->view('entregas/entregas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('entregas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nombreCliente' => $this->input->post('nombreCliente',TRUE),
		'numFactura' => $this->input->post('numFactura',TRUE),
		'fechaEntrega' => $this->input->post('fechaEntrega',TRUE),
		'direccion' => $this->input->post('direccion',TRUE),
		'observaciones' => $this->input->post('observaciones',TRUE),
		'estado' => $this->input->post('estado',TRUE),
		'id_encargado_fk' => $this->input->post('id_encargado_fk',TRUE),
		'id_vendedor_fk' => $this->input->post('id_vendedor_fk',TRUE),
	    );

            $this->Entregas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('entregas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Entregas_model->get_by_id($id);

        if ($row) {
            $this->Entregas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('entregas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('entregas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nombreCliente', 'nombrecliente', 'trim|required');
	$this->form_validation->set_rules('numFactura', 'numfactura', 'trim|required');
	$this->form_validation->set_rules('fechaEntrega', 'fechaentrega', 'trim|required');
	$this->form_validation->set_rules('direccion', 'direccion', 'trim|required');
	$this->form_validation->set_rules('estado', 'estado', 'trim|required');
	$this->form_validation->set_rules('id_encargado_fk', 'id encargado fk', 'trim|required');
	$this->form_validation->set_rules('id_vendedor_fk', 'id vendedor fk', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Entregas.php */
/* Location: ./application/controllers/Entregas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-02 21:00:57 */
/* http://harviacode.com */

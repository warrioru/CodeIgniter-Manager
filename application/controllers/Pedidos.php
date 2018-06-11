<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedidos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pedidos_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pedidos/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pedidos/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pedidos/index.html';
            $config['first_url'] = base_url() . 'pedidos/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pedidos_model->total_rows($q);
        $pedidos = $this->Pedidos_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pedidos_data' => $pedidos,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pedidos/pedidos_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pedidos_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nombreCliente' => $row->nombreCliente,
		'numFactura' => $row->numFactura,
		'estado' => $row->estado,
		'id_encargado_fk' => $row->id_encargado_fk,
	    );
            $this->load->view('pedidos/pedidos_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pedidos'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pedidos/create_action'),
	    'id' => set_value('id'),
	    'nombreCliente' => set_value('nombreCliente'),
	    'numFactura' => set_value('numFactura'),
	    'estado' => set_value('estado'),
	    'id_encargado_fk' => set_value('id_encargado_fk'),
	);
        $this->load->view('pedidos/pedidos_form', $data);
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
		'estado' => $this->input->post('estado',TRUE),
		'id_encargado_fk' => $this->input->post('id_encargado_fk',TRUE),
	    );

            $this->Pedidos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pedidos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pedidos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pedidos/update_action'),
		'id' => set_value('id', $row->id),
		'nombreCliente' => set_value('nombreCliente', $row->nombreCliente),
		'numFactura' => set_value('numFactura', $row->numFactura),
		'estado' => set_value('estado', $row->estado),
		'id_encargado_fk' => set_value('id_encargado_fk', $row->id_encargado_fk),
	    );
            $this->load->view('pedidos/pedidos_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pedidos'));
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
		'estado' => $this->input->post('estado',TRUE),
		'id_encargado_fk' => $this->input->post('id_encargado_fk',TRUE),
	    );

            $this->Pedidos_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pedidos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pedidos_model->get_by_id($id);

        if ($row) {
            $this->Pedidos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pedidos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pedidos'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nombreCliente', 'nombrecliente', 'trim|required');
	$this->form_validation->set_rules('numFactura', 'numfactura', 'trim|required');
	$this->form_validation->set_rules('estado', 'estado', 'trim|required');
	$this->form_validation->set_rules('id_encargado_fk', 'id encargado fk', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pedidos.php */
/* Location: ./application/controllers/Pedidos.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-11 21:40:22 */
/* http://harviacode.com */

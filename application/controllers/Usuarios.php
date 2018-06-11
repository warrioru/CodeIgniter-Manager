<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'usuarios/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'usuarios/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'usuarios/index.html';
            $config['first_url'] = base_url() . 'usuarios/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Usuarios_model->total_rows($q);
        $usuarios = $this->Usuarios_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'usuarios_data' => $usuarios,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('usuarios/usuarios_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Usuarios_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'email' => $row->email,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'password' => $row->password,
		'is_active' => $row->is_active,
		'id_role_fk' => $row->id_role_fk,
	    );
            $this->load->view('usuarios/usuarios_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuarios'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('usuarios/create_action'),
	    'id' => set_value('id'),
	    'email' => set_value('email'),
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
	    'password' => set_value('password'),
	    'is_active' => set_value('is_active'),
	    'id_role_fk' => set_value('id_role_fk'),
	);
        $this->load->view('usuarios/usuarios_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'is_active' => $this->input->post('is_active',TRUE),
		'id_role_fk' => $this->input->post('id_role_fk',TRUE),
	    );

            $this->Usuarios_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usuarios'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Usuarios_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('usuarios/update_action'),
		'id' => set_value('id', $row->id),
		'email' => set_value('email', $row->email),
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
		'password' => set_value('password', $row->password),
		'is_active' => set_value('is_active', $row->is_active),
		'id_role_fk' => set_value('id_role_fk', $row->id_role_fk),
	    );
            $this->load->view('usuarios/usuarios_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuarios'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
			$newPass = $this->input->post('password',TRUE);
			if (strlen($newPass) != 32) {
				//hash to md5
				$newPass = md5($newPass);
			}
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'password' => $newPass,
		'is_active' => $this->input->post('is_active',TRUE),
		'id_role_fk' => $this->input->post('id_role_fk',TRUE),
	    );

            $this->Usuarios_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('usuarios'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Usuarios_model->get_by_id($id);

        if ($row) {
            $this->Usuarios_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usuarios'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuarios'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');
	$this->form_validation->set_rules('id_role_fk', 'id role fk', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-11 19:01:04 */
/* http://harviacode.com */

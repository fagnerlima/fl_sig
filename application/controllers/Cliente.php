<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fagner
 * @date 05/07/2016
 */
class Cliente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login'))
            redirect('login');

        $this->load->helper('form');
        $this->load->model('Cliente_model');
    }

    public function index()
    {
        // Verificação de usuário limitado
        if ($this->session->userdata('tipo') == 3)
            redirect();
        
        $data['title'] = 'Cliente';
        $data['error'] = null;
        $data['clientes'] = null;
        $data['pagination'] = null;

        /*
         * Verificação do número de clientes
         */
        $data['num_clientes'] = $this->Cliente_model->count_all();

        if ($data['num_clientes'] < 0)
            $data['num_clientes'] = 0;

        /*
         * Geração da lista de clientes e paginação
         */
        if ($data['num_clientes'] > 0) {
            $this->load->library('pagination');
            $this->load->helper('pagination_helper');

            $config = generate_pagination_config(base_url('cliente'), $data['num_clientes'], 10, 2, 5);
            $this->pagination->initialize($config);

            $offset = $this->uri->segment(2) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;

            $data['clientes'] = $this->Cliente_model->select_by_page($config['per_page'], $offset);
            $data['pagination'] = $this->pagination->create_links();
        }

        $this->load->view('cliente/index', $data);
    }
}
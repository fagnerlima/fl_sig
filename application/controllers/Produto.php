<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fagner
 * @date 13/07/2016
 */
class Produto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login'))
            redirect('login');

        $this->load->helper('form');
        $this->load->model('Produto_model');
    }

    public function index()
    {
        $data['title'] = 'Produto';
        $data['categorias'] = null;
        $data['pagination'] = null;

        /*
         * Verificação do número de categorias
         */
        $data['count_all'] = $this->Produto_model->count_all();

        if ($data['count_all'] < 0)
            $data['count_all'] = 0;

        /*
         * Geração da lista de produtos e paginação
         */
        if ($data['count_all'] > 0) {
            $this->load->library('pagination');
            $this->load->helper('pagination_helper');

            $config = generate_pagination_config(base_url('produto'), $data['count_all'], 10, 2, 5);
            $this->pagination->initialize($config);

            $offset = $this->uri->segment(2) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;

            $data['produtos'] = $this->Produto_model->select_by_page($config['per_page'], $offset);
            $data['pagination'] = $this->pagination->create_links();
        }

        $this->load->view('produto/index', $data);
    }

    
}
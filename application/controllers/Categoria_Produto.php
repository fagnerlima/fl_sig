<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fagner
 * @date 12/07/2016
 */
class Categoria_Produto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('form');
        $this->load->model('Categoria_Produto_model');
    }

    public function index()
    {
        $data['title'] = 'Categorias de Produtos';
        $data['categorias'] = null;
        $data['pagination'] = null;

        /*
         * Verificação do número de categorias
         */
        $data['count_all'] = $this->Categoria_Produto_model->count_all();

        if ($data['count_all'] < 0)
            $data['count_all'] = 0;

        /*
         * Geração da lista de categorias e paginação
         */
        if ($data['count_all'] > 0) {
            $this->load->library('pagination');
            $this->load->helper('pagination_helper');

            $config = generate_pagination_config(base_url('categoria_produto'), $data['count_all'], 10, 2, 5);
            $this->pagination->initialize($config);

            $offset = $this->uri->segment(2) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;

            $data['categorias'] = $this->Categoria_Produto_model->select_by_page($config['per_page'], $offset);
            $data['pagination'] = $this->pagination->create_links();
        }

        $this->load->view('categoria_produto/index', $data);
    }
}
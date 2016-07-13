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

        if (!$this->session->userdata('login'))
            redirect('login');
        
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

    public function cadastrar()
    {
        $data['title'] = 'Cadastrar Categoria de Produto';
        $data['error'] = null;

        if ($_POST) {
            // Validação do formulário
            $this->validation();

            /*
             * Validação das Informações
             */
            if (!$this->form_validation->run()) {
                $data['error'] = validation_errors();
            } else {
                /*
                 * Inserção no BD
                 */
                if ($this->Categoria_Produto_model->insert($_POST))
                    $this->session->set_flashdata('success', 'Cadastro efetuado com sucesso!');
                else
                    $data['error'] = 'Ocorreu uma falha no cadastro.';
            }
        }

        $this->load->view('categoria_produto/cadastrar', $data);
    }
    
    public function editar($id)
    {
        $data['title'] = 'Editar Categoria de Produto';
        $data['error'] = null;
        $data['categoria_produto'] = null;

        $data['categoria_produto'] = $this->Categoria_Produto_model->select_by_id($id);

        if ($_POST) {
            // Validação do formulário
            $this->validation();

            if (!$this->form_validation->run()) {
                $data['error'] = validation_errors();
            } else {
                // Atualização no BD
                if ($this->Categoria_Produto_model->update($id, $_POST)) {
                    $this->session->set_flashdata('success', 'Atualização efetuada com sucesso!');
                    $data['categoria_produto'] = $this->Categoria_Produto_model->select_by_id($id);
                }
                else
                    $data['error'] = 'Ocorreu uma falha na atualização.';
            }
        }

        $this->load->view('categoria_produto/editar', $data);
    }
    
    public function excluir($id)
    {
        if ($this->Categoria_Produto_model->delete($id))
            redirect('categoria_produto');
        else
            echo "<p>Erro na exclusão da categoria {$id}. <a href='" . base_url('categoria_produto') . "'>Voltar</a></p>";
    }

    /**
     * Validação dos formulários
     */
    private function validation()
    {
        /*
         * Tratamento das informações
         */
        $_POST['descricao'] = mb_strtoupper(htmlspecialchars($_POST['descricao']));

        $this->load->library('form_validation');

        /*
         * Regras de validação das informações
         */
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|trim|min_length[3]|max_length[60]');
    }
}
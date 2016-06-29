<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @user Fagner
 * @date 24/06/2016
 */
class Usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login'))
            redirect('login');

        $this->load->helper('form');
    }

    public function index()
    {
        $data['title'] = 'Usuário';

        $this->load->model('Usuario_model');
        $data['usuarios'] = $this->Usuario_model->select_all();
        $data['num_usuarios'] = $this->Usuario_model->count_all();

        // Verificação de tabela sem registros
        if ($data['num_usuarios'] < 0)
            $data['num_usuarios'] = 0;
        
        $this->load->view('usuario/index', $data);
    }

    public function cadastrar()
    {
        $data['title'] = 'Cadastrar Usuário';
        $data['error'] = null;

        if ($this->input->post()) {
            /*
             * Tratamento das informações
             */
            $_POST['nome'] = mb_strtoupper(htmlspecialchars($_POST['nome']));
            $_POST['email'] = mb_strtolower(htmlspecialchars($_POST['email']));

            $this->load->library('form_validation');

            /*
             * Regras de validação da informações
             */
            $this->form_validation->set_rules('nome', 'Nome', 'required|trim|min_length[6]|max_length[60]');
            $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|max_length[60]|is_unique[usuario.email]');
            $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[4]|max_length[20]');
            $this->form_validation->set_rules('confirmacao_senha', 'Confirmação de Senha', 'required|matches[senha]');
            $this->form_validation->set_rules('tipo', 'Tipo', 'required|exact_length[1]|in_list[2,3]');
            $this->form_validation->set_rules('status', 'Status', 'required|exact_length[1]|in_list[1,0]');

            /*
             * Validação das Informações
             */
            if (!$this->form_validation->run()) {
                $data['error'] = validation_errors();
            } else {
                $this->load->model('Usuario_model');

                // Exclui o valor de confirmação de senha, pois não existe no BD.
                unset($_POST['confirmacao_senha']);

                /*
                 * Inserção no BD
                 */
                if ($this->Usuario_model->insert($this->input->post()))
                    $this->session->set_flashdata('success', 'Cadastro efetuado com sucesso!');
                else
                    $data['error'] = 'Ocorreu uma falha no cadastro.';
            }
        }

        $this->load->view('usuario/cadastrar', $data);
    }
}
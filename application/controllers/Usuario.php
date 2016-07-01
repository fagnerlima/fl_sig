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
        $this->load->model('Usuario_model');
    }

    public function index()
    {
        // Verificação de usuário limitado
        if ($this->session->userdata('tipo') == 3)
            redirect();

        $data['title'] = 'Usuário';
        $data['usuarios'] = null;
        $data['pagination'] = null;

        /*
         * Verificação do número de usuários
         */
        $data['num_usuarios'] = $this->Usuario_model->count_all();

        if ($data['num_usuarios'] < 0)
            $data['num_usuarios'] = 0;

        /*
         * Geração da lista de usuários e paginação
         */
        if ($data['num_usuarios'] > 0) {
            $this->load->library('pagination');
            $this->load->helper('pagination_helper');

            $config = generate_pagination_config(base_url('usuario'), $data['num_usuarios'], 10, 2, 5);
            $this->pagination->initialize($config);

            $offset = $this->uri->segment(2) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;

            $data['usuarios'] = $this->Usuario_model->select_by_page($config['per_page'], $offset);
            $data['pagination'] = $this->pagination->create_links();
        }
        
        $this->load->view('usuario/index', $data);
    }

    public function cadastrar()
    {
        // Verificação de usuário limitado
        if ($this->session->userdata('tipo') == 3)
            redirect();

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
             * Regras de validação das informações
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

    public function editar() {
        $data['title'] = 'Editar Usuário';
        $data['error'] = null;
        $data['id'] = $this->uri->segment(3);
        $data['usuario'] = null;

        // Verificação de tentativa de edição de outro usuário por um usuário limitado
        if ($this->session->userdata('tipo') == 3 && $data['id'] != $this->session->userdata('id'))
            redirect();

        // Verificação de tentativa de edição do Administrador
        if ($data['id'] == 1 && $this->session->userdata('id') != 1)
            redirect('usuario');

        $data['usuario'] = $this->Usuario_model->select_by_id($data['id']);

        if ($this->input->post()) {
            // Método privado de validação do formulário
            $this->validation();

            /*
             * Validação das Informações
             */
            if (!$this->form_validation->run()) {
                $data['error'] = validation_errors();
            } else {
                // Exclui o valor de confirmação de senha, pois não existe no BD.
                unset($_POST['confirmacao_senha']);

                /*
                 * Atualização no BD
                 */
                if ($this->Usuario_model->update($data['id'], $_POST)) {
                    $this->session->set_flashdata('success', 'Atualização efetuada com sucesso!');
                    $data['usuario'] = $this->Usuario_model->select_by_id($data['id']);
                }
                else
                    $data['error'] = 'Ocorreu uma falha na atualização.';
            }
        }

        $this->load->view('usuario/editar', $data);
    }

    private function validation()
    {
        /*
         * Tratamento das informações
         */
        $_POST['nome'] = mb_strtoupper(htmlspecialchars($_POST['nome']));
        $_POST['email'] = mb_strtolower(htmlspecialchars($_POST['email']));

        $this->load->library('form_validation');

        /*
         * Regras de validação das informações
         */
        $this->form_validation->set_rules('nome', 'Nome', 'required|trim|min_length[6]|max_length[60]');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[4]|max_length[20]');
        $this->form_validation->set_rules('confirmacao_senha', 'Confirmação de Senha', 'required|matches[senha]');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required|exact_length[1]|in_list[2,3]');
        $this->form_validation->set_rules('status', 'Status', 'required|exact_length[1]|in_list[1,0]');

        $usuario_email = $this->Usuario_model->select_by_id($this->uri->segment(3))->email;
        $is_unique = ($this->uri->segment(2) == 'cadastrar' || $_POST['email'] != $usuario_email ? '|is_unique[usuario.email]' : '');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|max_length[60]' . $is_unique);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fagner
 * @date 24/06/2016
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Login
     */
    public function index()
    {
        /*
         * Verificação de usuário autenticado
         */
        if ($this->session->userdata('login')) {
            redirect();
        }

        $data['title'] = 'Login';
        $data['error'] = null;

        $this->load->helper('form');

        /*
         * Tratamento das informações enviadas do formulário
         */
        if ($this->input->post()) {
            /*
             * Regras de validação do formulário
             */
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|max_length[60]');
            $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[5]|max_length[20]');

            /*
             * Validação do formulário
             */
            if (!$this->form_validation->run()) {
                $data['error'] = validation_errors();
            } else {
                /*
                 * Autenticação
                 */
                $this->load->model('Usuario_model');
                $user = $this->Usuario_model->check_login($this->input->post());

                if (!$user) {
                    $data['error'] = 'Usuário e/ou senha inválido(s).';
                } elseif ($user->status == 0) {
                    $data['error'] = 'Usuário inativo.';
                } else {
                    $this->session->set_userdata([
                        'login' => true,
                        'id' => $user->id,
                        'tipo' => $user->tipo,
                        'status' => $user->status
                    ]);
                    redirect('dashboard');
                }
            }
        }

        $this->parser->parse('login', $data);
    }

    /**
     * Logoff
     */
    public function sair()
    {
        if ($this->session->userdata('login'))
            $this->session->sess_destroy();

        redirect('login');
    }
}
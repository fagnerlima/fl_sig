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

    public function cadastrar()
    {
        $data['title'] = 'Cadastrar Cliente';
        $data['error'] = null;

        if ($this->input->post()) {
            // Validação do formulário
            $this->validation();

            if (!$this->form_validation->run()) {
                $data['error'] = validation_errors();
            } else {
                // Inserção no BD
                if ($this->Cliente_model->insert($this->input->post()))
                    $this->session->set_flashdata('success', 'Cadastro efetuado com sucesso!');
                else
                    $data['error'] = 'Ocorreu uma falha no cadastro.';
            }
        }

        $this->load->view('cliente/cadastrar', $data);
    }

    public function editar($id)
    {
        $data['title'] = 'Editar Cliente';
        $data['error'] = null;
        $data['usuario'] = null;

        $data['cliente'] = $this->Cliente_model->select_by_id($id);

        if ($this->input->post()) {
            // Validação do formulário
            $this->validation();
            
            if (!$this->form_validation->run()) {
                $data['error'] = validation_errors();
            } else {
                // Atualização no BD
                if ($this->Cliente_model->update($id, $_POST)) {
                    $this->session->set_flashdata('success', 'Atualização efetuada com sucesso!');
                    $data['cliente'] = $this->Cliente_model->select_by_id($id);
                }
                else
                    $data['error'] = 'Ocorreu uma falha na atualização.';
            }
        }

        $data['cliente']->data_nascimento = preg_replace('/(\\d{4})-(\\d{2})-(\\d{2})/', '$3/$2/$1', $data['cliente']->data_nascimento);
        
        $this->load->view('cliente/editar', $data);
    }
    
    public function excluir($id)
    {
        if ($this->Cliente_model->delete($id))
            redirect('cliente');
        else
            echo "<p>Erro na exclusão do cliente {$id}. <a href='" . base_url('cliente') . "'>Voltar</a></p>";
    }

    private function validation()
    {
        // Tratamento das informações
        $_POST['nome'] = mb_strtoupper(htmlspecialchars($_POST['nome']));
        $_POST['sobrenome'] = mb_strtoupper(htmlspecialchars($_POST['sobrenome']));
        $_POST['end_cidade'] = mb_strtoupper(htmlspecialchars($_POST['end_cidade']));
        $_POST['end_bairro'] = mb_strtoupper(htmlspecialchars($_POST['end_bairro']));
        $_POST['end_logradouro'] = mb_strtoupper(htmlspecialchars($_POST['end_logradouro']));
        $_POST['end_complemento'] = mb_strtoupper(htmlspecialchars($_POST['end_complemento']));
        $_POST['end_referencia'] = mb_strtoupper(htmlspecialchars($_POST['end_referencia']));
        $_POST['email'] = mb_strtolower(htmlspecialchars($_POST['email']));
        $_POST['data_nascimento'] = preg_replace('/([0-9]{2})\\/([0-9]{2})\\/([0-9]{4})/', '$3-$2-$1', $_POST['data_nascimento']);
        $_POST['end_cep'] = str_replace('-', '', $_POST['end_cep']);
        $_POST['telefone1'] = str_replace(['(', ')', ' ', '-'], '', $_POST['telefone1']);
        $_POST['telefone2'] = str_replace(['(', ')', ' ', '-'], '', $_POST['telefone2']);
        $_POST['obs'] = htmlspecialchars($_POST['obs']);

        $this->load->library('form_validation');

        // Regras de validação das informações
        $this->form_validation->set_rules('nome', 'Nome', 'required|trim|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required|trim|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required|trim|in_list[M,F]');
        $this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'trim|regex_match[/[0-9]{4}-[0-9]{2}-[0-9]{2}/]|callback_data_check');
        $this->form_validation->set_rules('end_cep', 'CEP', 'required|trim|exact_length[8]|numeric');
        $this->form_validation->set_rules('end_uf', 'Estado', 'required|trim|exact_length[2]');
        $this->form_validation->set_rules('end_cidade', 'Cidade', 'required|trim|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('end_logradouro', 'Logradouro', 'trim|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('end_numero', 'Número', 'trim|max_length[4]');
        $this->form_validation->set_rules('end_bairro', 'Bairro', 'trim|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('end_complemento', 'Complemento', 'trim|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('end_referencia', 'Referência', 'trim|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|max_length[60]');
        $this->form_validation->set_rules('telefone1', 'Telefone 1', 'trim|min_length[10]|max_length[11]');
        $this->form_validation->set_rules('telefone2', 'Telefone 2', 'trim|min_length[10]|max_length[11]');
        $this->form_validation->set_rules('obs', 'Observações', 'trim');
    }

    public function data_check($data)
    {
        $data = explode('-', $data);

        if (!checkdate($data[1], $data[2], $data[0])) {
            $this->form_validation->set_message('data_check', 'O campo {field} não corresponde a uma data válida.');
            return false;
        } else
            return true;
    }
}
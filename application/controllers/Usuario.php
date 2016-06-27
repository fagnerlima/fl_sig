<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @user Fagner
 * @date 24/06/2016
 */
class Usuario extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Usuário';

        $this->load->model('Usuario_model');
        $data['usuarios'] = $this->Usuario_model->select_all();
        $data['count_all_usuarios'] = $this->Usuario_model->count_all();

        // Verificação de tabela sem registros
        if ($data['count_all_usuarios'] < 0)
            $data['count_all_usuarios'] = 0;
        
        $this->load->view('usuario/index', $data);
    }
}
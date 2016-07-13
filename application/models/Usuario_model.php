<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'CRUD.php';

/**
 * @author Fagner Lima
 * @date 24/06/2016
 */
class Usuario_model extends CRUD
{
    public function __construct()
    {
        parent::__construct('usuario');
    }

    public function insert($data)
    {
        // SHA-1 para senha
        $data['senha'] = sha1($data['senha']);

        return parent::insert($data);
    }

    public function update($id, $data)
    {
        // SHA-1 para senha
        $data['senha'] = sha1($data['senha']);

        return parent::update($id, $data);
    }

    public function select_by_id($id, $columns = ['id', 'nome', 'email', 'tipo', 'status'])
    {
        return parent::select_by_id($id, $columns);
    }

    public function select_by_page($limit, $offset, $columns = ['id', 'nome', 'email', 'tipo', 'status'],
                                   $where = ['id !=' => 1], $join = null)
    {
        return parent::select_by_page($limit, $offset, $columns, $where, $join);
    }

    public function count_all()
    {
        return parent::count_all() - 1;
    }


    /**
     * Realiza a autenticação do usuário, verificando e-mail e senha.
     *
     * @param $data array Dados do usuário (email e senha).
     * @return bool Confirmação da autenticação.
     */
    public function check_login($data)
    {
        $query = $this->db->select(['id', 'email', 'tipo', 'status'])->from($this->get_table())->where([
            'email' => $data['email'],
            'senha' => sha1($data['senha'])
        ])->get();

        return ($query->num_rows() == 1) ? $query->result()[0] : false;
    }

}
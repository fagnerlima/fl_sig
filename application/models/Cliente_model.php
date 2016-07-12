<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'CRUD.php';

/**
 * @author Fagner Lima
 * @date 05/07/2016
 */
class Cliente_model extends CRUD
{
    public function __construct()
    {
        parent::__construct('cliente');
    }

    public function select_by_id($id, $columns = '*')
    {
        return parent::select_by_id($id, $columns);
    }

    public function select_by_page($limit, $offset,
                                   $columns = ['id', 'nome', 'sobrenome', 'end_uf', 'end_cidade', 'email'],
                                   $where = null)
    {
        return parent::select_by_page($limit, $offset, $columns, $where);
    }
}
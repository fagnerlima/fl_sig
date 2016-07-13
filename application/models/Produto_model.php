<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'CRUD.php';

/**
 * @author Fagner Lima
 * @date 13/07/2016
 */
class Produto_model extends CRUD
{
    public function __construct()
    {
        parent::__construct('produto');
    }

    public function select_by_page($limit, $offset,
                                   $columns = ['produto.id', 'categoria_produto.descricao as categoria',
                                       'produto.descricao', 'produto.valor'],
                                   $where = null,
                                   $join = ['categoria_produto', 'produto.categoria_id = categoria_produto.id'])
    {
        return parent::select_by_page($limit, $offset, $columns, $where, $join);
    }


}
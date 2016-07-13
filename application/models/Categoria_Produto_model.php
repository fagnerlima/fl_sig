<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'CRUD.php';

/**
 * @author Fagner Lima
 * @date 12/07/2016
 */
class Categoria_Produto_model extends CRUD 
{
    public function __construct()
    {
        parent::__construct('categoria_produto');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'CRUD.php';

/**
 * @author Fagner Lima
 * @date 24/06/2016
 */
class Usuario_model extends CI_Model implements CRUD
{
    const TABLE = 'usuario';

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function select_by_id()
    {
        // TODO: Implement select_by_id() method.
    }

    /**
     * @param $data - Dados do usuário (email e senha)
     * @return bool
     */
    public function check_login($data)
    {
        $query = $this->db->select(['id', 'email', 'tipo', 'status'])->from(self::TABLE)->where([
            'email' => $data['email'],
            'senha' => sha1($data['senha'])
        ])->get();

        return ($query->num_rows() == 1) ? $query->result()[0] : false;
    }

}
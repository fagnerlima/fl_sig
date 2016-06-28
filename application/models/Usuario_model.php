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

    public function insert($data)
    {
        // SHA-1 para senha
        $data['senha'] = sha1($data['senha']);

        return $this->db->insert(self::TABLE, $data);
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function select_all()
    {
        // Seleciona todos os usuários, exceto o Administrador (ID 1)
        $query = $this->db->select(['id', 'nome', 'email', 'tipo', 'status'])->from(self::TABLE)->where('id !=', 1)->get();
        
        return $query->result();
    }

    public function select_by_id()
    {
        // TODO: Implement select_by_id() method.
    }

    public function count_all()
    {
        // Retorna o total de registros menos 1 (Administrador - ID 1)
        return $this->db->count_all(self::TABLE) - 1;
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
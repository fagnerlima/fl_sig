<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'CRUD.php';

/**
 * @author Fagner Lima
 * @date 05/07/2016
 */
class Cliente_model extends CI_Model implements CRUD
{
    const TABLE = 'cliente';

    /**
     * @param $data
     * @return bool
     */
    public function insert($data)
    {
        
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id int
     * @return bool
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return object
     */
    public function select_all()
    {
        // TODO: Implement select_all() method.
    }

    /**
     * @param $id
     * @return object
     */
    public function select_by_id($id)
    {
        // TODO: Implement select_by_id() method.
    }

    /**
     * @param $limit
     * @param $offset
     * @return object
     */
    public function select_by_page($limit, $offset)
    {
        $query = $this->db->select(['id', 'nome', 'sobrenome', 'end_uf', 'end_cidade', 'email'])->from(self::TABLE)
            ->limit($limit, $offset)->order_by('id', 'ASC')->get();
        
        return $query->result();
    }

    /**
     * @return int
     */
    public function count_all()
    {
        return $this->db->count_all(self::TABLE);
    }
}
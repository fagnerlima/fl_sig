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
        return $this->db->insert(self::TABLE, $data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update(self::TABLE, $data);
    }

    /**
     * @param $id int
     * @return bool
     */
    public function delete($id)
    {
        $this->db->where('id', $id)->delete(self::TABLE);

        return ($this->db->affected_rows()) ? true : false;
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
        $query = $this->db->select('*')->from(self::TABLE)->where('id', $id)->get();
        
        return $query->result()[0];
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
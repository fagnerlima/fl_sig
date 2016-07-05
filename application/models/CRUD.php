<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fagner Lima
 * @date 24/06/2016
 */
interface CRUD
{
    /**
     * @param $data
     * @return bool
     */
    public function insert($data);

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data);

    /**
     * @param $id int
     * @return bool
     */
    public function delete($id);

    /**
     * @return object
     */
    public function select_all();

    /**
     * @param $id
     * @return object
     */
    public function select_by_id($id);

    /**
     * @param $limit
     * @param $offset
     * @return object
     */
    public function select_by_page($limit, $offset);

    /**
     * @return int
     */
    public function count_all();
}
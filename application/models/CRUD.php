<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fagner Lima
 * @date 24/06/2016
 */
interface CRUD
{
    /**
     *
     * @return bool
     */
    public function insert();

    /**
     * @return bool
     */
    public function update();

    /**
     * @return bool
     */
    public function delete();

    /**
     * @return object
     */
    public function select_all();

    /**
     * @return object
     */
    public function select_by_id();

    /**
     * @return int
     */
    public function count_all();
}
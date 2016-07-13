<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fagner Lima
 * @date 24/06/2016
 */
abstract class CRUD extends CI_Model
{
    /**
     * @var string Nome da tabela.
     */
    private $table;

    /**
     * CRUD constructor.
     * @param $table string Nome da tabela.
     */
    public function __construct($table)
    {
        $this->set_table($table);
    }
    
    public function get_table()
    {
        return $this->table;
    }
    
    public function set_table($table)
    {
        $this->table = $table;
    }

    /**
     * Insere os dados na tabela.
     *
     * @param $data array Dados do registro.
     * @return bool Confirmação de inserção.
     */
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Atualiza um registro da tabela.
     *
     * @param $id int ID do registro.
     * @param $data array Dados do registro.
     * @return bool Confirmação de atualização.
     */
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    /**
     * Exclui um registro da tabela.
     *
     * @param $id int ID do registro.
     * @return bool Confirmação de exclusão.
     */
    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->table);

        return ($this->db->affected_rows() == 1 ? true : false);
    }

    /**
     * Seleciona um registro da tabela pelo ID.
     *
     * @param $id int ID do registro.
     * @param $columns array Colunas da tabela.
     * @return object Registro do ID especificado.
     */
    public function select_by_id($id, $columns = '*')
    {
        $this->db->select($columns)->from($this->table)->where('id', $id);
        $query = $this->db->get();

        return $query->result()[0];
    }

    /**
     * Seleciona registros da tabela por página.
     *
     * @param $limit int Limite de registros.
     * @param $offset int Deslocamento dos registros.
     * @param $columns array Colunas da tabela.
     * @param $where array Cláusula where.
     * @return object Registros por página.
     */
    public function select_by_page($limit, $offset, $columns = '*', $where = null)
    {
        $this->db->select($columns)->from($this->table)->limit($limit, $offset)->order_by('id', 'ASC');

        if ($where)
            $this->db->where($where);

        $query = $this->db->get();

        return $query->result();
    }

    /**
     * Retorna o total de registros da tabela.
     * 
     * @return int Total de registros da tabela.
     */
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
}
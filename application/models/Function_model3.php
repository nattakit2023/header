<?php

//Borrow
//Database


class Function_model3 extends CI_Model
{

    public $borrowdb;

    public function __construct()
    {
        parent::__construct();

        $this->borrowdb = $this->load->database('borrow', TRUE); // Load the 'second_db' group
    }


    function getDataRow($table, $where_array)
    {

        $this->borrowdb->where($where_array);

        return $this->borrowdb->get($table)->row();
    }

    function fetchDataResult($table, $where_array = null, $order_key = null, $order_by = null)

    {

        if ($where_array != null) {

            $this->borrowdb->where($where_array);
        }

        if ($order_key != null && $order_by != null) {

            $this->borrowdb->order_by($order_key, $order_by);
        }

        return $this->borrowdb->get($table)->result();
    }
}

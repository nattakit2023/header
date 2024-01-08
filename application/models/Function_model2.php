<?php

//Admin Store
//Database
class Function_model2 extends CI_Model
{

    public $expensedb;

    public function __construct()
    {
        parent::__construct();

        $this->expensedb = $this->load->database('store', TRUE); // Load the 'second_db' group
    }


    function getDataRow($table, $where_array)
    {

        $this->expensedb->where($where_array);

        return $this->expensedb->get($table)->row();
    }

    function fetchDataResult($table, $where_array = null, $order_key = null, $order_by = null)

    {

        if ($where_array != null) {

            $this->expensedb->where($where_array);
        }

        if ($order_key != null && $order_by != null) {

            $this->expensedb->order_by($order_key, $order_by);
        }

        return $this->expensedb->get($table)->result();
    }
}

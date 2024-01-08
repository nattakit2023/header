<?php

//Helpdesk
//Database


class Function_model4 extends CI_Model
{

    public $helpdeskdb;

    public function __construct()
    {
        parent::__construct();

        $this->helpdeskdb = $this->load->database('helpdesk', TRUE); // Load the 'second_db' group
    }


    function getDataRow($table, $where_array)
    {

        $this->helpdeskdb->where($where_array);

        return $this->helpdeskdb->get($table)->row();
    }

    function fetchDataResult($table, $where_array = null, $order_key = null, $order_by = null)

    {

        if ($where_array != null) {

            $this->helpdeskdb->where($where_array);
        }

        if ($order_key != null && $order_by != null) {

            $this->helpdeskdb->order_by($order_key, $order_by);
        }

        return $this->helpdeskdb->get($table)->result();
    }
}

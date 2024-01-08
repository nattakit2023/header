<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Vessel extends CI_Controller

{

    function __construct()

    {

        parent::__construct();

        if ($this->session->userdata('admin_id') == null) {

            redirect('/');
        }
    }

    public function index()

    {

        redirect('/');
    }

    //-------------------------------------------------------------------------V E S S E L---------------------------------------------------------------------------------------

    //option product

    function option_product()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $products = $this->input->post('product');

        $product = $this->Function_model->fetchDataResult('tbl_product', '', 'id', 'ASC');

        $product_s = $this->Function_model->fetchDataResult('tbl_service_product', ['service_invoice' => $service_invoice]);

        if ($products != '') {
            echo '<option value="'  . $products . '"  >' . $products . '</option>';
        } else {
            echo '<option value=""  >Product</option>';
        }


        if ($service_invoice != '') {
            foreach ($product as $item) {
                $i = 0;
                foreach ($product_s as $item2) {

                    if ($item->product == $item2->product) {
                        echo '<option value="' . $item->product . '" selected>' . $item->id . " . " .  $item->product . '</option>';
                        $i++;
                    }
                }
                if ($i == 0) {
                    echo '<option value="' . $item->product . '">' . $item->id . " . " .  $item->product . '</option>';
                }
            }
        } else {
            foreach ($product as $item) {
                echo '<option value="' . $item->product . '">' . $item->id . " . " .  $item->product . '</option>';
            }
        }
    }

    //option project

    function option_project()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $project = $this->input->post('project');

        $projects = $this->Function_model3->fetchDataResult('projects', '', 'id', 'ASC');

        $project_s = $this->Function_model->fetchDataResult('tbl_service_project', ['service_invoice' => $service_invoice]);

        if ($project != '') {
            echo '<option value="'  . $project . '"  selected>' . $project . '</option>';
        } else {
            echo '<option value=""  >Project</option>';
        }


        if ($service_invoice != '') {
            foreach ($projects as $item) {
                $i = 0;
                foreach ($project_s as $item2) {
                    if ($item->name == $item2->projects) {
                        echo '<option value="' . $item2->projects . '" selected>' . $item->id . " . " .  $item2->projects . '</option>';
                        $i++;
                    }
                }
                if ($i == 0) {
                    echo '<option value="' . $item->name . '">' . $item->id . " . " .  $item->name . '</option>';
                }
            }
        } else {
            foreach ($projects as $item) {
                echo '<option value="' . $item->name . '">' . $item->id . " . " .  $item->name . '</option>';
            }
        }
    }


    // option vessel

    function option_vessel()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $name = $this->input->post('name');

        $vessel = $this->Function_model3->fetchDataResult('product_warehouse', '', 'id', 'ASC');

        $vessel_s = $this->Function_model->fetchDataResult('tbl_vessel_name', ['service_invoice' => $service_invoice]);

        if ($name != '') {
            echo '<option value="' . $name . '" selected>' . $name . '</option>';
        } else {
            echo '<option value=""  >Vessel Name</option>';
        }

        if ($service_invoice != '') {
            foreach ($vessel as $item) {
                $i = 0;
                foreach ($vessel_s as $item2) {
                    if ($item->title == $item2->ves_name) {
                        echo '<option value="' . $item2->ves_name . '" selected>' . $item->id . " . " .  $item2->ves_name . '</option>';
                        $i++;
                    }
                }
                if ($i == 0) {
                    echo '<option value="' . $item->title . '">' . $item->id . " . " .  $item->title . '</option>';
                }
            }
        } else {
            foreach ($vessel as $item) {
                echo '<option value="' . $item->title . '">' . $item->id . " . " .  $item->title . '</option>';
            }
        }
    }


    // option Type Vessel
    function option_type_vessel()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $vessel = $this->Function_model->fetchDataResult('tbl_type_vessel', '', 'id', 'ASC');

        $type = $this->input->post('type');

        if ($type != '') {
            echo '<option value="' . $type . '" selected>' . $type . '</option>';
        } else {
            echo '<option value="" disabled selected>Vessel Type</option>';
        }

        foreach ($vessel as $item) {

            echo '<option value="' . $item->ves_type . '">' . $item->id . " . "  .  $item->ves_type . '</option>';
        }
    }


    // option fleet

    function option_fleet()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $vessel = $this->Function_model4->fetchDataResult('departments', '', 'id', 'ASC');

        $fleet = $this->input->post('fleet');

        if ($fleet != '') {
            echo '<option value="' . $fleet . '" selected>' . $fleet . '</option>';
        } else {
            echo '<option value="" disabled selected>Vessel Fleet</option>';
        }

        foreach ($vessel as $item) {

            echo '<option value="' . $item->name . '">' .  $item->name . '</option>';
        }
    }


}

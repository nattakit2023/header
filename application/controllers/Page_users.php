<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page_users extends CI_Controller

{

    function __construct()

    {
        parent::__construct();
    }

    public function index($page = 'dashboard')
    {
        $data['active'] = $page;

        $data['title'] = 'Vessel';

        $data['vessel'] = $this->input->get('vessel');

        $this->load->view('user/template/header', $data);

        $this->load->view('user/template/navbar');

        $this->load->view('user/template/sidebar', $data);

        $this->load->view('user/' . $page);

        $this->load->view('user/template/footer');
    }

    function tbl_vessel()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $vessel = $this->input->post('vessel');

        $data['service'] = $this->Function_model->fetchdataResult('tbl_service', ['ves_name' => $vessel], 'service_invoice', 'ASC');

        $data['package'] = $this->Function_model->fetchdataResult('tbl_service_package', '');

        $data['product'] = $this->Function_model->fetchdataResult('tbl_service_product', '');

        $data['engineer'] = $this->Function_model->fetchdataResult('tbl_engineer', '');

        $this->load->view('user/tbl_vessel', $data);
    }
    
    function get_vessel(){

    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sidebar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        redirect('/');
    }


    //-----------------------------------------------------------S I D E B A R---------------------------------------------------------------------


    function sidebar_status()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        echo json_encode([

            'service' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status !=' => ''])),

            'service_created' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'created'])),

            'service_verify' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'verify'])),

            'service_approve' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'approve'])),

            'service_wait' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'wait'])),

            'service_fixed' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'fixed'])),

            'service_uninstall' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'uninstall'])),

            'service_done' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'done'])),

            'pms_cre' => count($this->Function_model->fetchDataResult('tbl_pms_job', ['pms_status' => 'created'])),

            'pms_suc' => count($this->Function_model->fetchDataResult('tbl_pms_job', ['pms_status' => 'success'])),

            'cm_cre' => count($this->Function_model->fetchDataResult('tbl_cm_job', ['cm_status' => 'created'])),

            'cm_suc' => count($this->Function_model->fetchDataResult('tbl_cm_job', ['cm_status' => 'success'])),

            'vsat' => count($this->Function_model->fetchDataResult('tbl_service', ['vsat' => '1'])),

            'cctv' => count($this->Function_model->fetchDataResult('tbl_service', ['cctv' => '1'])),

            'tvro' => count($this->Function_model->fetchDataResult('tbl_service', ['tvro' => '1'])),

            'voip' => count($this->Function_model->fetchDataResult('tbl_service', ['voip' => '1'])),

            'port' => count($this->Function_model->fetchDataResult('tbl_port', '')),

            'package' => count($this->Function_model->fetchDataResult('tbl_package', '')),

            'contact' => count($this->Function_model->fetchDataResult('tbl_contact', '')),

            'user' => count($this->Function_model->fetchDataResult('tbl_admin', '')),

        ]);
        exit();
    }
}

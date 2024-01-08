<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Report extends CI_Controller

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



    function tblReportService()

    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $datestart = $this->input->post('datestart');

        $dateend = $this->input->post('dateend');

        if ($datestart == null || $dateend == null) {

            $where_arr = array(

                'service_status' => ''

            );
        } else {

            $where_arr = array(

                'due_date >=' => $datestart,

                'due_date <=' => $dateend,

                'service_status' => ''

            );
        }

        $data['service'] = $this->Function_model->fetchDataResult('tbl_service', $where_arr, 'service_invoice', 'DESC');

        $data['service_project'] = $this->Function_model->fetchDataResult('tbl_service_project', '', 'service_invoice', 'DESC');

        $data['service_vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', '', 'id', 'ASC');

        $this->load->view('components/tbl_report_service', $data);
    }

    function tblPMS()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $rec = $this->input->post('rec');

        if ($rec == 'pms_cre') {
            $data['service_pms'] = $this->Function_model->fetchDataResult('tbl_pms_job', ['pms_status' => 'created']);
            $data['pms'] = $rec;
            $this->load->view('components/tbl_pms_all', $data);
        } else if ($rec == 'pms_suc') {
            $data['service_pms'] = $this->Function_model->fetchDataResult('tbl_pms_job', ['pms_status' => 'success']);
            $data['pms'] = $rec;
            $this->load->view('components/tbl_pms_all', $data);
        } else {
            $data['service'] = $this->Function_model->fetchDataResult('tbl_service', '', 'service_invoice', 'ASC');
            $data['service_vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', '', 'id', 'ASC');

            $data['pms'] = $rec;


            $this->load->view('components/tbl_pms', $data);
        }
    }

    function createReport()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $rec = $this->input->post('pms');

        $service_invoice = $this->input->post('service_invoice');

        if ($rec == 'pms') {


            $pms1 = $this->input->post('pms1');

            $pms2_1 = $this->input->post('pms2_1');

            $pms2_2 = $this->input->post('pms2_2');

            $pms2_3 = $this->input->post('pms2_3');

            $pms2_4 = $this->input->post('pms2_4');

            $pms2_5 = $this->input->post('pms2_5');

            $pms3_1 = $this->input->post('pms3_1');

            $pms3_2 = $this->input->post('pms3_2');

            $pms3_3 = $this->input->post('pms3_3');

            $pms4 = $this->input->post('pms4');

            $pms5 = $this->input->post('pms5');

            $pms5_1 = $this->input->post('pms5_1');

            $pms5_2 = $this->input->post('pms5_2');

            $pms6 = $this->input->post('pms6');

            $ship = $this->input->post('ship');
            $pos = $this->input->post('pos');

            $user = $this->input->post('user');
            $pc_location = $this->input->post('pc_location');
            $pc_name = $this->input->post('pc_name');
            $pc_ip = $this->input->post('pc_ip');
            $workgroup = $this->input->post('workgroup');


            $data = [
                'service_invoice' => $service_invoice,
                'pms1'          => $pms1,
                'pms2_1'        => $pms2_1,
                'pms2_2'        => $pms2_2,
                'pms2_3'        => $pms2_3,
                'pms2_4'        => $pms2_4,
                'pms2_5'        => $pms2_5,
                'pms3_1'        => $pms3_1,
                'pms3_2'        => $pms3_2,
                'pms3_3'        => $pms3_3,
                'pms4'          => $pms4,
                'pms5'          => $pms5,
                'pms5_1'        => $pms5_1,
                'pms5_2'        => $pms5_2,
                'pms6'          => $pms6,
                'ship'          => $ship,
                'pos'           => $pos,
                'pc_location'   => $pc_location,
                'pc_name'       => $pc_name,
                'pc_ip'         => $pc_ip,
                'user'          => $user,
                'workgroup'     => $workgroup
            ];
        } else if ($rec == 'cctv') {

            $cctv1_1 = $this->input->post('cctv1_1');

            $cctv1_2 = $this->input->post('cctv1_2');

            $cctv2_1 = $this->input->post('cctv2_1');

            $cctv2_2 = $this->input->post('cctv2_2');

            $cctv3_1 = $this->input->post('cctv3_1');

            $cctv3_2 = $this->input->post('cctv3_2');

            $cctv3_3 = $this->input->post('cctv3_3');

            $cctv3_4 = $this->input->post('cctv3_4');

            $cctv4_1 = $this->input->post('cctv4_1');

            $cctv5_1 = $this->input->post('cctv5_1');

            $cctv5_2 = $this->input->post('cctv5_2');

            $customer_remark = $this->input->post('customer_remark');

            $customer_comment = $this->input->post('customer_comment');

            $ves_location = $this->input->post('ves_location');

            $nvr_ip = $this->input->post('nvr_ip');

            $nvr_mac = $this->input->post('nvr_mac');

            $data = [
                'service_invoice'    => $service_invoice,
                'cctv1_1'            => $cctv1_1,
                'cctv1_2'            => $cctv1_2,
                'cctv2_1'            => $cctv2_1,
                'cctv2_2'            => $cctv2_2,
                'cctv3_1'            => $cctv3_1,
                'cctv3_2'            => $cctv3_2,
                'cctv3_3'            => $cctv3_3,
                'cctv3_4'            => $cctv3_4,
                'cctv4_1'            => $cctv4_1,
                'cctv5_1'            => $cctv5_1,
                'cctv5_2'            => $cctv5_2,
                'customer_remark'    => $customer_remark,
                'customer_comment'   => $customer_comment,
                'ves_location'       => $ves_location,
                'nvr_ip'             => $nvr_ip,
                'nvr_mac'            => $nvr_mac
            ];
        } else if ($rec == 'tvro') {

            $tvro1_1 = $this->input->post('tvro1_1');

            $tvro2_1 = $this->input->post('tvro2_1');

            $tvro2_2 = $this->input->post('tvro2_2');

            $tvro2_3 = $this->input->post('tvro2_3');

            $tvro2_4 = $this->input->post('tvro2_4');

            $tvro2_5 = $this->input->post('tvro2_5');

            $tvro3_1 = $this->input->post('tvro3_1');

            $tvro3_2 = $this->input->post('tvro3_2');

            $tvro3_3 = $this->input->post('tvro3_3');

            $tvro4_1 = $this->input->post('tvro4_1');

            $tvro5_1 = $this->input->post('tvro5_1');

            $customer_remark = $this->input->post('customer_remark');

            $customer_comment = $this->input->post('customer_comment');

            $ves_location = $this->input->post('ves_location');

            $data = [
                'service_invoice'    => $service_invoice,
                'tvro1_1'            => $tvro1_1,
                'tvro2_1'            => $tvro2_1,
                'tvro2_2'            => $tvro2_2,
                'tvro2_3'            => $tvro2_3,
                'tvro2_4'            => $tvro2_4,
                'tvro2_5'            => $tvro2_5,
                'tvro3_1'            => $tvro3_1,
                'tvro3_2'            => $tvro3_2,
                'tvro3_3'            => $tvro3_3,
                'tvro4_1'            => $tvro4_1,
                'tvro5_1'            => $tvro5_1,
                'customer_remark'    => $customer_remark,
                'customer_comment'   => $customer_comment,
                'ves_location'       => $ves_location,
            ];
        } else if ($rec == 'vsat') {
            $vsat1_1 = $this->input->post('vsat1_1');

            $vsat2_1 = $this->input->post('vsat2_1');

            $vsat2_2 = $this->input->post('vsat2_2');

            $vsat2_3 = $this->input->post('vsat2_3');

            $vsat2_4 = $this->input->post('vsat2_4');

            $vsat2_5 = $this->input->post('vsat2_5');

            $vsat2_6 = $this->input->post('vsat2_6');

            $vsat2_7 = $this->input->post('vsat2_7');

            $vsat2_8 = $this->input->post('vsat2_8');

            $vsat2_9 = $this->input->post('vsat2_9');

            $vsat3_1 = $this->input->post('vsat3_1');

            $vsat3_2 = $this->input->post('vsat3_2');

            $vsat4_1 = $this->input->post('vsat4_1');

            $vsat5_1 = $this->input->post('vsat5_1');

            $vsat6_1 = $this->input->post('vsat6_1');

            $vsat6_2 = $this->input->post('vsat6_2');

            $vsat7_1 = $this->input->post('vsat7_1');

            $vsat7_2 = $this->input->post('vsat7_2');

            $vsat8_1 = $this->input->post('vsat8_1');

            $customer_remark = $this->input->post('customer_remark');

            $customer_comment = $this->input->post('customer_comment');

            $ves_location = $this->input->post('ves_location');

            $pc_ip = $this->input->post('pc_ip');

            $mac_add = $this->input->post('mac_add');

            $data = [
                'service_invoice'   => $service_invoice,
                'vsat1_1'            => $vsat1_1,
                'vsat2_1'            => $vsat2_1,
                'vsat2_2'            => $vsat2_2,
                'vsat2_3'            => $vsat2_3,
                'vsat2_4'            => $vsat2_4,
                'vsat2_5'            => $vsat2_5,
                'vsat2_6'            => $vsat2_6,
                'vsat2_7'            => $vsat2_7,
                'vsat2_8'            => $vsat2_8,
                'vsat2_9'            => $vsat2_9,
                'vsat3_1'            => $vsat3_1,
                'vsat3_2'            => $vsat3_2,
                'vsat4_1'            => $vsat4_1,
                'vsat5_1'            => $vsat5_1,
                'vsat6_1'            => $vsat6_1,
                'vsat6_2'            => $vsat6_2,
                'vsat7_1'            => $vsat7_1,
                'vsat7_2'            => $vsat7_2,
                'vsat8_1'            => $vsat8_1,
                'customer_remark'   => $customer_remark,
                'customer_comment'  => $customer_comment,
                'ves_location'      => $ves_location,
                'pc_ip'             => $pc_ip,
                'mac_add'           => $mac_add
            ];
        } else if ($rec == 'voip') {

            $voip1_1 = $this->input->post('voip1_1');

            $voip1_2 = $this->input->post('voip1_2');

            $voip2_1 = $this->input->post('voip2_1');

            $voip2_2 = $this->input->post('voip2_2');

            $voip2_3 = $this->input->post('voip2_3');

            $customer_remark = $this->input->post('customer_remark');

            $customer_comment = $this->input->post('customer_comment');

            $ves_location = $this->input->post('ves_location');

            $voip_ip = $this->input->post('voip_ip');

            $voip_mac = $this->input->post('voip_mac');

            $data = [
                'service_invoice'    => $service_invoice,
                'voip1_1'            => $voip1_1,
                'voip1_2'            => $voip1_2,
                'voip2_1'            => $voip2_1,
                'voip2_2'            => $voip2_2,
                'voip2_3'            => $voip2_3,
                'customer_remark'    => $customer_remark,
                'customer_comment'   => $customer_comment,
                'ves_location'       => $ves_location,
                'voip_ip'            => $voip_ip,
                'voip_mac'           => $voip_mac
            ];
        }



        $res = $this->Function_model->insertData('tbl_report_' . $rec, $data);

        $res = $this->Function_model->updateData('tbl_service', ['service_invoice' => $service_invoice], [$rec => 'created']);

        if ($res == true) {
            echo json_encode([

                'status' => 'SUCCESS',

                'service_invoice' => $service_invoice

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Create ATP Fail!'

            ]);

            exit();
        }
    }

    function create_pms()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $invoice = $this->input->post('invoice');

        $project = $this->input->post('projects');

        $product = $this->input->post('product');

        $create_date = $this->input->post('create_date');

        $due_date = $this->input->post('due_date');

        $end_date = $this->input->post('end_date');

        $cus_name = $this->input->post('cus_name');

        $cus_tel = $this->input->post('cus_tel');

        $cus_email = $this->input->post('cus_email');

        $cus_address = $this->input->post('cus_address');

        $cus_zipcode = $this->input->post('cus_zipcode');

        $ves_fleet = $this->input->post('ves_fleet');

        $ves_name = $this->input->post('ves_name');

        foreach ($product as $product) {

            $pms_invoice = 'PMS' . $this->Function_model->genPMS();

            $data_pms = [

                'pms_invoice' => $pms_invoice,

                'title' => $pms_invoice,

                'descript' => $ves_name,

                'due_date' => $due_date,

                'end_date' => $end_date,

                'color' => '#c0ccff'
            ];

            $this->Function_model->insertData('tbl_calendar', $data_pms);

            $calendar = count($this->Function_model->fetchDataResult('tbl_calendar', '', 'id', 'ASC'));

            $data_arr = [

                'id_calendar' => $calendar + 1,

                'pms_invoice' => $pms_invoice,

                'from_invoice' => $invoice,

                'project' => $project,

                'product' => $product,

                'cus_name' => $cus_name,

                'cus_address' => $cus_address,

                'cus_tel' => $cus_tel,

                'cus_email' => $cus_email,

                'cus_zipcode' => $cus_zipcode,

                'ves_fleet' => $ves_fleet,

                'ves_name' => $ves_name,

                'create_date' => $create_date,

                'due_date' => $due_date,

                'end_date' => $end_date,

            ];



            $res = $this->Function_model->insertData('tbl_pms_job', $data_arr);
        }

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'Create PMS Success',

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Create Service Fail!'

            ]);

            exit();
        }
    }
}

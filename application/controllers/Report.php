<?php

defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

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

    function tblReportFleet()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $fleet = $this->input->get('fleet');

        if ($fleet == 'null') {
            $where_arr = [

                'ves_fleet' => $fleet

            ];

            $where_fleet = '';
        } else {
            $where_arr = [

                'ves_maintenance' => 'Preventive Maintenance',

                'ves_installation' => 'true'

            ];

            $where_fleet = ['fleet' => $fleet];
        }

        $data['service'] = $this->Function_model->fetchDataResult('tbl_service', $where_arr, 'service_invoice', 'ASC');

        $data['service_eqp'] = $this->Function_model->fetchDataResult('old_equipment', $where_fleet, 'fleet', 'DESC');

        $this->load->view('components/tbl_report_fleet', $data);
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

    function tblCM()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            show_404();
            exit();
        }

        $rec = $this->input->post('rec');
        if ($rec == 'cm_cre') {
            $data['service_cm'] = $this->Function_model->fetchDataResult('tbl_cm_job', ['cm_status' => 'created']);
            $data['pms'] = $rec;
            $this->load->view('components/tbl_cm_all', $data);
        } else if ($rec == 'cm_suc') {
            $data['service_cm'] = $this->Function_model->fetchDataResult('tbl_cm_job', ['cm_status' => 'success']);
            $data['pms'] = $rec;
            $this->load->view('components/tbl_cm_all', $data);
        }
    }

    function get_equipment()
    {

        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            show_404();
            exit();
        }

        $id = $this->input->post('id');

        $res = $this->Function_model->getDataRow('old_equipment', ['id' => $id]);

        if ($res != null) {

            echo json_encode([

                'status' => 'SUCCESS',

                'data' => [

                    'service_invoice' => $res->service_invoice,

                    'fleet' => $res->fleet,

                    'vessel' => $res->vessel,

                    'type' => $res->type,

                    'sattellite' => $res->sattellite,

                    'zone' => $res->zone,

                    'size' => $res->size,

                    'antenna' => $res->antenna_maker,

                    'system' => $res->system,

                    'modem' => $res->modem,

                    'controller' => $res->controller,

                    'due_date' => $res->installation_date,

                    'end_date' => $res->complete_date,

                    'voip' => $res->voip,

                    'cctv' => $res->cctv,

                    'tvro' => $res->tvro,

                    'edit_status' => $res->status
                ]


            ]);

            exit();
        } else {

            echo json_encode([

                'message' => 'Failed Get Data',

                'status' => 'ERROR'
            ]);

            exit();
        }
    }

    function edit_equipment()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $data = $this->input->post('data');

        if ($data != null) {
            echo json_encode([
                'status' => 'ERROR',

                'message' => 'have data'
            ]);
            exit();
        } else {
            echo json_encode([
                'status' => 'ERROR',

                'message' => 'have not data'
            ]);
            exit();
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

            $calendar = $this->Function_model->getDataRow('tbl_calendar', $data_pms);

            $data_arr = [

                'id_calendar' => $calendar->id,

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

                'user_created' => $this->session->userdata('admin_name')

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

    function create_cm()
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

            $cm_invoice = 'CM' . $this->Function_model->genCM();

            $data_cm = [

                'cm_invoice' => $cm_invoice,

                'title' => $cm_invoice,

                'descript' => $ves_name,

                'due_date' => $due_date,

                'end_date' => $end_date,

                'color' => '#c0ccff'
            ];

            $this->Function_model->insertData('tbl_calendar', $data_cm);

            $calendar = $this->Function_model->getDataRow('tbl_calendar', $data_cm);

            $data_arr = [

                'id_calendar' => $calendar->id,

                'cm_invoice' => $cm_invoice,

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

                'user_created' => $this->session->userdata('admin_name')

            ];



            $res = $this->Function_model->insertData('tbl_cm_job', $data_arr);
        }

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'Create CM Success',

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Create CM Fail!'

            ]);

            exit();
        }
    }

    function create_service_cm()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $id = $this->input->get('id');

        $id_calendar = $this->input->get('id_calendar');

        $get_id = $this->Function_model->getDataRow('tbl_cm_job', ['id' => $id]);

        $get_invoice = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $get_id->from_invoice]);

        $service_invoice = $this->Function_model->genInvoice();

        $projects = $get_id->project;

        $cus_name = $get_id->cus_name;

        $cus_tel = $get_id->cus_tel;

        $cus_email = $get_id->cus_email;

        $cus_address = $get_id->cus_address;

        $cus_zipcode = $get_id->cus_zipcode;

        $ves_fleet = $get_id->ves_fleet;

        $ves_name = $get_id->ves_name;

        $ves_type = $get_invoice->ves_type;

        $ves_callsign = $get_invoice->ves_callsign;

        $ves_imo = $get_invoice->ves_imo;

        $ves_mmsi = $get_invoice->ves_mmsi;

        $ves_year = $get_invoice->ves_year;

        $ves_flag = $get_invoice->ves_flag;

        $ves_home_port = $get_invoice->ves_home_port;

        $ves_gross_tonnage = $get_invoice->ves_gross_tonnage;

        $ves_maintenance = 'Corrective Maintenance';

        $ves_survey = 'false';

        $ves_installation = 'false';

        $con_name = $get_invoice->con_name;

        $con_tel = $get_invoice->con_tel;

        $port_name = $get_invoice->port_name;

        $port_province = $get_invoice->port_province;

        $con_email = $get_invoice->con_email;

        $admin_name = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $get_id->from_invoice]);

        $product = $get_id->product;

        $package = $this->Function_model->fetchDataResult('tbl_service_package', ['service_invoice' => $get_id->from_invoice]);

        $remark_create = $get_invoice->remark_create;

        $create_date = $get_id->create_date;

        $due_date = $get_id->due_date;

        $end_date = $get_id->end_date;

        $eta = $get_invoice->ETA;

        $etd = $get_invoice->ETD;

        $contract_start = $get_invoice->contract_start;

        $contract_end = $get_invoice->contract_end;

        $service_status = 'created';

        $user_created = $this->session->userdata('admin_name');

        if (
            $service_invoice == null || $projects == null || $cus_name == null || $cus_tel == null ||  $cus_email == null || $cus_address == null || $cus_zipcode == null ||
            $ves_fleet == null || $ves_name == null || $ves_type == null || $ves_callsign == null || $ves_imo == null || $ves_mmsi == null || $ves_year == null ||
            $ves_flag == null || $ves_home_port == null || $ves_gross_tonnage == null || $ves_maintenance == null || $con_name == null || $con_tel == null || $port_name == null ||
            $port_province == null || $con_email == null || $product == null || $remark_create == null || $create_date == null ||
            $due_date == null || $end_date == null || $eta == null || $etd == null || $contract_start == null || $contract_end == null
        ) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Data Not Found'

            ]);

            exit();
        }

        $cm = $this->Function_model->updateData('tbl_cm_job', ['id' => $id], ['to_invoice' => $service_invoice, 'cm_status' => 'success', 'user_update' => $user_created]);

        $this->Function_model->insertData('tbl_service_link', ['from_invoice' => $get_id->from_invoice, 'to_invoice' => $service_invoice, 'mode_work' => 'Corrective Maintenance']);

        $this->Function_model->updateData('tbl_calendar', ['id' => $id_calendar], ['color' => '#3cb371']);

        $data_arr = [

            'service_invoice' => $service_invoice,

            'project' => $projects,

            'cus_name' => $cus_name,

            'cus_address' => $cus_address,

            'cus_tel' => $cus_tel,

            'cus_email' => $cus_email,

            'cus_zipcode' => $cus_zipcode,

            'ves_fleet' => $ves_fleet,

            'ves_name' => $ves_name,

            'ves_type' => $ves_type,

            'ves_callsign' => $ves_callsign,

            'ves_imo' => $ves_imo,

            'ves_mmsi' => $ves_mmsi,

            'ves_year' => $ves_year,

            'ves_flag' => $ves_flag,

            'ves_home_port' => $ves_home_port,

            'ves_gross_tonnage' => $ves_gross_tonnage,

            'ves_maintenance' => $ves_maintenance,

            'ves_survey' => $ves_survey,

            'ves_installation' => $ves_installation,

            'con_name' => $con_name,

            'con_tel' => $con_tel,

            'con_email' => $con_email,

            'port_name' => $port_name,

            'port_province' => $port_province,

            'remark_create' => $remark_create,

            'create_date' => $create_date,

            'due_date' => $due_date,

            'end_date' => $end_date,

            'ETA' => $eta,

            'ETD' => $etd,

            'contract_start' => $contract_start,

            'contract_end' => $contract_end,

            'service_status' => $service_status,

            'user_created' => $user_created

        ];

        $data = [
            'service_invoice' => $service_invoice,

            'due_date' =>  $due_date,

            'end_date' => $end_date,

            'title' => $service_invoice,

            'descript' => $ves_name,

            'color' => '#ffcca0'
        ];

        $target = "uploads/" . $service_invoice . "/";

        $target_back = "uploads_back/" . $service_invoice . "/";

        $target_atp_back =  "upload_atp_back/" . $service_invoice . "/";

        $target_atp = "upload_atp/" . $service_invoice . "/";

        $target_atp_network = "upload_atp/" . $service_invoice . "/network//";

        $target_atp_A = "upload_atp/" . $service_invoice . "/app_a";

        $target_atp_B = "upload_atp/" . $service_invoice . "/app_b";

        $target_atp_C = "upload_atp/" . $service_invoice . "/app_c";


        mkdir("$target");
        chmod("$target", 0755);

        mkdir("$target_back");
        chmod("$target_back", 0755);

        mkdir("$target_atp_back");
        chmod("$target_atp_back", 0755);

        mkdir("$target_atp");
        chmod("$target_atp", 0755);

        mkdir("$target_atp_network");
        chmod("$target_atp_network", 0755);

        mkdir("$target_atp_A");
        chmod("$target_atp_A", 0755);

        mkdir("$target_atp_B");
        chmod("$target_atp_B", 0755);

        mkdir("$target_atp_C");
        chmod("$target_atp_C", 0755);

        $res = $this->Function_model->insertData('tbl_calendar', $data);

        $res = $this->Function_model->insertData('tbl_service', $data_arr);

        $where_arr = ['service_invoice' => $service_invoice];

        $this->Function_model->insertData('tbl_service_product', ['service_invoice' => $service_invoice, 'product' => $product]);

        foreach ($admin_name as $name) {
            $res = $this->Function_model->insertData('tbl_engineer', ['service_invoice' => $service_invoice, 'engineer' => $name->engineer]);
        }

        foreach ($package as $pack) {
            $this->Function_model->insertData('tbl_service_package', ['service_invoice' => $service_invoice, 'pack_name' => $pack->pack_name, 'pack_internet' => $pack->pack_internet]);
        }

        $engineer = $this->Function_model->fetchDataResult('tbl_engineer', $where_arr);

        $this->Function_model->insertData('tbl_notify', ['service_invoice' => $service_invoice, 'service_status' => 'created']);

        $detail = $this->Function_model->fetchDataResult('tbl_service_detail', ['service_invoice' => $get_id->from_invoice]);

        foreach ($detail as $item) {
            $data_detail = [
                'service_invoice' => $service_invoice,
                'code' => $item->code,
                'service_name' => $item->service_name,
                'serial_number' => $item->serial_number,
                'amount' => $item->amount,
                'service_detail' => $item->service_detail,
                'detail' => $item->detail,
                'user_created' => $this->session->userdata('admin_name')
            ];
            $this->Function_model->insertData('tbl_service_detail', $data_detail);
        }

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'service_invoice' => $service_invoice

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

    function create_service_pms()
    {
        $id = $this->input->get('id');

        $id_calendar = $this->input->get('id_calendar');

        $get_id = $this->Function_model->getDataRow('tbl_pms_job', ['id' => $id]);

        $get_invoice = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $get_id->from_invoice]);

        $service_invoice = $this->Function_model->genInvoice();

        $projects = $get_id->project;

        $cus_name = $get_id->cus_name;

        $cus_tel = $get_id->cus_tel;

        $cus_email = $get_id->cus_email;

        $cus_address = $get_id->cus_address;

        $cus_zipcode = $get_id->cus_zipcode;

        $ves_fleet = $get_id->ves_fleet;

        $ves_name = $get_id->ves_name;

        $ves_type = $get_invoice->ves_type;

        $ves_callsign = $get_invoice->ves_callsign;

        $ves_imo = $get_invoice->ves_imo;

        $ves_mmsi = $get_invoice->ves_mmsi;

        $ves_year = $get_invoice->ves_year;

        $ves_flag = $get_invoice->ves_flag;

        $ves_home_port = $get_invoice->ves_home_port;

        $ves_gross_tonnage = $get_invoice->ves_gross_tonnage;

        $ves_maintenance = 'Preventive Maintenance';

        $ves_survey = 'false';

        $ves_installation = 'false';

        $con_name = $get_invoice->con_name;

        $con_tel = $get_invoice->con_tel;

        $port_name = $get_invoice->port_name;

        $port_province = $get_invoice->port_province;

        $con_email = $get_invoice->con_email;

        $admin_name = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $get_id->from_invoice]);

        $product = $get_id->product;

        $package = $this->Function_model->fetchDataResult('tbl_service_package', ['service_invoice' => $get_id->from_invoice]);

        $remark_create = $get_invoice->remark_create;

        $create_date = $get_id->create_date;

        $due_date = $get_id->due_date;

        $end_date = $get_id->end_date;

        $eta = $get_invoice->ETA;

        $etd = $get_invoice->ETD;

        $contract_start = $get_invoice->contract_start;

        $contract_end = $get_invoice->contract_end;

        $service_status = 'created';

        $user_create = $this->session->userdata('admin_name');

        if (
            $service_invoice == null || $projects == null || $cus_name == null || $cus_tel == null ||  $cus_email == null || $cus_address == null || $cus_zipcode == null ||
            $ves_fleet == null || $ves_name == null || $ves_type == null || $ves_callsign == null || $ves_imo == null || $ves_mmsi == null || $ves_year == null ||
            $ves_flag == null || $ves_home_port == null || $ves_gross_tonnage == null || $ves_maintenance == null || $con_name == null || $con_tel == null || $port_name == null ||
            $port_province == null || $con_email == null || $product == null || $remark_create == null || $create_date == null ||
            $due_date == null || $end_date == null || $eta == null || $etd == null || $contract_start == null || $contract_end == null
        ) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Data Not Found'

            ]);

            exit();
        }

        $pms = $this->Function_model->updateData('tbl_pms_job', ['id' => $id], ['to_invoice' => $service_invoice, 'pms_status' => 'success']);

        $this->Function_model->insertData('tbl_service_link', ['from_invoice' => $get_id->from_invoice, 'to_invoice' => $service_invoice , 'mode_work' => 'Preventive Maintenance']);

        $this->Function_model->updateData('tbl_calendar', ['id' => $id_calendar], ['color' => '#3cb371']);

        $data_arr = [

            'service_invoice' => $service_invoice,

            'project' => $projects,

            'cus_name' => $cus_name,

            'cus_address' => $cus_address,

            'cus_tel' => $cus_tel,

            'cus_email' => $cus_email,

            'cus_zipcode' => $cus_zipcode,

            'ves_fleet' => $ves_fleet,

            'ves_name' => $ves_name,

            'ves_type' => $ves_type,

            'ves_callsign' => $ves_callsign,

            'ves_imo' => $ves_imo,

            'ves_mmsi' => $ves_mmsi,

            'ves_year' => $ves_year,

            'ves_flag' => $ves_flag,

            'ves_home_port' => $ves_home_port,

            'ves_gross_tonnage' => $ves_gross_tonnage,

            'ves_maintenance' => $ves_maintenance,

            'ves_survey' => $ves_survey,

            'ves_installation' => $ves_installation,

            'con_name' => $con_name,

            'con_tel' => $con_tel,

            'con_email' => $con_email,

            'port_name' => $port_name,

            'port_province' => $port_province,

            'remark_create' => $remark_create,

            'create_date' => $create_date,

            'due_date' => $due_date,

            'end_date' => $end_date,

            'ETA' => $eta,

            'ETD' => $etd,

            'contract_start' => $contract_start,

            'contract_end' => $contract_end,

            'service_status' => $service_status,

            'user_created' => $user_create

        ];

        $data = [
            'service_invoice' => $service_invoice,

            'due_date' =>  $due_date,

            'end_date' => $end_date,

            'title' => $service_invoice,

            'descript' => $ves_name,

            'color' => '#ffcca0'
        ];

        $target = "uploads/" . $service_invoice . "/";

        $target_back = "uploads_back/" . $service_invoice . "/";

        $target_atp_back =  "upload_atp_back/" . $service_invoice . "/";

        $target_atp = "upload_atp/" . $service_invoice . "/";

        $target_atp_network = "upload_atp/" . $service_invoice . "/network//";

        $target_atp_A = "upload_atp/" . $service_invoice . "/app_a";

        $target_atp_B = "upload_atp/" . $service_invoice . "/app_b";

        $target_atp_C = "upload_atp/" . $service_invoice . "/app_c";


        mkdir("$target");
        chmod("$target", 0755);

        mkdir("$target_back");
        chmod("$target_back", 0755);

        mkdir("$target_atp_back");
        chmod("$target_atp_back", 0755);

        mkdir("$target_atp");
        chmod("$target_atp", 0755);

        mkdir("$target_atp_network");
        chmod("$target_atp_network", 0755);

        mkdir("$target_atp_A");
        chmod("$target_atp_A", 0755);

        mkdir("$target_atp_B");
        chmod("$target_atp_B", 0755);

        mkdir("$target_atp_C");
        chmod("$target_atp_C", 0755);


        $res = $this->Function_model->insertData('tbl_calendar', $data);

        $res = $this->Function_model->insertData('tbl_service', $data_arr);

        $where_arr = ['service_invoice' => $service_invoice];

        $this->Function_model->insertData('tbl_service_product', ['service_invoice' => $service_invoice, 'product' => $product]);

        $this->Function_model->updateData('tbl_service', $where_arr, ['pms' => '1']);

        if ($product == 'CCTV') {
            $this->Function_model->updateData('tbl_service', $where_arr, ['cctv' => '1']);
        } else if ($product == 'KU BAND IO3') {
            $this->Function_model->updateData('tbl_service', $where_arr, ['vsat' => '1']);
        } else if ($product == 'TVRO') {
            $this->Function_model->updateData('tbl_service', $where_arr, ['tvro' => '1']);
        } else if ($product == 'VOIP') {
            $this->Function_model->updateData('tbl_service', $where_arr, ['voip' => '1']);
        }

        foreach ($admin_name as $name) {
            $res = $this->Function_model->insertData('tbl_engineer', ['service_invoice' => $service_invoice, 'engineer' => $name->engineer]);
        }

        foreach ($package as $pack) {
            $this->Function_model->insertData('tbl_service_package', ['service_invoice' => $service_invoice, 'pack_name' => $pack->pack_name, 'pack_internet' => $pack->pack_internet]);
        }

        $engineer = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $service_invoice]);

        $this->Function_model->insertData('tbl_notify', ['service_invoice' => $service_invoice, 'service_status' => 'created']);

        $detail = $this->Function_model->fetchDataResult('tbl_service_detail', ['service_invoice' => $get_id->from_invoice]);

        foreach ($detail as $item) {
            $data_detail = [
                'service_invoice' => $service_invoice,
                'code' => $item->code,
                'service_name' => $item->service_name,
                'serial_number' => $item->serial_number,
                'amount' => $item->amount,
                'service_detail' => $item->service_detail,
                'detail' => $item->detail,
                'user_created' => $this->session->userdata('admin_name')
            ];
            $this->Function_model->insertData('tbl_service_detail', $data_detail);
        }

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'service_invoice' => $service_invoice

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

    function del_pms()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $id_pms = $this->input->get('id');

        $id_calendar = $this->input->get('id_calendar');

        if ($id_pms == null) {
            echo json_encode([
                'status' => 'ERROR',
                'message' => 'WRONG DATA TO DELETE'
            ]);
            exit();
        }

        $where_pms = [
            'id' => $id_pms
        ];

        $where_calendar = [
            'id' => $id_calendar
        ];

        $this->Function_model->deleteData('tbl_pms_job', $where_pms);

        $res = $this->Function_model->deleteData('tbl_calendar', $where_calendar);

        if ($res == true) {
            echo json_encode([
                'status' => 'SUCCESS',
                'message' => 'Delete PMS Success'
            ]);
            exit();
        } else {
            echo json_encode([
                'status' => 'ERROR',
                'message' => 'Delete PMS Fail!'
            ]);
            exit();
        }
    }

    function del_cm()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $id_cm = $this->input->get('id');

        $id_calendar = $this->input->get('id_calendar');

        if ($id_cm == null) {
            echo json_encode([
                'status' => 'ERROR',
                'message' => 'WRONG DATA TO DELETE'
            ]);
            exit();
        }

        $where_cm = [
            'id' => $id_cm
        ];

        $cm = $this->Function_model->getDataRow('tbl_cm_job', $where_cm);

        $where_calendar = [
            'id' => $id_calendar
        ];

        $this->Function_model->deleteData('tbl_cm_job', $where_cm);

        $res = $this->Function_model->deleteData('tbl_calendar', $where_calendar);

        if ($res == true) {
            echo json_encode([
                'status' => 'SUCCESS',
                'message' => 'Delete PMS Success'
            ]);
            exit();
        } else {
            echo json_encode([
                'status' => 'ERROR',
                'message' => 'Delete PMS Fail!'
            ]);
            exit();
        }
    }
}

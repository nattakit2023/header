<?php

defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

class Service extends CI_Controller

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

    //del_file

    function del_file()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $filename = $this->input->post('filename');

        $check = $this->input->post('check');

        if ($check == 'created') {
            $res = $this->Function_model->deleteData('tbl_uploads', ['uploads_name' => $filename, 'service_invoice' => $service_invoice]);

            $filePath = "uploads/" . $service_invoice . "/" . $filename;
        }
        if ($check == 'fixed') {
            $res = $this->Function_model->deleteData('tbl_uploads_back', ['uploads_name' => $filename, 'service_invoice' => $service_invoice]);

            $filePath = "uploads_back/" . $service_invoice . "/" . $filename;
        }




        if ($res == TRUE) {

            unlink($filePath);

            echo json_encode([

                'status' => 'SUCCESS',

                'service_invoice' => $service_invoice

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'This File Uploaded'

            ]);

            exit();
        }
    }

    //upload_atp_back

    function upload_atp_back()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $files = $_FILES['files'];

        foreach ($files['name'] as $index => $name) {
            $filename = $name;
            $fileTmp = $files['tmp_name'][$index];
            $filePath = "upload_atp_back/" . $service_invoice . "/" . $name;

            $check = $this->Function_model->fetchDataResult('tbl_atp_upload_back', ['uploads_name' => $filename]);

            if (count($check) > 0) {
                $data = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'uploads_tmp' => $fileTmp
                ];
                $where = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                ];

                $res = $this->Function_model->updateData('tbl_atp_upload_back', $where, $data);
            } else {
                move_uploaded_file($fileTmp, $filePath);

                $res = $this->Function_model->insertData('tbl_atp_upload_back', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'uploads_tmp' => $fileTmp]);
            }
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

                'message' => 'This File Uploaded'

            ]);

            exit();
        }
    }
    //uploads

    function uploads()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $files = $_FILES['files'];

        foreach ($files['name'] as $index => $name) {
            $filename = $name;
            $fileTmp = $files['tmp_name'][$index];
            $filePath = "uploads/" . $service_invoice . "/" . $name;

            $check = $this->Function_model->fetchDataResult('tbl_uploads', ['uploads_name' => $filename]);

            if (count($check) > 0) {
                $data = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'uploads_tmp' => $fileTmp
                ];
                $where = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                ];

                $res = $this->Function_model->updateData('tbl_uploads', $where, $data);
            } else {
                move_uploaded_file($fileTmp, $filePath);

                $res = $this->Function_model->insertData('tbl_uploads', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'uploads_tmp' => $fileTmp]);
            }
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

                'message' => 'This File Uploaded'

            ]);

            exit();
        }
    }

    //uploads back

    function uploads_back()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $files = $_FILES['files'];

        foreach ($files['name'] as $index => $name) {
            $filename = $name;
            $fileTmp = $files['tmp_name'][$index];
            $filePath = "uploads_back/" . $service_invoice . "/" . $name;

            $check = $this->Function_model->fetchDataResult('tbl_uploads_back', ['service_invoice' => $service_invoice, 'uploads_name' => $filename]);

            if (count($check) > 0) {
                $data = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'uploads_tmp' => $fileTmp
                ];
                $where = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                ];

                $res = $this->Function_model->updateData('tbl_uploads_back', $where, $data);
            } else {
                move_uploaded_file($fileTmp, $filePath);

                $res = $this->Function_model->insertData('tbl_uploads_back', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'uploads_tmp' => $fileTmp]);
            }
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

                'message' => 'This File Uploaded'

            ]);

            exit();
        }
    }

    //getService

    function get_service()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit;
        }

        $res = $this->Function_model->fetchDataResult('tbl_service', '', 'id', 'asc');

        if ($res == true) {

            echo json_encode([
                'status' => 'SUCCESS',
                'data' => []
            ]);
        }
    }

    //tblService

    function tblService()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $datestart = $this->input->post('datestart');

        $dateend = $this->input->post('dateend');

        $service_status = $this->input->post('status');

        $admin_name = $this->input->post('admin_name');

        if ($datestart == null || $dateend == null) {

            $datestart = date('Y-m-d');

            $dateend = date('Y-m-d');
        }

        $where_arr = array(

            'due_date >=' => $datestart,

            'due_date <=' => $dateend

        );

        if ($service_status != null) {

            $where_arr = [

                'service_status' => $service_status

            ];

            $data['service'] = $this->Function_model->fetchDataResult('tbl_service', $where_arr, 'service_invoice', 'ASC');
        } else {
            $data['service'] = $this->Function_model->fetchDataResult('tbl_service', ['service_status !=' => ''], 'service_invoice', 'ASC');
        }

        $data['admin'] = $this->Function_model->fetchDataResult('tbl_admin', ['admin_name' => $admin_name], 'admin_id', 'ASC');

        $data['history'] = $this->Function_model->fetchDataResult('tbl_history', '', 'id', 'ASC');

        $this->load->view('components/tbl_service', $data);
    }

    //อัพเดทรายการซ่อม

    function update_service()
    {


        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $service = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service_invoice]);

        $projects = $this->input->post('projects');

        $cus_name = $this->input->post('cus_name');

        $cus_tel = $this->input->post('cus_tel');

        $cus_email = $this->input->post('cus_email');

        $cus_address = $this->input->post('cus_address');

        $cus_zipcode = $this->input->post('cus_zipcode');

        $ves_fleet = $this->input->post('ves_fleet');

        $ves_name = $this->input->post('ves_name');

        $ves_type = $this->input->post('ves_type');

        $ves_callsign = $this->input->post('ves_callsign');

        $ves_imo = $this->input->post('ves_imo');

        $ves_mmsi = $this->input->post('ves_mmsi');

        $ves_year = $this->input->post('ves_year');

        $ves_maintenance = $this->input->post('ves_maintenance');

        $ves_survey = $this->input->post('ves_survey');

        $ves_installation = $this->input->post('ves_installation');

        $con_name = $this->input->post('con_name');

        $con_tel = $this->input->post('con_tel');

        $con_email = $this->input->post('con_email');

        $port_name = $this->input->post('port_name');

        $port_province = $this->input->post('port_province');

        $admin_name = $this->input->post('admin_name');

        $product = $this->input->post('product');

        $pack_name = $this->input->post('pack_name');

        $pack_internet = $this->input->post('pack_internet');

        $remark_create = $this->input->post('remark_create');

        $create_date = $this->input->post('create_date');

        $due_date = $this->input->post('due_date');

        $end_date = $this->input->post('end_date');

        $eta = $this->input->post('eta');

        $etd = $this->input->post('etd');

        $contract_start = $this->input->post('contract_start');

        $contract_end = $this->input->post('contract_end');

        if ($service_invoice == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        if ($ves_survey == null && $ves_installation == null) {
            $ves_survey = '';
            $ves_installation = '';
        } elseif ($ves_survey == null) {
            $ves_survey = '';
        } elseif ($ves_installation == null) {
            $ves_installation = '';
        }

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

            'user_update' => $this->session->userdata('admin_name')

        ];

        $data = [
            'service_invoice' => $service_invoice,

            'due_date' =>  $due_date,

            'end_date' => $end_date,

            'title' => $service_invoice,

            'descript' => $ves_name,

        ];

        $where = [
            'service_invoice' => $service_invoice,
        ];

        //service

        $res = $this->Function_model->updateData('tbl_calendar', $where, $data);

        $res = $this->Function_model->updateData('tbl_service', $where, $data_arr);

        $pms = $this->Function_model->getDataRow('tbl_pms_job', ['to_invoice' => $service_invoice]);

        if ($pms != NULL) {
            switch ($pms->product) {
                case 'cctv':
                    $this->Function_model->updateData('tbl_service', $where, ['cctv' => 1]);
                    break;
                case 'KU Band IO3' || 'KU Band Thaicom' || 'KA Band IO3' || 'KA Band Thaicom':
                    $this->Function_model->updateData('tbl_service', $where, ['vsat' => 1]);
                    break;
                case 'voip':
                    $this->Function_model->updateData('tbl_service', $where, ['voip' => 1]);
                    break;
                case 'tvro':
                    $this->Function_model->updateData('tbl_service', $where, ['tvro' => 1]);
                    break;
            }
        }


        //product

        $res = $this->Function_model->deleteData('tbl_service_product', $where);

        foreach ($product as $name) {

            $res = $this->Function_model->insertData('tbl_service_product', ['service_invoice' => $service_invoice, 'product' => $name]);
        }

        //package

        $res = $this->Function_model->deleteData('tbl_service_package', $where);
        if ($pack_name != null && $pack_internet != null) {
            foreach ($pack_name as $item1) {
                foreach ($pack_internet as $item2) {

                    $check = $this->Function_model->getDataRow('tbl_package', ['pack_name' => $item1, 'pack_internet' => $item2]);

                    if ($check != null) {
                        $res = $this->Function_model->insertData('tbl_service_package', ['service_invoice' => $service_invoice, 'pack_name' => $item1, 'pack_internet' => $item2]);
                    }
                }
            }
        }

        //engineer

        $res = $this->Function_model->deleteData('tbl_engineer', $where);


        foreach ($admin_name as $item) {
            $res = $this->Function_model->insertData('tbl_engineer', ['service_invoice' => $service_invoice, 'engineer' => $item]);
        }

        $engineer = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $service_invoice]);

        if ($res == TRUE) {

            $this->Function_model->notify_email($service_invoice, $engineer, 'มีการแก้ไขข้อมูล ');

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

    //สร้างรายการซ่อม

    function create_service()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }


        $service_invoice = $this->Function_model->genInvoice();

        $projects = $this->input->post('projects');

        $cus_name = $this->input->post('cus_name');

        $cus_tel = $this->input->post('cus_tel');

        $cus_email = $this->input->post('cus_email');

        $cus_address = $this->input->post('cus_address');

        $cus_zipcode = $this->input->post('cus_zipcode');

        $ves_fleet = $this->input->post('ves_fleet');

        $ves_name = $this->input->post('ves_name');

        $ves_type = $this->input->post('ves_type');

        $ves_callsign = $this->input->post('ves_callsign');

        $ves_imo = $this->input->post('ves_imo');

        $ves_mmsi = $this->input->post('ves_mmsi');

        $ves_year = $this->input->post('ves_year');

        $ves_flag = $this->input->post('ves_flag');

        $ves_home_port = $this->input->post('ves_home_port');

        $ves_gross_tonnage = $this->input->post('ves_gross_tonnage');

        $ves_maintenance = $this->input->post('ves_maintenance');

        $ves_survey = $this->input->post('ves_survey');

        $ves_installation = $this->input->post('ves_installation');

        $con_name = $this->input->post('con_name');

        $con_tel = $this->input->post('con_tel');

        $port_name = $this->input->post('port_name');

        $port_province = $this->input->post('port_province');

        $con_email = $this->input->post('con_email');

        $admin_name = $this->input->post('admin_name');

        $product = $this->input->post('product');

        $pack_name = $this->input->post('pack_name');

        $pack_internet = $this->input->post('pack_internet');

        $remark_create = $this->input->post('remark_create');

        $create_date = $this->input->post('create_date');

        $due_date = $this->input->post('due_date');

        $end_date = $this->input->post('end_date');

        $eta = $this->input->post('eta');

        $etd = $this->input->post('etd');

        $contract_start = $this->input->post('contract_start');

        $contract_end = $this->input->post('contract_end');

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

                'message' => 'No data input'

            ]);

            exit();
        }

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

        foreach ($product as $name) {
            $res = $this->Function_model->insertData('tbl_service_product', ['service_invoice' => $service_invoice, 'product' => $name]);
        }

        foreach ($admin_name as $name) {
            $res = $this->Function_model->insertData('tbl_engineer', ['service_invoice' => $service_invoice, 'engineer' => $name]);
        }

        if ($pack_name != null && $pack_internet != null) {
            foreach ($pack_name as $item1) {
                foreach ($pack_internet as $item2) {

                    $check = $this->Function_model->getDataRow('tbl_package', ['pack_name' => $item1, 'pack_internet' => $item2]);

                    if ($check != null) {
                        $res = $this->Function_model->insertData('tbl_service_package', ['service_invoice' => $service_invoice, 'pack_name' => $item1, 'pack_internet' => $item2]);
                    }
                }
            }
        }

        $engineer = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $service_invoice]);



        $this->Function_model->insertData('tbl_notify', ['service_invoice' => $service_invoice, 'service_status' => 'created', 'create_date' => date('Y-m-d H:i:s')]);

        if ($res == TRUE) {

            $this->Function_model->notify_line($service_invoice, $engineer, 'กรุณาเพิ่มEquipment');

            $this->Function_model->notify_email($service_invoice, $engineer, 'กรุณาเพิ่มEquipment');

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

    //ตารางรายการสินค้าและบริการ

    function tbl_service_detail()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        if ($service_invoice == null) {

            show_404();

            exit();
        }

        $data['service_detail'] = $this->Function_model->fetchDataResult('tbl_service_detail', ['service_invoice' => $service_invoice]);

        $data['service'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service_invoice]);

        $this->load->view('components/tbl_service_detail', $data);
    }

    //อัพเดท รีมาร์ค

    function updateRemarkAdd()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $remark_add = $this->input->post('remark_add');

        if ($service_invoice == null || $remark_add == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }


        $res = $this->Function_model->updateData('tbl_service', ['service_invoice' => $service_invoice], ['remark_add' => $remark_add]);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'เพิ่มรายการสินค้าและบริการเรียบร้อยแล้ว'

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'มีบางอย่างผิดพลาด กรุณาทำรายการใหม่อีกครั้ง'

            ]);
        }
    }

    //เพิ่มสินค้าและบริการ

    function add_service_detail()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $service_name = $this->input->post('service_name');

        $amount = $this->input->post('amount');

        $detail = $this->input->post('detail');

        $service = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service_invoice]);

        $service_detail = $this->Function_model2->getDataRow('sma_products', ['code' => $service_name]);


        if ($service_invoice == null || $service_name == null || $amount == null || $service_detail == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        if ($service == null) {

            show_404();

            exit();
        }

        $data_arr = [

            'service_invoice' => $service_invoice,

            'code' => $service_detail->code,

            'service_name' => $service_detail->name,

            'amount' => $amount,

            'service_detail' => $service_detail->details,

            'detail' => $detail,

            'user_created' => $this->session->userdata('admin_name')
        ];

        //insert to tbl_service_detail

        $res_detail = $this->Function_model->insertData('tbl_service_detail', $data_arr);

        if ($res_detail != TRUE) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Have someting wrong when insert service_detail'

            ]);

            exit();
        }


        if ($res_detail == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'เพิ่มรายการสินค้าและบริการเรียบร้อยแล้ว'

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'มีบางอย่างผิดพลาด กรุณาทำรายการใหม่อีกครั้ง'

            ]);
        }
    }

    //ลบสินค้าและบริการ

    function del_service_detail()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $id = $this->input->post('detail_id');

        $service = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service_invoice]);

        if ($id == null || $service_invoice == null) {

            show_404();

            exit();
        }

        if ($service->service_status == 'done' || $service->service_status == 'fixed') {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่สามารถลบได้ เนื่องจากซ่อมเสร็จแล้ว หรือรับรถไปแล้ว'

            ]);

            exit();
        }

        $where_arr = [

            'service_invoice' => $service_invoice,

            'id' => $id

        ];

        $res_del = $this->Function_model->deleteData('tbl_service_detail', $where_arr);

        if ($res_del != TRUE) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Cannot Delete This Service Detail'

            ]);

            exit();
        }

        if ($res_del == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'ลบสินค้าและบริการเรียบร้อยแล้ว'

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'มีบางอย่างผิดพลาดกรุณาทำรายการใหม่อีกครั้ง'

            ]);

            exit();
        }
    }

    // Option history

    function option_history()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }
        echo '<option value="" disabled selected>เลือกหัวข้อ</option>';
        echo '<option value="Add Service Order" >Add Service Order</option>';
        echo '<option value="Edit Customer" >Edit Customer</option>';
    }

    //Order ไม่ครบ

    function Back_Order()
    {


        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $service_invoice = $this->input->post('invoice');

        $his_name = $this->input->post('his_name');

        $descript = $this->input->post('descript');

        if ($service_invoice == null || $his_name == null || $descript == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        $where_arr = [

            'service_invoice' => $service_invoice

        ];

        $res_his = count($this->Function_model->fetchDataResult('tbl_history', $where_arr, 'id', 'ASC'));

        $data = [

            'service_invoice' => $service_invoice,

            'admin_name' => $this->session->userdata('admin_name'),

            'his_name' => $his_name,

            'descript' => $descript

        ];

        $data_arr = [

            'service_status' => 'created',
            'his_count' => $res_his + 1

        ];

        $res = $this->Function_model->updateData('tbl_calendar', $where_arr, ['color' => '#ffcca0']);

        $res = $this->Function_model->updateData('tbl_service', $where_arr, $data_arr);

        $res = $this->Function_model->insertData('tbl_history', $data);

        $engineer = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $service_invoice]);

        if ($res == TRUE) {

            if ($his_name == 'Edit Customer') {
                $this->Function_model->notify_line($service_invoice, 'Edit', 'มีการตีกลับข้อมูลเพื่อแก้ไข กรุณาตรวจสอบ');
                $this->Function_model->notify_email($service_invoice, 'Edit', 'มีการตีกลับข้อมูลเพื่อแก้ไข กรุณาตรวจสอบ');
            } else {
                $this->Function_model->notify_line($service_invoice, $engineer, 'มีการตีกลับข้อมูลเพื่อแก้ไข กรุณาตรวจสอบ');
                $this->Function_model->notify_email($service_invoice, $engineer, 'มีการตีกลับข้อมูลเพื่อแก้ไข กรุณาตรวจสอบ');
            }



            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'ยืนยันการส่งซ่อมเรียบร้อยแล้ว'

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ยืนยันไม่สำเร็จ กรุณาทำรายการใหม่อีกครั้ง'

            ]);

            exit();
        }
    }

    //Change Status

    function change_status()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        if ($service_invoice == null) {
            echo json_encode([
                'status' => 'ERROR',
                'message' => 'Invoice Not Found'
            ]);
        }

        $where_invoice = [
            'service_invoice' => $service_invoice
        ];

        $service = $this->Function_model->getDataRow('tbl_service', $where_invoice);

        $engineer = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $service_invoice]);

        $admin_name = $this->session->userdata('admin_name');

        $data_service = $data_notify = $subject = $data_calendar = $data_eqp = '';

        if ($service->service_status == 'created') { // Save
            $data_service = [
                'service_status' => 'verify',
                'user_update' => $admin_name
            ];
            $data_notify = [
                'service_status' => 'verify',
                'user_save' => $admin_name,
                'save_date' => date('Y-m-d H:i:s')
            ];
            if ($service->ves_maintenance == 'Uninstall') {
                $subject = 'ตรวจสอบข้อมูลการรื้อถอน';
            } else {
                $subject = 'ตรวจสอบข้อมูลการติดตั้ง';
            }
        } else if ($service->service_status == 'verify') {  // Verify
            $data_service = [
                'service_status' => 'approve',
                'user_update' => $admin_name
            ];
            $data_notify = [
                'service_status' => 'approve',
                'user_verify' => $admin_name,
                'verify_date' => date('Y-m-d H:i:s')
            ];
            if ($service->ves_maintenance == 'Uninstall') {
                $subject = 'รออนุญาติเพื่อทำการรื้อถอน';
            } else if ($service->ves_installation == 'true') {
                $subject = 'รออนุญาติเพื่อทำการติดตั้ง';
            } else {
                $subject = 'รออนุญาติเพื่อทำการซ่อมบำรุง';
            }
        } else if ($service->service_status == 'approve') { // Approve
            $data_service = [
                'service_status' => 'wait',
                'approve_date' => date('Y-m-d H:i:s'),
                'user_update' => $admin_name
            ];
            $data_notify = [
                'service_status' => 'wait',
                'user_approve' => $admin_name,
                'approve_date' => date('Y-m-d H:i:s')
            ];
            $data_calendar = [
                'color' => '#ffa500'  // danger #ff0000 , warning #ffa500 , success #3cb371 , created #ffcca0
            ];
            if ($service->ves_maintenance == 'Uninstall') {
                $subject = 'กำลังทำการรื้อระบบ';
            } else {
                $subject = 'กำลังทำการติดตั้งระบบ';
            }
        } else if ($service->service_status == 'wait') { // Wait
            $data_service = [
                'service_status' => 'fixed',
                'user_update' => $admin_name
            ];
            $data_notify = [
                'service_status' => 'fixed',
                'user_inprogress' => $admin_name,
                'inprogress_date' => date('Y-m-d H:i:s')
            ];
            $data_calendar = [
                'color' => '#3cb371' // danger #ff0000 , warning #ffa500 , success #3cb371 , created #ffcca0
            ];
            $data_eqp = [
                'fleet' => $service->ves_fleet,
                'vessel' => $service->ves_name,
                'type' => $service->ves_type,
                'installation_date' => $service->due_date,
                'complete_date' => $service->end_date,
            ];
            if ($service->ves_maintenance == 'Uninstall') {
                $subject = 'ทำการรื้อถอนระบบเรียบร้อย';
            } else {
                $subject = 'ทำการติดตั้งระบบเรียบร้อย';
            }
        } else if ($service->service_status == 'fixed') { // Fixed
            $data_service = [
                'service_status' => ''
            ];
            $data_notify = [
                'service_status' => '',
                'user_complete' => $admin_name,
                'complete_date' => date('Y-m-d H:i:s')
            ];
            $data_calendar = [
                'color' => '#ff0000' // danger #ff0000 , warning #ffa500 , success #3cb371 , created #ffcca0
            ];
            if ($service->ves_installation == 'true') {
                $package = $this->Function_model->fetchDataResult('tbl_service_package', $where_invoice);
                $product = $this->Function_model->fetchDataResult('tbl_service_product', $where_invoice);
                $service->service_invoice = $this->Function_model->genInvoice();
                foreach ($engineer as $item) {
                    $item->id = '';
                    $item->service_invoice = $service->service_invoice;
                    $this->Function_model->insertData('tbl_engineer', $item);
                }
                foreach ($package as $item) {
                    $item->id = '';
                    $item->service_invoice = $service->service_invoice;
                    $this->Function_model->insertData('tbl_service_package', $item);
                }
                foreach ($product as $item) {
                    $item->id = '';
                    $item->service_invoice = $service->service_invoice;
                    $this->Function_model->insertData('tbl_service_product', $item);
                }
                $data_new_calendar = [
                    'service_invoice' => $service->service_invoice,
                    'due_date' => $service->due_date,
                    'end_date' => $service->end_date,
                    'title' => $service->service_invoice,
                    'descript' => $service->ves_name,
                    'color' => '#ffcca0'
                ];
                $data_new_notify = [
                    'service_invoice' => $service->service_invoice,
                    'service_status' => 'created',
                    'user_created' => $admin_name,
                    'create_date' => date('Y-m-d H:i:s')
                ];
                $this->Function_model->insertData('tbl_service', $service);
                $this->Function_model->insertData('tbl_calendar', $data_new_calendar);
                $this->Function_model->insertData('tbl_notify', $data_new_notify);
                $data_new_service = [
                    'his_count' => 0,
                    'service_status' => 'verify',
                    'user_created' => $admin_name,
                    'ves_maintenance' => 'Uninstall',
                    'ves_installation' => 'false',
                    'ves_survey' => 'false'
                ];
                $this->Function_model->updateData('tbl_service', ['service_invoice' => $service->service_invoice], $data_new_service);
                $this->Function_model->insertData('tbl_service_link', ['from_invoice' => $service_invoice, 'to_invoice' => $service->service_invoice, 'mode_work' => 'Uninstall']);

                $subject = 'ตรวจสอบข้อมูลการรื้อถอน';
            } else {
                if ($service->ves_maintenance == 'Uninstall') {
                    $subject = 'ปิดงานรื้อถอนระบบบนเรือ';
                } else if ($service->ves_survey == 'true') {
                    $subject = 'ปิดงานสำรวจพื้นที่เรือ';
                } else {
                    $subject = 'ปิดงานซ่อมบำรุงระบบบนเรือ';
                }
            }
        }
        if ($data_eqp != null) {
            $product = $this->Function_model->fetchDataResult('tbl_service_product', ['service_invoice' => $service_invoice]);
            foreach ($product as $index) {
                if (strtoupper($index->product) == strtoupper('voip')) {
                    $data_eqp .= ['voip' => 'Yes'];
                } else if (strtoupper($index->product) == strtoupper('cctv')) {
                    $data_eqp .= ['cctv' => date('Y-m-d')];
                } else if (strtoupper($index->product) == strtoupper('tvro')) {
                    $data_eqp .= ['tvro' => 'Yes'];
                }
            }
            if ($service->ves_installation == 'true') {
                $data_eqp .= ['status' => 'On Service'];
                $res = $this->Function_model->insertData('old_equipment', $data_eqp);
            } else if ($service->ves_maintenance == 'Uninstall') {
                $data_eqp .= ['status' => 'Off Service'];
                $link = $this->Function_model->getDataRow('tbl_service_link', ['to_invoice' => $service->service_invoice]);
                $res = $this->Function_model->updateData('old_equipment', ['service_invoice' => $link->from_invoice], $data_eqp);
            }
        }
        if ($data_service != null) {
            $res = $this->Function_model->updateData('tbl_service', $where_invoice, $data_service);
        }
        if ($data_notify != null) {
            $res = $this->Function_model->updateData('tbl_notify', $where_invoice, $data_notify);
        }
        if ($data_calendar != null) {
            $res = $this->Function_model->updateData('tbl_calendar', $where_invoice, $data_calendar);
        }
        if ($service_invoice == $service->service_invoice) {
            $res = $this->Function_model->getDataRow('tbl_service', $where_invoice);
        } else {
            $res = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service->service_invoice]);
        }

        if ($res == true) {

            if ($service_invoice == $service->service_invoice) {
                $this->Function_model->notify_line($service_invoice, $engineer, $subject);

                $this->Function_model->notify_email($service_invoice, $engineer, $subject);
            } else {
                $this->Function_model->notify_line($service->service_invoice, $engineer, $subject);

                $this->Function_model->notify_email($service->service_invoice, $engineer, $subject);
            }



            echo json_encode([
                'status' => 'SUCCESS',
                'message' => 'Save Data Success',
                'invoice' => $res->service_invoice
            ]);
        } else {
            echo json_encode([
                'status' => 'SUCCESS',
                'message' => 'Can\'t Save Data'
            ]);
        }
    }

    //Delete Service

    function cancel_service()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $service = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service_invoice]);

        if ($service_invoice == null || $service == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No Data Input'

            ]);

            exit();
        }

        //ตรวจสอบในตาราง tbl_atp_upload ถ้ามีให้ทำการลบข้อมูล

        $uploads_atp = $this->Function_model->fetchDataResult('tbl_atp_upload', ['service_invoice' => $service_invoice]);


        if ($uploads_atp != null || $service_invoice != null) {

            //ลบไฟล์ 

            foreach ($uploads_atp as $index) {
                if ($index->page == 'page4') {
                    unlink('upload_atp/' . $service_invoice . '/network//' . $index->uploads_name);
                } elseif ($index->page == 'page10') {
                    unlink('upload_atp/' . $service_invoice . '/app_a//' . $index->uploads_name);
                } elseif ($index->page == 'page11') {
                    unlink('upload_atp/' . $service_invoice . '/app_b//' . $index->uploads_name);
                } else {
                    unlink('upload_atp/' . $service_invoice . '/app_c//' . $index->uploads_name);
                }
            }

            rmdir('upload_atp/' . $service_invoice . '/network');
            rmdir('upload_atp/' . $service_invoice . '/app_a');
            rmdir('upload_atp/' . $service_invoice . '/app_b');
            rmdir('upload_atp/' . $service_invoice . '/app_c');
            //ลบโฟล์เดอร์ไฟล์

            rmdir('upload_atp/' . $service_invoice);

            $this->Function_model->deleteData('tbl_atp_upload', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_atp_detail ถ้ามีให้ทำการลบข้อมูล

        $atp_detail = $this->Function_model->fetchDataResult('tbl_atp_detail',  ['service_invoice' => $service_invoice]);

        if ($atp_detail != NULL || $service_invoice != null) {

            $this->Function_model->deleteData('tbl_atp_detail', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_atp_history ถ้ามีให้ทำการลบข้อมูล

        $atp_history = $this->Function_model->fetchDataResult('tbl_atp_history',  ['service_invoice' => $service_invoice]);

        if ($atp_history != NULL || $service_invoice != null) {

            $this->Function_model->deleteData('tbl_atp_history', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_atp_upload_back ถ้ามีให้ทำการลบข้อมูล

        $uploads = $this->Function_model->fetchDataResult('tbl_atp_upload_back', ['service_invoice' => $service_invoice]);


        if ($uploads != null || $service_invoice != null) {

            //ลบไฟล์ 

            foreach ($uploads as $index) {
                unlink('upload_atp_back/' . $service_invoice . '/' . $index->uploads_name);
            }

            //ลบโฟล์เดอร์ไฟล์

            rmdir('upload_atp_back/' . $service_invoice);

            $this->Function_model->deleteData('tbl_atp_upload_back', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_uploads ถ้ามีให้ทำการลบข้อมูล

        $uploads = $this->Function_model->fetchDataResult('tbl_uploads', ['service_invoice' => $service_invoice]);


        if ($uploads != null || $service_invoice != null) {

            //ลบไฟล์ 

            foreach ($uploads as $index) {
                unlink('uploads/' . $service_invoice . '/' . $index->uploads_name);
            }

            //ลบโฟล์เดอร์ไฟล์

            rmdir('uploads/' . $service_invoice);

            $this->Function_model->deleteData('tbl_uploads', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_uploads_back ถ้ามีให้ทำการลบข้อมูล

        $uploads = $this->Function_model->fetchDataResult('tbl_uploads_back', ['service_invoice' => $service_invoice]);


        if ($uploads != null || $service_invoice != null) {

            //ลบไฟล์ 

            foreach ($uploads as $index) {
                unlink('uploads_back/' . $service_invoice . '/' . $index->uploads_name);
            }

            //ลบโฟล์เดอร์ไฟล์

            rmdir('uploads_back/' . $service_invoice);

            $this->Function_model->deleteData('tbl_uploads_back', ['service_invoice' => $service_invoice]);
        }

        $this->Function_model->deleteData('tbl_calendar', ['service_invoice' => $service_invoice]);

        //ตรวจสอบในตาราง tbl_service_detail ถ้ามีให้ทำการลบข้อมูล

        $service_detail = $this->Function_model->fetchDataResult('tbl_service_detail', ['service_invoice' => $service_invoice]);

        if ($service_detail != null) {

            $this->Function_model->deleteData('tbl_service_detail', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_notify ถ้ามีให้ทำการลบข้อมูล

        $notify = $this->Function_model->fetchDataResult('tbl_notify', ['service_invoice' => $service_invoice]);

        if ($notify != null) {

            $this->Function_model->deleteData('tbl_notify', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_service_product ถ้ามีให้ทำการลบข้อมูล

        $product = $this->Function_model->fetchDataResult('tbl_service_product', ['service_invoice' => $service_invoice]);

        if ($product != null) {

            $this->Function_model->deleteData('tbl_service_product', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_service_project ถ้ามีให้ทำการลบข้อมูล

        $projects = $this->Function_model->fetchDataResult('tbl_service_project', ['service_invoice' => $service_invoice]);

        if ($projects != null) {

            $this->Function_model->deleteData('tbl_service_project', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_service_package ถ้ามีให้ทำการลบข้อมูล

        $package = $this->Function_model->fetchDataResult('tbl_service_package', ['service_invoice' => $service_invoice]);

        if ($package != null) {

            $this->Function_model->deleteData('tbl_service_package', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_vessel_name ถ้ามีให้ทำการลบข้อมูล

        $ves_name = $this->Function_model->fetchDataResult('tbl_vessel_name', ['service_invoice' => $service_invoice]);

        if ($ves_name != null) {

            $this->Function_model->deleteData('tbl_vessel_name', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_engineer ถ้ามีให้ทำการลบข้อมูล

        $engineer = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $service_invoice]);

        if ($engineer != null) {

            $this->Function_model->deleteData('tbl_engineer', ['service_invoice' => $service_invoice]);
        }

        //ตรวจสอบในตาราง tbl_history ถ้ามีให้ทำการลบข้อมูล

        $history = $this->Function_model->fetchDataResult('tbl_history', ['service_invoice' => $service_invoice]);

        if ($history != null) {

            $this->Function_model->deleteData('tbl_history', ['service_invoice' => $service_invoice]);
        }

        //ลบ tbl_service

        $res = $this->Function_model->deleteData('tbl_service', ['service_invoice' => $service_invoice]);

        if ($res == TRUE) {

            $this->Function_model->notify_line($service_invoice, $engineer, 'ถูกลบออกจากระบบ');

            $this->Function_model->notify_email($service_invoice, $engineer, 'ถูกลบออกจากระบบ');

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'ลบเรียบร้อยแล้ว'

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'มีบางอย่างผิพลาด กรุณาทำรายการใหม่อีกครั้ง'

            ]);

            exit();
        }
    }

    //ค้นหาใบส่งซ่อม

    function search_service_invoice()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        if ($service_invoice == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No Data Input'

            ]);
            exit();
        }

        $res = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service_invoice]);

        if ($res != null) {

            echo json_encode([

                'status' => 'SUCCESS',

                'service_invoice' => $res->service_invoice

            ]);
            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่พบหมายเลขใบสั่งซื้อ'

            ]);
            exit();
        }
    }

    // Get Amount for Dashboard

    function get_service_amount()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        echo json_encode([
            'status' => 'SUCCESS',
            'amount_all_service' => count($this->Function_model->fetchDataResult('tbl_service')),
            'amount_service_wait' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'wait'])),
            'amount_service_fixed' => count($this->Function_model->fetchDataResult('tbl_service', ['service_status' => 'fixed']))
        ]);
        exit();
    }
}

<?php


defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

class Prints extends CI_Controller

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

    //Test

    function Test()
    {

        $service_invoice = $this->input->get('invoice');

        $where_arr = ['service_invoice' => $service_invoice];

        $service = $this->Function_model->getDataRow('tbl_service', $where_arr);


        if ($service == null) {

            echo 'ไม่มีรายการนี้อยู่ในระบบ';

            exit();
        }



        $data['title'] = 'Job Order ' . $service_invoice;

        $data['service'] = $service;

        $data['vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', $where_arr);

        $data['engineer'] = $this->Function_model->fetchDataResult('tbl_engineer', $where_arr);

        $data['history'] = $this->Function_model->fetchDataResult('tbl_atp_history', $where_arr);

        $data['service_package'] = $this->Function_model->fetchDataResult('tbl_service_package', $where_arr);

        $data['service_project'] = $this->Function_model->fetchDataResult('tbl_service_project', $where_arr);

        $data['service_product'] = $this->Function_model->fetchDataResult('tbl_service_product', $where_arr);

        $data['uploads'] = $this->Function_model->fetchDataResult('tbl_atp_upload', $where_arr);

        $data['service_detail'] = $this->Function_model->fetchDataResult('tbl_service_detail', $where_arr);

        $html = $this->load->view('print/report/service_tvro', $data, true);



        $mpdf = new \Mpdf\Mpdf([

            'setAutoTopMargin' => 'stretch',

            'mode' => '',

            'format' => 'A4',

            'margin_left' => 10,

            'margin_right' => 10,

            'margin_top' => 5,

            'margin_bottom' => 5,

            'margin_header' => 0,

            'margin_footer' => 0,

            'orientation' => 'P',

            'mode' => 'utf-8',

            'default_font_size' => 14,

            'default_font' => 'sarabun'

        ]);

        $mpdf->useFixedNormalLineHeight = false;

        $mpdf->useFixedTextBaseline = false;

        $mpdf->adjustFontDescLineheight = 1;


        $mpdf->WriteHTML($html);

        $mpdf->Output($data['title'] . '.pdf', 'I');
    }

    //QR Code link

    function print_qr()
    {

        $vessel = $this->input->get('vessel');

        $where_arr = ['ves_name' => $vessel];

        $service = $this->Function_model->fetchDataResult('tbl_service', $where_arr, 'service_invoice', 'ASC');

        if ($service == null) {

            echo 'ไม่มีรายการนี้อยู่ในระบบ';

            exit();
        }

        $data['title'] = '';

        $data['service'] = $service;

        $data['engineer'] = $this->Function_model->fetchDataResult('tbl_engineer', '', '', '');

        $data['service_package'] = $this->Function_model->fetchDataResult('tbl_service_package', '', '', '');

        $data['service_product'] = $this->Function_model->fetchDataResult('tbl_service_product', '', '', '');

        $data['service_detail'] = $this->Function_model->fetchDataResult('tbl_service_detail', '', '', '');

        $html = $this->load->view('print/data_vessel', $data, true);

        $mpdf = new \Mpdf\Mpdf([

            'setAutoTopMargin' => 'stretch',

            'mode' => '',

            'format' => 'A4',

            'margin_left' => 10,

            'margin_right' => 10,

            'margin_top' => 5,

            'margin_bottom' => 5,

            'margin_header' => 0,

            'margin_footer' => 0,

            'orientation' => 'P',

            'mode' => 'utf-8',

            'default_font_size' => 14,

            'default_font' => 'sarabun'

        ]);

        $mpdf->useFixedNormalLineHeight = false;

        $mpdf->useFixedTextBaseline = false;

        $mpdf->adjustFontDescLineheight = 1;

        $mpdf->SetHeader(
            '<div>{PAGENO}</div> 
        <table class="tableheader" >
        <tbody>
            <tr>
                <td rowspan="3" style="width:150px;">

                    <img src="https://support.shipexpert.info/assets/img/logo.png" alt="" style="max-width: 150px;">

                </td>
                <td colspan="3" rowspan="2" style="text-align: center;">

                    <h3> <strong> ' . $vessel . ' </strong></h3>

                </td>
                <td style="padding-left: 5px;">

                    from

                </td>
            </tr>
            <tr>
                <td style="height: 50px;width:150px;">

                </td>
            </tr>
            <tr>
                <td style="text-align: center;width:20%;">

                </td>
                <td style="text-align: center;width:20%;">

                </td>
                <td style="text-align: center;width:20%;">
                Page {PAGENO} of {nb}
                </td>
                <td style="padding-left: 5px;">
                    Filling no.
                </td>
            </tr>
        </tbody>
        </table>'
        );

        $mpdf->SetFooter('Vessel Name : ' . $vessel);

        $mpdf->WriteHTML($html);

        $mpdf->Output($data['title'] . '.pdf', 'I');
    }

    //ATP Report

    function print_atp()
    {

        $service_invoice = $this->input->get('invoice');

        $where_arr = ['service_invoice' => $service_invoice];

        $service = $this->Function_model->getDataRow('tbl_service', $where_arr);


        if ($service == null) {

            echo 'ไม่มีรายการนี้อยู่ในระบบ';

            exit();
        }

        $this->Function_model->updateData('tbl_service', $where_arr, ['atp_create' => 'created']);


        $data['title'] = 'ATP Report ' . $service_invoice;

        $data['service'] = $service;

        $data['engineer'] = $this->Function_model->getDataRow('tbl_engineer', $where_arr);

        $data['vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', $where_arr);

        $data['atp_history'] = $this->Function_model->fetchDataResult('tbl_atp_history', '');

        $data['atp_detail'] = $this->Function_model->getDataRow('tbl_atp_detail', $where_arr);

        $data['atp_upload'] = $this->Function_model->fetchDataResult('tbl_atp_upload', $where_arr);

        $data['service_package'] = $this->Function_model->fetchDataResult('tbl_service_package', $where_arr);

        $data['service_project'] = $this->Function_model->fetchDataResult('tbl_service_project', $where_arr);

        $data['service_product'] = $this->Function_model->fetchDataResult('tbl_service_product', $where_arr);

        $data['service_detail'] = $this->Function_model->fetchDataResult('tbl_service_detail', $where_arr);

        $html = $this->load->view('print/service_atp', $data, true);


        $mpdf = new \Mpdf\Mpdf([

            'setAutoTopMargin' => 'stretch',

            'mode' => '',

            'format' => 'A4',

            'margin_left' => 10,

            'margin_right' => 10,

            'margin_top' => 5,

            'margin_bottom' => 5,

            'margin_header' => 0,

            'margin_footer' => 0,

            'orientation' => 'P',

            'mode' => 'utf-8',

            'default_font_size' => 14,

            'default_font' => 'sarabun'

        ]);

        $mpdf->useFixedNormalLineHeight = false;

        $mpdf->useFixedTextBaseline = false;

        $mpdf->adjustFontDescLineheight = 1;

        $mpdf->SetHeader(
            '<div>{PAGENO}</div> 
        <table class="tableheader">
            <tr>
                <td style=""><img src="https://support.shipexpert.info/assets/img/logo.png" alt="" style="max-width: 150px;"></td>
                <td style=""><strong>Shipexpert Co.,Ltd Final Acceptance Test</strong></td>
            </tr>
        </table>'
        );

        $mpdf->SetFooter('Job Order : ' . $service_invoice . '     ');

        $mpdf->WriteHTML($html);

        $mpdf->Output($data['title'] . '.pdf', 'I');
    }

    //Job Order

    function print_job()
    {

        $service_invoice = $this->input->get('invoice');

        $where_arr = ['service_invoice' => $service_invoice];

        $service = $this->Function_model->getDataRow('tbl_service', $where_arr);


        if ($service == null) {

            echo 'ไม่มีรายการนี้อยู่ในระบบ';

            exit();
        }



        $data['title'] = 'Job Order ' . $service_invoice;

        $data['service'] = $service;

        $data['vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', $where_arr);

        $data['engineer'] = $this->Function_model->fetchDataResult('tbl_engineer', $where_arr);

        $data['service_package'] = $this->Function_model->fetchDataResult('tbl_service_package', $where_arr);

        $data['service_product'] = $this->Function_model->fetchDataResult('tbl_service_product', $where_arr);

        $data['service_detail'] = $this->Function_model->fetchDataResult('tbl_service_detail', $where_arr);

        $html = $this->load->view('print/service_job', $data, true);

        $mpdf = new \Mpdf\Mpdf([

            'setAutoTopMargin' => 'stretch',

            'mode' => '',

            'format' => 'A4',

            'margin_left' => 10,

            'margin_right' => 10,

            'margin_top' => 5,

            'margin_bottom' => 5,

            'margin_header' => 0,

            'margin_footer' => 0,

            'orientation' => 'P',

            'mode' => 'utf-8',

            'default_font_size' => 14,

            'default_font' => 'sarabun'

        ]);

        $mpdf->useFixedNormalLineHeight = false;

        $mpdf->useFixedTextBaseline = false;

        $mpdf->adjustFontDescLineheight = 1;

        $mpdf->SetHeader(
            '<div>{PAGENO}</div> 
        <table class="tableheader" >
        <tbody>
            <tr>
                <td rowspan="3" style="width:150px;">

                    <img src="https://support.shipexpert.info/assets/img/logo.png" alt="" style="max-width: 150px;">

                </td>
                <td colspan="3" rowspan="2" style="text-align: center;">

                    <h3> <strong> Job Order ' . $service_invoice . '</strong></h3>

                </td>
                <td style="padding-left: 5px;">

                    from

                </td>
            </tr>
            <tr>
                <td style="height: 50px;width:150px;">

                </td>
            </tr>
            <tr>
                <td style="text-align: center;width:20%;">

                </td>
                <td style="text-align: center;width:20%;">

                </td>
                <td style="text-align: center;width:20%;">
                Page {PAGENO} of {nb}
                </td>
                <td style="padding-left: 5px;">
                    Filling no.
                </td>
            </tr>
        </tbody>
        </table>'
        );

        $mpdf->SetFooter('Job Order : ' . $service_invoice . '     ');

        $mpdf->WriteHTML($html);

        $mpdf->Output($data['title'] . '.pdf', 'I');
    }

    //PMS

    function print_pms()
    {

        $id = $this->input->get('id');

        $rec = $this->input->get('pms');

        $where_arr = ['id' => $id];

        $service = $this->Function_model->getDataRow('tbl_pms_job', $where_arr);

        if ($service == null) {

            echo 'ไม่มีรายการนี้อยู่ในระบบ';

            exit();
        }

        $data['title'] = $rec . 'Report';

        $data['service'] = $service;

        $html = $this->load->view('print/report/service_' . $rec, $data, true);

        $mpdf = new \Mpdf\Mpdf([

            'setAutoTopMargin' => 'stretch',

            'mode' => '',

            'format' => 'A4',

            'margin_left' => 10,

            'margin_right' => 10,

            'margin_top' => 5,

            'margin_bottom' => 5,

            'margin_header' => 0,

            'margin_footer' => 0,

            'orientation' => 'P',

            'mode' => 'utf-8',

            'default_font_size' => 14,

            'default_font' => 'sarabun'

        ]);

        $mpdf->SetHeader(
            '<div>{PAGENO}</div> 
        <table class="tableheader" >
        <tbody>
            <tr>
                <td rowspan="3" style="width:150px;">

                    <img src="https://support.shipexpert.info/assets/img/logo.png" alt="" style="max-width: 150px;">

                </td>
                <td colspan="3" rowspan="2" style="text-align: center;">

                    <h3> <strong> Preventive Maintenance Report </strong></h3>

                </td>
                <td style="padding-left: 5px;">

                    from

                </td>
            </tr>
            <tr>
                <td style="height: 50px;width:150px;">

                </td>
            </tr>
            <tr>
                <td style="text-align: center;width:20%;">
                <h4> ' . $service->pms_invoice . '</h4>
                </td>
                <td style="text-align: center;width:20%;">

                </td>
                <td style="text-align: center;width:20%;">
                Page {PAGENO} of {nb}
                </td>
                <td style="padding-left: 5px;">
                    Filling no.
                </td>
            </tr>
        </tbody>
        </table>'
        );


        $mpdf->useFixedNormalLineHeight = false;

        $mpdf->useFixedTextBaseline = false;

        $mpdf->adjustFontDescLineheight = 1;

        $mpdf->WriteHTML($html);

        $mpdf->Output($data['title'] . '.pdf', 'I');
    }

    //CM

    function print_cm()
    {

        $id = $this->input->get('id');

        $rec = $this->input->get('cm');

        $where_arr = ['id' => $id];

        $service = $this->Function_model->getDataRow('tbl_cm_job', $where_arr);

        if ($service == null) {

            echo 'ไม่มีรายการนี้อยู่ในระบบ';

            exit();
        }

        $data['title'] = $rec . 'Report';

        $data['service'] = $service;

        $html = $this->load->view('print/report/service_' . $rec, $data, true);

        $mpdf = new \Mpdf\Mpdf([

            'setAutoTopMargin' => 'stretch',

            'mode' => '',

            'format' => 'A4',

            'margin_left' => 10,

            'margin_right' => 10,

            'margin_top' => 5,

            'margin_bottom' => 5,

            'margin_header' => 0,

            'margin_footer' => 0,

            'orientation' => 'P',

            'mode' => 'utf-8',

            'default_font_size' => 14,

            'default_font' => 'sarabun'

        ]);

        $mpdf->SetHeader(
            '<div>{PAGENO}</div> 
        <table class="tableheader" >
        <tbody>
            <tr>
                <td rowspan="3" style="width:150px;">

                    <img src="https://support.shipexpert.info/assets/img/logo.png" alt="" style="max-width: 150px;">

                </td>
                <td colspan="3" rowspan="2" style="text-align: center;">

                    <h3> <strong> Corrective Maintenance Report </strong></h3>

                </td>
                <td style="padding-left: 5px;">

                    from

                </td>
            </tr>
            <tr>
                <td style="height: 50px;width:150px;">

                </td>
            </tr>
            <tr>
                <td style="text-align: center;width:20%;">
                <h4> ' . $service->cm_invoice . '</h4>
                </td>
                <td style="text-align: center;width:20%;">

                </td>
                <td style="text-align: center;width:20%;">
                Page {PAGENO} of {nb}
                </td>
                <td style="padding-left: 5px;">
                    Filling no.
                </td>
            </tr>
        </tbody>
        </table>'
        );


        $mpdf->useFixedNormalLineHeight = false;

        $mpdf->useFixedTextBaseline = false;

        $mpdf->adjustFontDescLineheight = 1;

        $mpdf->WriteHTML($html);

        $mpdf->Output($data['title'] . '.pdf', 'I');
    }

    //Checklist

    function print_report()
    {

        $service_invoice = $this->input->get('invoice');

        $rec = $this->input->get('pms');

        $where_arr = ['service_invoice' => $service_invoice];

        $service = $this->Function_model->getDataRow('tbl_service', $where_arr);

        if ($service == null) {

            echo 'ไม่มีรายการนี้อยู่ในระบบ';

            exit();
        }

        $data['title'] = $rec . $service_invoice;

        $data['service'] = $service;

        $data['vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', $where_arr, 'id', 'ASC');

        $data['report'] = $this->Function_model->getDataRow('tbl_report_' . $rec, $where_arr);

        $html = $this->load->view('print/report/service_' . $rec, $data, true);

        $mpdf = new \Mpdf\Mpdf([

            'setAutoTopMargin' => 'stretch',

            'mode' => '',

            'format' => 'A4',

            'margin_left' => 10,

            'margin_right' => 10,

            'margin_top' => 5,

            'margin_bottom' => 5,

            'margin_header' => 0,

            'margin_footer' => 0,

            'orientation' => 'P',

            'mode' => 'utf-8',

            'default_font_size' => 14,

            'default_font' => 'sarabun'

        ]);

        $mpdf->useFixedNormalLineHeight = false;

        $mpdf->useFixedTextBaseline = false;

        $mpdf->adjustFontDescLineheight = 1;

        $mpdf->SetFooter('Job Order : ' . $service_invoice . '     ');

        $mpdf->WriteHTML($html);

        $mpdf->Output($data['title'] . '.pdf', 'I');
    }

    //Customer Report

    function print_customer()
    {

        $service_invoice = $this->input->get('invoice');

        $where_arr = ['service_invoice' => $service_invoice];

        $service = $this->Function_model->getDataRow('tbl_service', $where_arr);

        if ($service == null) {

            echo 'ไม่มีรายการนี้อยู่ในระบบ';

            exit();
        }



        $data['title'] = 'Customer Acceptance Report ' . $service_invoice;

        $data['service'] = $service;

        $data['engineer'] = $this->Function_model->fetchDataResult('tbl_engineer', $where_arr);

        $data['service_package'] = $this->Function_model->fetchDataResult('tbl_service_package', $where_arr);

        $data['service_product'] = $this->Function_model->fetchDataResult('tbl_service_product', $where_arr);

        $data['service_uploads_back'] = $this->Function_model->fetchDataResult('tbl_uploads_back', $where_arr);

        $data['service_detail'] = $this->Function_model->fetchDataResult('tbl_service_detail', $where_arr);

        $html = $this->load->view('print/service_customer', $data, true);



        $mpdf = new \Mpdf\Mpdf([

            'setAutoTopMargin' => 'stretch',

            'mode' => '',

            'format' => 'A4',

            'margin_left' => 10,

            'margin_right' => 10,

            'margin_top' => 5,

            'margin_bottom' => 5,

            'margin_header' => 0,

            'margin_footer' => 0,

            'orientation' => 'P',

            'mode' => 'utf-8',

            'default_font_size' => 14,

            'default_font' => 'sarabun'

        ]);

        $mpdf->SetHeader(
            '<div>{PAGENO}</div> <table class="tableheader" >
        <tbody>
            <tr>
                <td rowspan="3" style="width:150px;">

                    <img src="https://support.shipexpert.info/assets/img/logo.png" alt="" style="max-width: 150px;">

                </td>
                <td colspan="3" rowspan="2" style="text-align: center;">

                    <h3> <strong> Customer Acceptance Report </strong></h3>

                </td>
                <td style="padding-left: 5px;">

                    from

                </td>
            </tr>
            <tr>
                <td style="height: 50px;width:150px;">

                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>

                </td>
                <td style="text-align: center;width:20%;">
                Page {PAGENO} of {nb}
                </td>
                <td style="padding-left: 5px;">
                    Filling no.
                </td>
            </tr>
        </tbody>
        </table>'
        );

        $mpdf->SetFooter('Job Order : ' . $service_invoice . '     ');

        $mpdf->WriteHTML($html);

        $mpdf->Output($data['title'] . '.pdf', 'I');
    }

    //Create ATP Report

    function create_atp()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $page6_11 = $this->input->post('page6_11');

        $page6_12 = $this->input->post('page6_12');

        $page6_13 = $this->input->post('page6_13');

        $page6_21 = $this->input->post('page6_21');

        $page6_31 = $this->input->post('page6_31');

        $page6_32 = $this->input->post('page6_32');

        $page6_41 = $this->input->post('page6_41');

        $page7_41 = $this->input->post('page7_41');

        $remark_page6 = $this->input->post('remark_page6');

        $add_info = $this->input->post('add_info');

        $mac_page7 = $this->input->post('mac_page7');

        $type_page7 = $this->input->post('type_page7');

        $email_page7 = $this->input->post('email_page7');

        $website_page7 = $this->input->post('website_page7');

        $download = $this->input->post('download');

        $upload = $this->input->post('upload');

        $version = $this->input->post('version');

        $date = $this->input->post('date');

        $author = $this->input->post('author');

        $detail = $this->input->post('detail');

        $count = $this->input->post('count');

        $file_network = $_FILES['files_network'];

        $file_app_a = $_FILES['files_app_a'];

        $file_app_b = $_FILES['files_app_b'];

        $file_app_c = $_FILES['files_app_c'];

        if (
            $remark_page6 == NULL || $download == NULL || $upload == NULL || $add_info == NULL || $page6_11 == NULL || $page6_12 == NULL || $page6_13 == NULL ||
            $page6_21 == NULL || $page6_31 == NULL || $page6_32 == NULL || $page6_41 == NULL || $page7_41 == NULL
        ) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No Data Input'

            ]);

            exit();
        }

        $data = [
            'service_invoice' => $service_invoice,
            'page6_11' => $page6_11,
            'page6_12' => $page6_12,
            'page6_13' => $page6_13,
            'page6_21' => $page6_21,
            'page6_31' => $page6_31,
            'page6_32' => $page6_32,
            'page6_41' => $page6_41,
            'page7_41' => $page7_41,
            'download' => $download,
            'upload' => $upload,
            'remark_page6_11' => $remark_page6,
            'additional' => $add_info,
            'mac_address' => $mac_page7,
            'type_device' => $type_page7,
            'email' => $email_page7,
            'website' => $website_page7,

        ];

        $res = $this->Function_model->insertData('tbl_atp_detail', $data);

        for ($num = 0; $num < ($count - 1); $num++) {

            $data = [
                'engineer' => $author[$num],
                'version' => $version[$num],
                'his_date' => $date[$num],
                'his_detail' => $detail[$num]
            ];

            $res = $this->Function_model->insertData('tbl_atp_history', $data);
        }

        foreach ($file_network['name'] as $index => $name) {

            $filename = $name;
            $fileTmp = $file_network['tmp_name'][$index];
            $filePath = "upload_atp/" . $service_invoice . "/network//" . $name;

            $check = $this->Function_model->fetchDataResult('tbl_atp_upload', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'page' => 'page4']);

            if (count($check) > 0) {
                $data = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'uploads_tmp' => $fileTmp,
                    'page' => 'page4'
                ];
                $where = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'page' => 'page4'
                ];

                $res = $this->Function_model->updateData('tbl_atp_upload', $where, $data);
            } else {
                move_uploaded_file($fileTmp, $filePath);

                $res = $this->Function_model->insertData('tbl_atp_upload', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'uploads_tmp' => $fileTmp, 'page' => 'page4']);
            }
        }

        foreach ($file_app_a['name'] as $index => $name) {
            $filename = $name;
            $fileTmp = $file_app_a['tmp_name'][$index];
            $filePath = "upload_atp/" . $service_invoice . "/app_a//" . $name;

            $check = $this->Function_model->fetchDataResult('tbl_atp_upload', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'page' => 'page10']);

            if (count($check) > 0) {
                $data = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'uploads_tmp' => $fileTmp,
                    'page' => 'page10'
                ];
                $where = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'page' => 'page10'
                ];

                $res = $this->Function_model->updateData('tbl_atp_upload', $where, $data);
            } else {
                move_uploaded_file($fileTmp, $filePath);

                $res = $this->Function_model->insertData('tbl_atp_upload', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'uploads_tmp' => $fileTmp, 'page' => 'page10']);
            }
        }

        foreach ($file_app_b['name'] as $index => $name) {
            $filename = $name;
            $fileTmp = $file_app_b['tmp_name'][$index];
            $filePath = "upload_atp/" . $service_invoice . "/app_b//" . $name;

            $check = $this->Function_model->fetchDataResult('tbl_atp_upload', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'page' => 'page11']);

            if (count($check) > 0) {
                $data = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'uploads_tmp' => $fileTmp,
                    'page' => 'page11'
                ];
                $where = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'page' => 'page11'
                ];

                $res = $this->Function_model->updateData('tbl_atp_upload', $where, $data);
            } else {
                move_uploaded_file($fileTmp, $filePath);

                $res = $this->Function_model->insertData('tbl_atp_upload', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'uploads_tmp' => $fileTmp, 'page' => 'page11']);
            }
        }

        foreach ($file_app_c['name'] as $index => $name) {
            $filename = $name;
            $fileTmp = $file_app_c['tmp_name'][$index];
            $filePath = "upload_atp/" . $service_invoice . "/app_c//" . $name;

            $check = $this->Function_model->fetchDataResult('tbl_atp_upload', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'page' => 'page12']);

            if (count($check) > 0) {
                $data = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'uploads_tmp' => $fileTmp,
                    'page' => 'page12'
                ];
                $where = [
                    'service_invoice' => $service_invoice,
                    'uploads_name' => $filename,
                    'page' => 'page12'
                ];

                $res = $this->Function_model->updateData('tbl_atp_upload', $where, $data);
            } else {
                move_uploaded_file($fileTmp, $filePath);

                $res = $this->Function_model->insertData('tbl_atp_upload', ['service_invoice' => $service_invoice, 'uploads_name' => $filename, 'uploads_tmp' => $fileTmp, 'page' => 'page12']);
            }
        }

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
}

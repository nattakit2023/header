<?php

defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class QRcodes extends CI_Controller

{

    function __construct()

    {
        parent::__construct();
    }

    function generate_qr()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $invoice = $this->input->post('invoice');

        $service = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $invoice]);

        if ($service == null) {
            echo json_encode([
                'status' => 'ERROR',
                'message' => 'Invoice Not Found'
            ]);
            exit();
        } else {
            $data = base_url() . 'qrcodes/print_qr?vessel=' . $service->ves_name;
            $header = $service->service_invoice . '(' . $service->ves_name . ')';
            echo json_encode([
                'status' => 'SUCCESS',
                'header' => $header,
                'http' => $data,
                'qr_code' => '<img src="' . (new QRCode)->render($data) . '" alt= "QR Code"/>'
            ]);
            exit();
        }
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

}

<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Port extends CI_Controller

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

    //-------------------------------------------------------------------------P A C K A G E----------------------------------------------------------------------------------

    //Option Port
    function option_port()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $port_name = $this->input->post('port_names');

        $port = $this->Function_model->fetchDataResult('tbl_port', '', 'id', 'ASC');

        if ($port_name == '') {
            echo '<option value="" disabled selected>Port Name</option>';
        }

        foreach ($port as $item) {
            if ($item->port_name == $port_name) {
                echo '<option value="' . $item->port_name . '" selected>' .  $item->port_name . '</option>';
            } else {
                echo '<option value="' . $item->port_name . '">' .  $item->port_name . '</option>';
            }
        }
    }

    //Option Province
    function option_province()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $port_name = $this->input->post('port_name');

        $port = $this->Function_model->getDataRow('tbl_port', ['port_name' => $port_name]);

        echo '<option value="' . $port->port_province . '"  selected>' .  $port->port_province . '</option>';
    }

    function tbl_port()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $data['port'] = $this->Function_model->fetchDataResult('tbl_port', '', 'id', 'ASC');

        $this->load->view('components/tbl_port', $data);
    }

    //Get Port

    function get_port()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $id = $this->input->post('port_id');

        if ($id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่มีข้อมูลเข้ามา'

            ]);
            exit();
        }

        $res = $this->Function_model->getDataRow('tbl_port', ['id' => $id]);

        if ($res != null) {

            echo json_encode([

                'status' => 'SUCCESS',

                'data' => [

                    'id' => $res->id,

                    'port_name' => $res->port_name,

                    'port_province' => $res->port_province,


                ]

            ]);
            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่พบข้อมูลที่ต้องการ'

            ]);
            exit();
        }
    }

    //ลบข้อมูลของคนเรือ

    function del_port()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $port_id = $this->input->post('port_id');

        if ($port_id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่มีข้อมูลเข้ามา'

            ]);
            exit();
        }

        $res = $this->Function_model->deleteData('tbl_port', ['id' => $port_id]);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'ลบข้อมูลผู้ใช้งานเรียบร้อยแล้ว'

            ]);
            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'มีบางอย่างผิดพลาด กรุณาทำรายการใหม่อีกครั้ง'

            ]);
            exit();
        }
    }

    //Update Contact

    function update_Port()
    {
        //if ($_SERVER['REQUEST_METHOD'] != 'POST') {

        //    show_404(); exit();
        //}

        $port_id = $this->input->post('port_id');

        $port_name = $this->input->post('port_names');

        $port_province = $this->input->post('port_provinces');


        if ($port_id == null || $port_name == null || $port_province == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        $where_arr = ['id' => $port_id];

        $data_arr = [

            'port_name' => $port_name,

            'port_province' => $port_province

        ];

        $res = $this->Function_model->updateData('tbl_port', $where_arr, $data_arr);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => $port_id

            ]);
            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'อัพเดตข้อมูลไม่สำเร็จ กรุณาทำรายการใหม่อีกครั้ง'

            ]);
            exit();
        }
    }

    //Create Contact

    function create_Port()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $port_name = $this->input->post('port_names');

        $port_province = $this->input->post('port_provinces');




        if ($port_name == '' || $port_province == '') {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }


        $data_arr = [

            'port_name' => $port_name,

            'port_province' => $port_province

        ];

        $check = count($this->Function_model->fetchDataResult('tbl_port', $data_arr));

        if ($check == 0) {


            $res = $this->Function_model->insertData('tbl_port', $data_arr);

            if ($res == TRUE) {

                echo json_encode([

                    'status' => 'SUCCESS',

                    'message' => $check

                ]);

                exit();
            }
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Create Service Fail!'

            ]);

            exit();
        }
    }
}

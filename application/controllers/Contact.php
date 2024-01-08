<?php

use Mpdf\Language\ScriptToLanguage;

defined('BASEPATH') or exit('No direct script access allowed');


class Contact extends CI_Controller

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

    //-------------------------------------------------------------------------C O N T R A C T----------------------------------------------------------------------------------

    //ตารางของคนเรือ

    // Tbl Contact
    function tbl_contact()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $data['contact'] = $this->Function_model->fetchDataResult('tbl_contact', '', 'con_id', 'ASC');

        $this->load->view('components/tbl_contact', $data);
    }


    //Option Contact Name
    function option_contact_name()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $con_name = $this->input->post('con_name');

        $con = $this->Function_model->fetchDataResult('tbl_contact', '', 'con_id', 'ASC');

        if ($con_name == '') {
            echo '<option value="" disabled selected>Contact Name</option>';
        } else {
            echo '<option value="' . $con_name . '"  selected>' . $con_name . '</option>';
        }



        foreach ($con as $item) {

            echo '<option value="' . $item->con_name . '">' .  $item->con_name . '</option>';
        }
    }


    //Option Contact Phone
    function option_contact_phone()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $con_name = $this->input->post('con_name');

        $con = $this->Function_model->getDataRow('tbl_contact', ['con_name' => $con_name]);

        echo '<option value="' . $con->con_tel . '"  selected>' .  $con->con_tel . '</option>';
    }

    //Option Contact Email
    function option_contact_email()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $con_name = $this->input->post('con_name');

        $con = $this->Function_model->getDataRow('tbl_contact', ['con_name' => $con_name]);

        echo '<option value="' . $con->con_email . '"  selected>' .  $con->con_email . '</option>';
    }


    //Create Contact

    function create_Contact()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $con_name = $this->input->post('con_name');

        $con_tel = $this->input->post('con_tel');

        $con_email = $this->input->post('con_email');


        if ($con_name == '' || $con_tel == '' || $con_email == '') {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        $this->db->like('con_name', $con_name, 'both');

        $check_name = $this->db->get('tbl_contact')->row();

        if ($check_name == null) {
            $data_arr = [

                'con_name' => strtoupper($con_name),

                'con_tel' => $con_tel,

                'con_email' => $con_email

            ];

            $res = $this->Function_model->insertData('tbl_contact', $data_arr);

            if ($res == TRUE) {

                echo json_encode([

                    'status' => 'SUCCESS'

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

    //Get Contact

    function get_contact()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $con_id = $this->input->post('con_id');

        if ($con_id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่มีข้อมูลเข้ามา'

            ]);
            exit();
        }

        $res = $this->Function_model->getDataRow('tbl_contact', ['con_id' => $con_id]);

        if ($res != null) {

            echo json_encode([

                'status' => 'SUCCESS',

                'data' => [

                    'con_id' => $res->con_id,

                    'con_name' => $res->con_name,

                    'con_email' => $res->con_email,

                    'con_tel' => $res->con_tel

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

    function del_contact()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $con_id = $this->input->post('con_id');

        if ($con_id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่มีข้อมูลเข้ามา'

            ]);
            exit();
        }

        $res = $this->Function_model->deleteData('tbl_contact', ['con_id' => $con_id]);

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

    function update_Contact()
    {
        //if ($_SERVER['REQUEST_METHOD'] != 'POST') {

        //    show_404(); exit();
        //}

        $con_id = $this->input->post('con_id');

        $con_name = $this->input->post('con_name');

        $con_tel = $this->input->post('con_tel');

        $con_email = $this->input->post('con_email');


        if ($con_id == "false" || $con_name == null || $con_tel == null || $con_email == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        $where_arr = ['con_id' => $con_id];

        $data_arr = [

            'con_name' => strtoupper($con_name),

            'con_tel' => $con_tel,

            'con_email' => $con_email

        ];

        $res = $this->Function_model->updateData('tbl_contact', $where_arr, $data_arr);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => $con_id

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
}

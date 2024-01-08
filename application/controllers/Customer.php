<?php

use Mpdf\Language\ScriptToLanguage;

defined('BASEPATH') or exit('No direct script access allowed');


class Customer extends CI_Controller

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


    //option customer

    function option_customer()
    {
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $name = $this->input->post('name');

        $customer = $this->Function_model3->fetchDataResult('customers', '', 'id', 'ASC');

        if($name == ''){
            echo '<option value="" disabled selected>Customer Name</option>';
        }else{
            echo '<option value="'.$name.'"  selected>'.$name.'</option>';
        }

        

        foreach ($customer as $item) {

            echo '<option value="' . $item->name . '">' . $item->id . " . " .  $item->name . '</option>';
        }
    }

    //option phone

    function option_phone()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $cus_name = $this->input->post('cus_names');

        $customer = $this->Function_model3->getDataRow('customers', ['name' => $cus_name]);

        echo '<option value="' . $customer->phone . '" selected> ' .  $customer->phone . '</option>';
    }

    //option phone

    function option_email()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $cus_name = $this->input->post('cus_names');

        $customer = $this->Function_model3->getDataRow('customers', ['name' => $cus_name]);

        echo '<option value="' . $customer->email . '"  selected> ' .  $customer->email . '</option>';
    }

    //option address

    function option_address()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $cus_name = $this->input->post('cus_names');

        $customer = $this->Function_model3->getDataRow('customers', ['name' => $cus_name]);

        echo '<option value="' . $customer->address . '"  selected> ' .  $customer->address . '</option>';
    }

    //option zipcode

    function option_zipcode()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $cus_name = $this->input->post('cus_names');

        $customer = $this->Function_model3->getDataRow('customers', ['name' => $cus_name]);

        echo '<option value="' . $customer->postbox . '"  selected> ' .  $customer->postbox . '</option>';
    }


    //ทะเบียนรถลูกค้า

    function tblCustomer()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $name = $this->input->post('name');

        $this->db->like('cus_name', $name, 'both');

        $data['customers'] = $this->db->get('tbl_service')->result();

        $this->load->view('components/tbl_customer', $data);
    }



    //ตารางประวัติการเข้าใช้งาน

    function tbl_customer_history()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $datestart = $this->input->post('datestart');

        $dateend = $this->input->post('dateend');

        $service_id = $this->input->post('service_id');

        if ($service_id == null) {

            show_404();
            exit();
        }

        $ves_name = $this->Function_model->getDataRow('tbl_service', ['service_id' => $service_id])->ves_name;

        if ($datestart == null || $dateend == null) {

            $where_arr = [

                'ves_name' => $ves_name

            ];
        } else {

            $where_arr = [

                'due_date >=' => $datestart,

                'end_date <=' => $dateend,

                'ves_name' => $ves_name

            ];
        }

        $data['customer_history'] = $this->Function_model->fetchDataResult('tbl_service', $where_arr, 'service_id', 'DESC');

        $this->load->view('components/tbl_customer_history', $data);
    }


    // Create Customer

    function create_customer()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }


        $cus_name = $this->input->post('cus_name');

        $cus_tel = $this->input->post('cus_tel');

        $cus_email = $this->input->post('cus_email');

        $cus_address = $this->input->post('cus_address');

        $cus_zip = $this->input->post('cus_zip');

        if ($cus_name == null || $cus_tel == null || $cus_zip == null || $cus_email == null || $cus_address == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        $this->db->like('cus_name', $cus_name, 'both');

        $check_name = $this->db->get('tbl_customer')->row();

        if ($check_name == null) {
            $data_arr = [

                'cus_name' => strtoupper($cus_name),

                'cus_tel' => $cus_tel,

                'cus_address' => $cus_address,

                'cus_email' => $cus_email,

                'cus_zip' => $cus_zip

            ];

            $res = $this->Function_model->insertData('tbl_customer', $data_arr);

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



    //อัพเดตข้อมูลลูกค้า

    function update_customer()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $cus_id = $this->input->post('cus_id');

        $cus_name = $this->input->post('cus_name');

        $cus_tel = $this->input->post('cus_tel');

        $cus_tax = $this->input->post('cus_tax');

        $cus_address = $this->input->post('cus_address');

        if ($cus_id == null || $cus_name == null || $cus_tel == null || $cus_address == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data Input'

            ]);
            exit();
        }

        $where_arr = ['cus_id' => $cus_id];

        $data_arr = [

            'cus_name' => strtoupper($cus_name),

            'cus_tel' => $cus_tel,

            'cus_tax' => $cus_tax,

            'cus_address' => $cus_address

        ];

        $res = $this->Function_model->updateData('tbl_customer', $where_arr, $data_arr);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'อัพเดตข้อมูลเรียบร้อยแล้ว'

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



    //ลบข้อมูลลูกค้า

    function del_customer()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $cus_id = $this->input->post('cus_id');

        if ($cus_id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No Data Input'

            ]);
            exit();
        }

        $res = $this->Function_model->deleteData('tbl_customer', ['cus_id' => $cus_id]);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'ลบข้อมูลทะเบียนรถและลูกค้าเรียบร้อยแล้ว'

            ]);
            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'มีบางอย่างผิดพลาด กรุณาตรวจสอบหรือทำรายการใหม่อีกครั้ง'

            ]);
            exit();
        }
    }
}

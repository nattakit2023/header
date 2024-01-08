<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Product extends CI_Controller

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



    //ตาราง html สินค้าและบริการ

    public function tbl_product()

    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $data['product'] = $this->Function_model->fetchDataResult('tbl_product', '', 'product_id', 'DESC');

        $this->load->view('components/tbl_product', $data);
    }



    // เพิ่มสินค้าและบริการ

    function add_product()

    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $product_name = $this->input->post('product_name');

        $product_price = $this->input->post('product_price');

        if ($product_name == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่มีข้อมูลเข้ามา'

            ]);

            exit();
        }

        //ตรวจสอบว่ามีชื่อสินค้านี้อยู่แล้วหรือยัง

        $this->db->like('product_name', $product_name, 'after');

        $check_name = $this->db->get('tbl_product')->row();

        if ($check_name != null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'สินค้าและบริการนี้มีในระบบเรียบร้อยแล้ว'

            ]);
            exit();
        }

        $data_arr = [

            'product_name' => $product_name,

            'product_price' => $product_price

        ];

        $res = $this->Function_model->insertData('tbl_product', $data_arr);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'เพิ่มสินค้าและบริการเรียบร้อยแล้ว'

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'เพิ่มข้อมูล ไม่สำเร็จ กรุณาทำรายการใหม่อีกครั้ง'

            ]);

            exit();
        }
    }

    // ลบสินค้าและบริการ

    function del_product()

    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $product_id = $this->input->post('product_id');

        if ($product_id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่มีข้อมูลเข้ามา'

            ]);

            exit();
        }

        $res = $this->Function_model->deleteData('tbl_product', ['product_id' => $product_id]);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'ลบสินค้าและบริการเรียบร้อยแล้ว'

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

    // แก้ไขสินค้าและบริการ

    function update_product()

    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $product_id = $this->input->post('product_id');

        $product_name = $this->input->post('product_name');

        $product_price = $this->input->post('product_price');

        if ($product_id == null || $product_name == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        //ตรวจสอบชื่อซ้ำ

        $this->db->where('product_id !=', $product_id);

        $this->db->like('product_name', $product_name, 'after');

        $check_name = $this->db->get('tbl_product')->row();



        if ($check_name != null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'สินค้าและบริการนี้มีในระบบเรียบร้อยแล้ว'

            ]);
            exit();
        }

        $where_arr = [

            'product_id' => $product_id

        ];

        $data_arr = [

            'product_name' => $product_name,

            'product_price' => $product_price

        ];

        $res = $this->Function_model->updateData('tbl_product', $where_arr, $data_arr);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'แก้ไขข้อมูลสินเค้าและบริการเรียบร้อยแล้ว'

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'FAIL! Please check again'

            ]);

            exit();
        }
    }

    //ดึงเอาข้อมูลสินค้าและบริการ

    function get_product()

    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $product_id = $this->input->post('product_id');

        if ($product_id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No Data Input'

            ]);

            exit();
        }

        $res = $this->Function_model->getDataRow('tbl_product', ['product_id' => $product_id]);

        if ($res != null) {

            echo json_encode(

                [

                    'status' => 'SUCCESS',

                    'product_name' => $res->product_name,

                    'product_id' => $res->product_id,

                    'product_price' => $res->product_price

                ]

            );
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data in this ID'

            ]);
            exit();
        }
    }



    //option สินค้าและบริการ

    function option_product()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $product = $this->Function_model2->fetchDataResult('sma_products', '', 'id', 'ASC');

        echo '<option value="" disabled selected>--เลือกสินค้า & บริการ--</option>';

        /*foreach ($product as $item) {

            if (($item->quantity - $item->track_quantity) <= 0) {
            } else {
                echo '<option value="' . $item->code . '">' . $item->id . ". " . $item->name . '</option>';
            }
        }*/
        foreach ($product as $item) {
            echo '<option value="' . $item->code . '">' . $item->id . ". " . $item->name . '</option>';
        }
    }

    //option สินค้าและบริการ

    function option_quantity()
    {

        $product_name = $this->input->post('product_name');

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $product = $this->Function_model2->getDataRow('sma_products', ['code' => $product_name], 'id', 'ASC');

        echo '<option value="" selected>เลือกจำนวนสินค้า</option>';

        //$quantity = $product->quantity - $product->track_quantity;
        $quantity = 100;
        $i = 1;
        while ($i <= $quantity) {
            echo '<option value="' . $i . '">' . $i . '</option>';
            $i++;
        }
        exit();
    }
}

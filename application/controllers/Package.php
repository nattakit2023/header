<?php


defined('BASEPATH') or exit('No direct script access allowed');


class Package extends CI_Controller

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

    //option package

    function option_package()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $package_names = $this->input->post('pack_name');

        $packages = $this->Function_model->fetchDataResult('tbl_service_package', ['service_invoice' => $service_invoice], 'pack_name', 'ASC');

        $package = $this->Function_model->fetchDataResult('tbl_package', '', 'pack_name', 'ASC');


        if ($service_invoice != null) {

            foreach ($package as $item1) {

                foreach ($packages as $item2) {

                    if ($item2->pack_name == $item1->pack_name && $package_names != $item1->pack_name) {
                        echo '<option value="' . $item2->pack_name . '" selected>' . $item2->pack_name . '</option>';
                        $package_names = $item1->pack_name;
                    }
                }
                if ($item1->pack_name != $package_names) {
                    echo '<option value="' . $item1->pack_name . '" >' . $item1->pack_name . '</option>';
                    $package_names = $item1->pack_name;
                }
            }
        } else {
            foreach ($package as $item) {

                if ($package_names == $item->pack_name) {
                } else {
                    echo '<option value="' . $item->pack_name . '">' . $item->pack_name . '</option>';
                }
                $package_names = $item->pack_name;
            }
        }
    }

    //option package internet

    function option_package_internet()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $service_invoice = $this->input->post('service_invoice');

        $package_name = $this->input->post('package');

        $packages = $this->Function_model->fetchDataResult('tbl_service_package', ['service_invoice' => $service_invoice], 'pack_name', 'ASC');

        if ($service_invoice != null) {
            if ($package_name != null) {
                $index = 1;
                foreach ($package_name as $item1) {
                    $package = $this->Function_model->fetchDataResult('tbl_package', ['pack_name' => $item1]);
                    foreach ($package as $item2) {
                        foreach ($packages as $item3) {
                            if ($item2->pack_name == $item3->pack_name && $item2->pack_internet == $item3->pack_internet) {
                                echo '<option value="' . $item3->pack_internet . '" selected>' . $index . " . " . $item3->pack_internet . '</option>';
                            } else {
                                echo '<option value="' . $item2->pack_internet . '">' . $index . " . " . $item2->pack_internet . '</option>';
                            }
                        }
                        $index++;
                    }
                }
            } else {
                $index = 1;
                foreach ($packages as $item1) {

                    $package = $this->Function_model->fetchDataResult('tbl_package', ['pack_name' => $item1->pack_name]);

                    foreach ($package as $item2) {
                        if ($item1->pack_internet == $item2->pack_internet) {
                            echo '<option value="' . $item1->pack_internet . '"selected>' . $index . " . " . $item1->pack_internet . '</option>';
                        } else {
                            echo '<option value="' . $item2->pack_internet . '" >' . $index . " . " . $item2->pack_internet . '</option>';
                        }
                        $index++;
                    }
                }
            }
        } else {
            $index = 1;
            foreach ($package_name as $name) {

                $package = $this->Function_model->fetchDataResult('tbl_package', ['pack_name' => $name]);


                foreach ($package as $item) {

                    echo '<option value="' . $item->pack_internet . '">' . $index . " . " . $item->pack_internet . '</option>';
                    $index++;
                }
            }
        }
    }

    // tbl_package

    function tbl_package()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $data['package'] = $this->Function_model->fetchDataResult('tbl_package', '', 'id', 'ASC');

        $this->load->view('components/tbl_package', $data);
    }

    //Get Package

    function get_package()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $id = $this->input->post('id');

        if ($id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่มีข้อมูลเข้ามา'

            ]);
            exit();
        }

        $res = $this->Function_model->getDataRow('tbl_package', ['id' => $id]);

        if ($res != null) {

            echo json_encode([

                'status' => 'SUCCESS',

                'data' => [

                    'id' => $res->id,

                    'pack_name' => $res->pack_name,

                    'pack_internet' => $res->pack_internet,


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

    function del_package()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $pack_id = $this->input->post('id');

        if ($pack_id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'ไม่มีข้อมูลเข้ามา'

            ]);
            exit();
        }

        $res = $this->Function_model->deleteData('tbl_package', ['id' => $pack_id]);

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

    function update_Package()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();
            exit();
        }

        $pack_id = $this->input->post('pack_id');

        $pack_name = $this->input->post('pack_name');

        $pack_internet = $this->input->post('pack_internet');


        if ($pack_id == null || $pack_name == null || $pack_internet == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        $where_arr = ['id' => $pack_id];

        $data_arr = [

            'pack_name' => strtoupper($pack_name),

            'pack_internet' => $pack_internet,


        ];

        $res = $this->Function_model->updateData('tbl_package', $where_arr, $data_arr);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => $pack_id

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

    //Create Package

    function create_Package()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }


        $pack_name = $this->input->post('pack_names');

        $pack_internet = $this->input->post('pack_internets');

        if ($pack_name == null || $pack_internet == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'No data input'

            ]);

            exit();
        }

        $check_internet = $this->Function_model->getDataRow('tbl_package', ['pack_name' => $pack_name, 'pack_internet' => $pack_internet]);

        if ($check_internet == null) {
            $data_arr = [

                'pack_name' => strtoupper($pack_name),

                'pack_internet' => $pack_internet,

            ];

            $res = $this->Function_model->insertData('tbl_package', $data_arr);

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
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Pages extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        if ($this->session->userdata('admin_id') == null) {

            redirect('/');
        }
    }

    //จัดการหน้าต่างๆ

    public function index($page = 'dashboard')

    {

        if (!file_exists('./application/views/pages/' . $page . '.php')) {

            show_404();
        }

        $data['active'] = $page;

        switch ($page) {

                //หน้าหลัก

            case 'dashboard':

                $data['title'] = 'หน้าแรก | ระบบบริหารจัดการทีม SUPPORT';

                $sidebar['sidebar'] = '';

                break;

                //รายการซ่อม

            case 'service_create':

                if ($this->session->userdata('admin_position') == 'Engineer') {

                    redirect('/dashboard');
                }

                $data['title'] = 'รับงานซ่อม | ระบบบริหารจัดการทีม SUPPORT';

                $data['service'] = $this->Function_model->fetchDataResult('tbl_service', '', 'service_invoice', 'ASC');

                $data['package'] = $this->Function_model->fetchDataResult('tbl_package', '', 'id', 'ASC');

                $data['port'] = $this->Function_model->fetchDataResult('tbl_port', '', 'id', 'ASC');

                $data['contact'] = $this->Function_model->fetchDataResult('tbl_contact', '', 'con_id', 'ASC');

                $sidebar['sidebar'] = 'job';

                break;

            case 'service':

                $data['title'] = 'รายการส่งซ่อม';

                $sidebar['sidebar'] = 'job';

                break;

            case 'service_status':

                $data['title'] = 'รายการส่งซ่อมตามสถานะ';

                $sidebar['sidebar'] = 'job';

                break;

            case 'service_detail':

                $data['title'] = 'รายละเอียดงานซ่อม';

                $sidebar['sidebar'] = 'job';

                break;

                //จัดการสินค้า บริการ และอื่นๆ

            case 'product':

                $data['title'] = 'จัดการสินค้าและบริการ';

                $sidebar['sidebar'] = '';

                break;

            case 'contact':

                if ($this->session->userdata('admin_position') != 'Super admin') {

                    redirect('/dashboard');
                }

                $data['title'] = 'จัดการข้อมูลContact';

                $sidebar['sidebar'] = 'management';

                break;

            case 'port':

                if ($this->session->userdata('admin_position') != 'Super admin') {

                    redirect('/dashboard');
                }

                $data['title'] = 'จัดการข้อมูลPort';

                $sidebar['sidebar'] = 'management';

                break;

            case 'package':

                if ($this->session->userdata('admin_position') != 'Super admin') {

                    redirect('/dashboard');
                }

                $data['title'] = 'จัดการข้อมูลPackage';

                $sidebar['sidebar'] = 'management';

                break;

            case 'user':

                if ($this->session->userdata('admin_position') != 'Super admin') {

                    redirect('/dashboard');
                }

                $data['title'] = 'จัดการผู้ใช้งานระบบ';

                $sidebar['sidebar'] = 'management';

                break;

            case 'calendar':

                $data['title'] = 'ปฏิทินการทำงาน';

                $data['calendar'] = $this->Function_model->fetchDataResult('tbl_calendar', '', 'due_date', 'ASC');

                $sidebar['sidebar'] = '';

                break;

            case 'pms_create':

                $data['title'] = 'ปฏิทินการทำงาน';

                $data['service'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $this->input->get('service_invoice')]);

                $data['project'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $this->input->get('service_invoice')]);

                $data['product'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $this->input->get('service_invoice')]);

                $data['vessel'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $this->input->get('service_invoice')]);

                $sidebar['sidebar'] = '';

                break;

                //รายงานต่างๆ 

            case 'report_service':

                $data['title'] = 'รายงาน JOB ORDER';

                $sidebar['sidebar'] = '';

                break;

            case 'change_password':

                $data['title'] = 'เปลี่ยนรหัสผ่าน';

                $sidebar['sidebar'] = '';

                break;

            default:

                show_404();

                exit();
        }



        //layout

        $this->load->view('template/header', $data);

        $this->load->view('template/navbar');

        $this->load->view('template/sidebar', $sidebar);

        $this->load->view('pages/' . $page, $data);

        $this->load->view('template/footer');
    }

    function update_status($invoice)
    {
        if ($invoice == null) {

            show_404();
            exit();
        }

        $data_arr = [
            'service_status' => ''
        ];

        $where = [
            'service_invoice' => $invoice
        ];

        $this->Function_model->updateData('tbl_service', $where, $data_arr);


        $data['title'] = 'รายงาน JOB ORDER';

        $sidebar['sidebar'] = '';

        $this->load->view('template/header', $data);

        $this->load->view('template/navbar');

        $this->load->view('template/sidebar', $sidebar);

        $this->load->view('pages/report_service', $data);

        $this->load->view('template/footer');
    }



    //รายละเอียแจ้งซ่อม

    function service_detail($invoice)
    {

        if ($invoice == null) {

            show_404();
            exit();
        }

        $data['atp_upload'] = $this->Function_model->getDataRow('tbl_atp_upload_back', ['service_invoice' => $invoice]);

        $data['engineer'] = $this->Function_model->fetchDataResult('tbl_engineer', ['service_invoice' => $invoice]);

        $data['vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', ['service_invoice' => $invoice]);

        $data['service_package'] = $this->Function_model->fetchDataResult('tbl_service_package', ['service_invoice' => $invoice]);

        $data['service_product'] = $this->Function_model->fetchDataResult('tbl_service_product', ['service_invoice' => $invoice]);

        $data['service_project'] = $this->Function_model->fetchDataResult('tbl_service_project', ['service_invoice' => $invoice]);

        $data['service'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $invoice]);

        $data['image'] = $this->Function_model->fetchDataResult('tbl_uploads', ['service_invoice' => $invoice]);

        $data['image_back'] = $this->Function_model->fetchDataResult('tbl_uploads_back', ['service_invoice' => $invoice]);

        $sidebar['sidebar'] = 'job';

        if ($data['service'] == null) {

            show_404();
            exit();
        }

        $data['title'] = 'ใบแจ้งซ่อมเลขที่ ' . $data['service']->service_invoice;

        $data['active'] = 'service_detail';

        $this->load->view('template/header', $data);

        $this->load->view('template/navbar');

        $this->load->view('template/sidebar', $sidebar);

        $this->load->view('pages/service_detail', $data);

        $this->load->view('template/footer');
    }

    //รายละเอียแจ้งซ่อม

    function report($rec)
    {

        if ($rec == null) {

            show_404();
            exit();
        }



        if ($rec == 'pms_cre') {
            $sidebar['sidebar'] = 'pms';
            $data['active'] = 'pms_cre';
            $data['pms'] = 'pms';
            $data['title'] = strtoupper('pms') . ' Reports';
        } else if ($rec == 'pms_suc') {
            $sidebar['sidebar'] = 'pms';
            $data['active'] = 'pms_suc';
            $data['pms'] = 'pms';
            $data['title'] = strtoupper('pms') . ' Reports';
        } else {
            $data['active'] = $rec;
            $sidebar['sidebar'] = 'report';
            $data['pms'] = $rec;
            $data['title'] = strtoupper($rec) . ' Reports';
        }

        $this->load->view('template/header', $data);

        $this->load->view('template/navbar');

        $this->load->view('template/sidebar', $sidebar);

        $this->load->view('pages/pms', $data);

        $this->load->view('template/footer');
    }

    function reports($rec, $service_invoice)
    {

        if ($rec == null) {
            show_404();
            exit();
        }

        $data['service'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service_invoice]);

        $data['vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', ['service_invoice' => $service_invoice]);

        $data['pms'] = $rec;

        $data['title'] = strtoupper($rec) . ' Report ' . $service_invoice;

        $data['active'] = 'pms';

        $sidebar['sidebar'] = 'report';

        $this->load->view('template/header', $data);

        $this->load->view('template/navbar');

        $this->load->view('template/sidebar', $sidebar);

        $this->load->view('pages/reports/' . $rec . '_report', $data);

        $this->load->view('template/footer');
    }

    //รายละเอียดการแก้ไข

    function service_edit_detail($invoice)
    {

        if ($invoice == null) {

            show_404();
            exit();
        }

        $data['service'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $invoice]);

        if ($data['service'] == null) {

            show_404();
            exit();
        }

        $data['title'] = 'ใบแจ้งซ่อมเลขที่ ' . $data['service']->service_invoice;

        $data['active'] = 'service_detail';

        $sidebar['sidebar'] = 'job';

        $this->load->view('template/header', $data);

        $this->load->view('template/navbar');

        $this->load->view('template/sidebar', $sidebar);

        $this->load->view('pages/service_edit_detail', $data);

        $this->load->view('template/footer');
    }

    // ออกใบATP REPORt

    function atp_report($invoice)
    {

        if ($invoice == null) {

            show_404();
            exit();
        }

        $data['service'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $invoice]);

        if ($data['service'] == null) {

            show_404();
            exit();
        }

        $data['title'] = 'ATP Report ' . $data['service']->service_invoice;

        $data['active'] = 'service_detail';

        $sidebar['sidebar'] = 'job';

        $this->load->view('template/header', $data);

        $this->load->view('template/navbar');

        $this->load->view('template/sidebar', $sidebar);

        $this->load->view('pages/atp_report', $data);

        $this->load->view('template/footer');
    }


    //รายละเอียลูกค้า

    function customer_detail($cus_id)
    {

        if ($cus_id == null) {

            show_404();
            exit();
        }

        $data['customer'] = $this->Function_model->getDataRow('tbl_customer', ['cus_id' => $cus_id]);

        if ($data['customer'] == null) {

            show_404();
            exit();
        }

        $data['title'] = 'รายละเอียดประวัติการเข้า Service ' . $data['customer']->license_plate;

        $data['active'] = 'customer';

        $this->load->view('template/header', $data);

        $this->load->view('template/navbar');

        $this->load->view('template/sidebar');

        $this->load->view('pages/customer_detail', $data);

        $this->load->view('template/footer');
    }



    //เปลี่ยนรหัสผ่าน

    function change_password()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            show_404();

            exit();
        }

        $admin_password = $this->input->post('admin_password');

        $admin_id = $this->session->userdata('admin_id');

        if ($admin_password == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'กรุณากรอกข้อมูลรหัสผ่าน'

            ]);
            exit();
        }

        $data_arr = ['admin_password' => sha1($admin_password)];

        $where_arr = ['admin_id' => $admin_id];

        $res = $this->Function_model->updateData('tbl_admin', $where_arr, $data_arr);

        if ($res == TRUE) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว'

            ]);
            exit();
        } else {

            echo json_encode(array(

                'status' => 'ERROR',

                'message' => 'เปลี่ยนรหัสผ่านไม่สำเร็จ กรุณาตรวจสอบใหม่อีกครั้ง'

            ));
            exit();
        }
    }



    //logout ออกจากระบบ

    function logout()

    {

        $sess_array = array('admin_id', 'admin_name', 'admin_position');

        $this->session->unset_userdata($sess_array);

        redirect('/');
    }
}

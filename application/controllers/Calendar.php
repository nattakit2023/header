<?php


defined('BASEPATH') or exit('No direct script access allowed');


class Calendar extends CI_Controller

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

    function tblCalendar()
    {

        $month = $this->input->post('month') + 1;

        $year = $this->input->post('year');

        $where_arr = array(
            'due_date >=' => date($year . '-' . $month . '-1'),
            'end_date <=' => date($year . '-' . $month . '-31'),
            'ves_maintenance' => 'Preventive Maintenance'
        );

        $data['vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', '');
        $data['engineer'] = $this->Function_model->fetchDataResult('tbl_engineer', '');
        $data['service'] = $this->Function_model->fetchDataResult('tbl_service', $where_arr, 'due_date', 'ASC');

        return $this->load->view('components/tbl_calendar', $data);
    }

    function tblCalendar2()
    {

        $month = $this->input->post('month') + 1;

        $year = $this->input->post('year');

        $where_arr = array(
            'due_date >=' => date($year . '-' . $month . '-1'),
            'end_date <=' => date($year . '-' . $month . '-31')
        );

        $data['vessel'] = $this->Function_model->fetchDataResult('tbl_vessel_name', '');
        $data['pms'] = $this->Function_model->fetchDataResult('tbl_pms_job', $where_arr, 'due_date', 'ASC');

        return $this->load->view('components/tbl_calendar2', $data);
    }

    function tblCalendar3()
    {

        $month = $this->input->post('month') + 1;

        $year = $this->input->post('year');

        $where_arr = array(
            'due_date >=' => date($year . '-' . $month . '-1'),
            'end_date <=' => date($year . '-' . $month . '-31'),
            'service_invoice' => '',
            'pms_invoice' => ''
        );

        $data['event'] = $this->Function_model->fetchDataResult('tbl_calendar', $where_arr, 'due_date', 'ASC');

        return $this->load->view('components/tbl_calendar3', $data);
    }

    function createCalendar()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }
        $due_date = $this->input->post('due_date');

        $end_date = $this->input->post('end_date');

        $title = $this->input->post('title');

        $descript = $this->input->post('descript');

        $color = $this->input->post('color');

        if ($due_date == null || $end_date == null || $title == null || $descript == null || $color == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Data Not Found'

            ]);

            exit();
        }

        $data = [

            'due_date' => $due_date,

            'end_date' => $end_date,

            'title'    => $title,

            'descript' => $descript,

            'color'    => $color
        ];

        $res = $this->Function_model->insertData('tbl_calendar', $data);

        if ($res == true) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'Created Successful'
            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Created Calendar Fail'
            ]);

            exit();
        }
    }

    function delCalendar()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $id = $this->input->post('id');

        if ($id == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Data Not Found'
            ]);
        }

        $res = $this->Function_model->deleteData('tbl_calendar', ['id' => $id]);

        if ($res == true) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'Delete Success'
            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Wrong Delete Data'
            ]);

            exit();
        }
    }

    function editCalendar()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $id = $this->input->post('id');

        $due_date = $this->input->post('due_date');

        $end_date = $this->input->post('end_date');

        $title = $this->input->post('title');

        $descript = $this->input->post('descript');

        $color = $this->input->post('color');

        if ($due_date == null || $end_date == null || $title == null || $descript == null || $color == null) {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Data Not Found'

            ]);

            exit();
        }

        $data = [

            'due_date' => $due_date,

            'end_date' => $end_date,

            'title'    => $title,

            'descript' => $descript,

            'color'    => $color
        ];

        $res = $this->Function_model->updateData('tbl_calendar', ['id' => $id], $data);

        if ($res == true) {

            echo json_encode([

                'status' => 'SUCCESS',

                'message' => 'Edit Calendar Success',

                'id' => $id
            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Edit Calendar Fail'
            ]);

            exit();
        }
    }

    function get_calendar()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $id = $this->input->post('cal_id');

        $res = $this->Function_model->getDataRow('tbl_calendar', ['id' => $id]);

        if ($res == true) {

            echo json_encode([

                'status' => 'SUCCESS',

                'data' => [

                    'id' => $res->id,

                    'due_date' => $res->due_date,

                    'end_date' => $res->end_date,

                    'title' => $res->title,

                    'descript' => $res->descript,

                    'color' => $res->color,

                    'header' => ' ( ' . $res->due_date . ' - ' . $res->end_date . ' )'
                ]
            ]);
        }
    }
}

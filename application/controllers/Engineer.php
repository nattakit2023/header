<?php



defined('BASEPATH') or exit('No direct script access allowed');


class Engineer extends CI_Controller

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

    //-------------------------------------------------------E N G I N E E R-------------------------------------------------------------

    function get_engineer()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $id = $this->input->post('id');

        $res = $this->Function_model->getDataRow('tbl_engineer', ['id' => $id]);

        if ($res == true) {

            echo json_encode([

                'status' => 'SUCCESS',

                'engineer' => $res->engineer,

                'id' => $res->id

            ]);

            exit();
        } else {

            echo json_encode([

                'status' => 'ERROR',

                'message' => 'Data Not Found'
            ]);

            exit();
        }
    }

    function add_detail_engineer()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $id = $this->input->post('id');

        $detail = $this->input->post('detail');

        if ($id == null || $detail == null) {
        }

        $where = [
            'id' => $id
        ];

        $data = [
            'detail_engineer' => $detail
        ];

        $res = $this->Function_model->updateData('tbl_engineer', $where, $data);

        if ($res == true) {
            echo json_encode([
                'status' => 'SUCCESS',

                'message' => 'Add Detail For Engineer Success'
            ]);
        } else {
            echo json_encode([
                'status' => 'ERROR',

                'message' => 'Have Not Engineer in Job Order'
            ]);
        }
    }
}

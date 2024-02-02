<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends CI_Controller

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

    function chart_job()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $start = $this->input->post('start');
        $end = $this->input->post('end');

        $over_due = $on_service = $delay = 0;
        $where_pm = [
            'due_date >=' => $start,
            'due_date <=' => $end,
            'ves_maintenance' => 'Preventive Maintenance',
            'ves_installation' => 'false'
        ];

        $where_cm = [
            'due_date >=' => $start,
            'due_date <=' => $end,
            'ves_maintenance' => 'Corrective Maintenance',
            'ves_installation' => 'false'
        ];

        $where_install = [
            'due_date >=' => $start,
            'due_date <=' => $end,
            'ves_installation' => 'true'
        ];

        $where_uninstall = [
            'due_date >=' => $start,
            'due_date <=' => $end,
            'ves_maintenance' => 'Uninstall'
        ];

        $pms = $this->Function_model->joinTable(
            'a.due_date as plan_due, a.end_date as plan_end, b.due_date as work_due, b.end_date as work_end',
            'tbl_pms_job a',
            'tbl_service b',
            'a.to_invoice = b.service_invoice',
        );

        $cm = $this->Function_model->joinTable(
            'a.due_date as plan_due, a.end_date as plan_end, b.due_date as work_due, b.end_date as work_end',
            'tbl_cm_job a',
            'tbl_service b',
            'a.to_invoice = b.service_invoice',
        );

        foreach ($pms as $index) {
            if (strtotime(date($index->work_due)) >= strtotime(date($index->plan_due)) && strtotime(date($index->work_end)) <= strtotime(date($index->plan_end))) {
                $on_service++;
            } else if (strtotime(date($index->work_due)) <= strtotime(date($index->plan_end)) && strtotime(date($index->work_end)) >= strtotime(date($index->plan_end))) {
                $delay++;
            } else if (strtotime(date($index->work_due)) > strtotime(date($index->plan_end))) {
                $over_due++;
            }
        }

        foreach ($cm as $index) {
            if (strtotime(date($index->work_due)) >= strtotime(date($index->plan_due)) && strtotime(date($index->work_end)) <= strtotime(date($index->plan_end))) {
                $on_service++;
            } else if (strtotime(date($index->work_due)) <= strtotime(date($index->plan_end)) && strtotime(date($index->work_end)) >= strtotime(date($index->plan_end))) {
                $delay++;
            } else if (strtotime(date($index->work_due)) > strtotime(date($index->plan_end))) {
                $over_due++;
            }
        }

        $data['service'] = [
            count($this->Function_model->fetchDataResult('tbl_service', $where_install)),
            count($this->Function_model->fetchDataResult('tbl_service', $where_uninstall)),
            count($this->Function_model->fetchDataResult('tbl_service', $where_pm)),
            count($this->Function_model->fetchDataResult('tbl_service', $where_cm))
        ];

        $data['pms'] = [$on_service, $delay, $over_due];

        $this->load->view('components/tbl_dashboard_chart', $data);
    }

    function calibrate_job()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $where = [
            'b.due_date' => $start,
            'b.end_date' => $end
        ];

        $data['service'] = $this->Function_model->joinTable(
            'a.due_date as pms_due, a.end_date as pms_end, b.due_date as job_due, b.end_date as job_end',
            'tbl_pms_job a',
            'tbl_service b',
            'a.to_invoice = b.service_invoice',
            $where,
            'service_invoice',
            'ASC'
        );

        $this->load->view('components/tbl_calibrate', $data);
    }

    function tblContract()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            show_404();
            exit();
        }

        $data['contract'] = $this->Function_model->fetchDataResult('tbl_service', ['ves_installation' => 'true'], 'service_invoice', 'ASC');

        $this->load->view('components/tbl_contract', $data);
    }
}

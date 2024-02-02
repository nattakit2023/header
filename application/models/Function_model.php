<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Function_model extends CI_Model

{

    function getData($table, $where_array)

    {

        $this->db->where($where_array);

        return $this->db->get($table);
    }



    function getDataRow($table, $where_array)

    {

        $this->db->where($where_array);

        return $this->db->get($table)->row();
    }



    function fetchDataResult($table, $where_array = null, $order_key = null, $order_by = null)

    {

        if ($where_array != null) {

            $this->db->where($where_array);
        }

        if ($order_key != null && $order_by != null) {

            $this->db->order_by($order_key, $order_by);
        }

        return $this->db->get($table)->result();
    }



    function insertData($table, $data_array)

    {

        $this->db->insert($table, $data_array);

        if ($this->db->affected_rows() == 1) {

            return TRUE;
        } else {

            return FALSE;
        }
    }



    function insertDataMultiple($table, $data_array)

    {

        $this->db->insert_batch($table, $data_array);

        if ($this->db->affected_rows() >= 1) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

    function joinTable($select, $table1, $table2, $column_join, $where_array = null,  $order_key = null, $order_by = null)
    {
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2, $column_join, 'left');
        if ($where_array != null) {
            $this->db->where($where_array);
        }
        if ($order_key != null && $order_by != null) {
            $this->db->order_by($order_key, $order_by);
        }
        return $this->db->get()->result();
    }

    // function joinTables($select, $from_table, $to_table = [], $column_join, $where_array,  $order_key = null, $order_by = null)
    // {
    //     $this->db->select($select);
    //     $this->db->from($from_table);
    //     for ($cou = 0; $cou < count($to_table); $cou++) {
    //         $this->db->join($to_table[0], $column_join[0], 'left');
    //     }
    //     if ($order_key != null && $order_by != null) {
    //         $this->db->order_by($order_key, $order_by);
    //     }
    //     return $this->db->get()->result();
    // }


    function deleteData($table, $where_array)

    {

        $this->db->where($where_array);

        $this->db->delete($table);

        if ($this->db->affected_rows()) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

    function updateData($table, $where_array, $data_array)

    {

        $this->db->where($where_array);

        $this->db->update($table, $data_array);

        return TRUE;
    }

    //GET SUM COLUMN

    function getSum($table, $sum_column, $where_array = null)

    {

        $this->db->select_sum($sum_column);

        $this->db->from($table);

        if ($where_array != null) {

            $this->db->where($where_array);
        }

        return $this->db->get()->row()->$sum_column;
    }

    //ออกเลบใบส่งซ่อม service invoice

    function genInvoice()

    {

        $where_arr = [

            'due_date >=' => date('Y-01-01'),

            'due_date <=' => date('Y-12-31')

        ];

        //หาจำนวนข้อมูล

        $this->db->where($where_arr);

        $service = $this->db->get('tbl_service')->result();

        if (count($service) == 0) {

            $number_invoice = date('y') . sprintf('%04d', '1');
        } else {

            $number_invoice = date('y') . sprintf('%04d', count($service));
        }



        $this->db->where('service_invoice', $number_invoice);

        $check_invoice = $this->db->get('tbl_service')->row();

        //ตรวจสอบเลขซ้ำ

        while ($check_invoice != null) {

            $number_invoice++;

            $this->db->where('service_invoice', $number_invoice);

            $check_invoice = $this->db->get('tbl_service')->row();
        }

        return $number_invoice;
    }

    function genPMS()

    {

        $where_arr = [

            'due_date >=' => date('Y-01-01'),

            'due_date <=' => date('Y-12-31')

        ];

        //หาจำนวนข้อมูล

        $this->db->where($where_arr);

        $service = $this->db->get('tbl_pms_job')->result();

        if (count($service) == 0) {

            $number_invoice = date('y') . sprintf('%04d', '1');
        } else {

            $number_invoice = date('y') . sprintf('%04d', count($service));
        }

        $this->db->where('pms_invoice', 'PMS' . $number_invoice);

        $check_invoice = $this->db->get('tbl_pms_job')->row();

        //ตรวจสอบเลขซ้ำ

        while ($check_invoice != null) {

            $number_invoice++;

            $this->db->where('pms_invoice', 'PMS' . $number_invoice);

            $check_invoice = $this->db->get('tbl_pms_job')->row();
        }

        return $number_invoice;
    }

    function genCM()

    {

        $where_arr = [

            'due_date >=' => date('Y-01-01'),

            'due_date <=' => date('Y-12-31')

        ];

        //หาจำนวนข้อมูล

        $this->db->where($where_arr);

        $service = $this->db->get('tbl_cm_job')->result();

        if (count($service) == 0) {

            $number_invoice = date('y') . sprintf('%04d', '1');
        } else {

            $number_invoice = date('y') . sprintf('%04d', count($service));
        }

        $this->db->where('cm_invoice', 'CM' . $number_invoice);

        $check_invoice = $this->db->get('tbl_cm_job')->row();

        //ตรวจสอบเลขซ้ำ

        while ($check_invoice != null) {

            $number_invoice++;

            $this->db->where('cm_invoice', 'CM' . $number_invoice);

            $check_invoice = $this->db->get('tbl_cm_job')->row();
        }

        return $number_invoice;
    }

    function notify_line($service_invoice, $engineer, $message)
    {
        $token = "aOQ43KJ6pn623siACkh3zbCtRtxrGB32mVe4WeLLCke"; // Line Notify Support
        //$token = "Wq0HPXFx0ou0TIVDHCX0KztKNRq5daZeSejEmZ0YqXQ"; // Line Notify Test
        //Message
        $mymessage = "Job Order : $service_invoice \n"; //Set new line with '\n'
        $mymessage .= "$message \n";
        $mymessage .= "support.shipexpert.info/pages/service_detail/$service_invoice \n";

        if ($engineer == '') {
            $mymessage .= "Management : MR. Kirk Vilaimal";
        } else if ($engineer == 'Edit') {
            $mymessage .= "Admin : PhornPhen Saksirisamphun";
        } else {
            $mymessage .= "Engineer :";
            $i = 1;
            foreach ($engineer as $item) {
                $mymessage .= "$item->engineer ";
                if ($i < count($engineer)) {
                    $mymessage .= ",";
                    $i++;
                }
            }
        }
        $data = array(
            'message' => $mymessage,
        );
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, $data);
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer ' . $token,);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        //Check error
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
        }
    }

    function notify_email($service_invoice, $engineer, $subject)
    {
        $data['service'] = $this->Function_model->getDataRow('tbl_service', ['service_invoice' => $service_invoice]);

        $data['engineer'] = $engineer;

        $mail = new PHPMailer();


        $mail->CharSet = "utf-8";
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->SMTPAuth = true; // Enable smtp authentication
        $mail->SMTPSecure = 'ssl'; // Enable "tls" encryption, "ssl" also accepted
        $mail->Host = "cat167-26.static.lnwhostname.com"; // SMTP server "smtp.yourdomain.com" หรือ TLS/SSL : hostname By Nakhonitech : "xxx.nakhonitech.com"
        $mail->Port = 465; // พอร์ท SMTP 25 / SSL: 465 or 587 / TLS: 587
        $mail->Username = "dev_it@innostellar.com"; // account SMTP
        $mail->Password = ".ljvtwidHwfh1152"; // รหัสผ่าน SMTP

        $mail->SetFrom("dev_it@innostellar.com", "Job Order");
        $mail->AddReplyTo("dev_it@innostellar.com", "Job Order");
        $mail->Subject = "$subject" . "$service_invoice";
        $body = $this->load->view('print/service_notify_email', $data, true);
        $mail->MsgHTML($body);

        if ($engineer == '') {
            //$mail->AddAddress("kirk@shipexpert.net", "MR.Kirk Vilaimal"); // ผู้รับคนที่หนึ่ง
        } else if ($engineer == 'Edit') {
            //$mail->AddAddress("phornphen@shipexpert.net", "K.Phornphen Saksirisamphun"); // ผู้รับคนที่หนึ่ง
        } else {
            foreach ($engineer as $item) {
                $engin = str_split($item->engineer);
                $empty = strpos($item->engineer, ' ');
                $name = "";
                for ($count = 0; $count < $empty; $count++) {
                    $name = $name . $engin[$count];
                }
                $mail->AddAddress("$name@shipexpert.net", "$item->engineer"); // ผู้รับคนที่หนึ่ง
            }
        }

        $mail->send();
    }
}

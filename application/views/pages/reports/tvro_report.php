<style>
    .header {
        border-collapse: collapse;
        width: 100%;
    }

    .header td {
        border: 1px solid #333;
    }

    .info {
        border-collapse: collapse;
        border: 1px solid #333;
        width: 100%;
    }

    .info td {
        padding: 10px 10px 10px;
    }

    .tabledetail {
        border-collapse: collapse;
        border: 1px solid #333;


    }

    .tabledetail .tabledata {
        width: 100%;
        border-collapse: collapse;
    }

    .tabledetail .tabledata td {
        padding-left: 10px;
    }

    .tableheaderdetail {
        border-collapse: collapse;
        border: 1px solid #333;
        width: 100%;
        font-size: 16px;
    }

    .tableheaderdetail td {
        padding-left: 10px;
    }

    .tableremark {
        border-collapse: collapse;
        width: 100%;
    }

    .tableremark td {
        width: 50%;
        padding: 10px 10px 10px;
    }

    .textcenter {
        text-align: center;
    }
</style>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><i class="fas fa-tools"></i><strong> <?= $title ?></strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">Index</a></li>

                        <li class="breadcrumb-item active"><?= $title ?></li>

                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12 mb-2">

                    <div class="card rounded-0">

                        <div class="card-header bg-dark rounded-0">

                            <?= $title ?>

                        </div>


                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <table class="header">
                                        <tbody>
                                            <tr>
                                                <td rowspan="3" style="width:150px;">

                                                    <img src="https://support.shipexpert.info/assets/img/logo.png" alt="" style="max-width: 150px;">

                                                </td>
                                                <td></td>
                                                <td colspan="2" rowspan="3" style="text-align: center;">

                                                    <h3> <strong> Preventive Maintenance Report</strong></h3>

                                                </td>
                                                <td rowspan="3" style="padding-left: 5px;width:150px;">

                                                    Management<br>Infomation<br>System

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12 ">
                                    <table class="info">
                                        <tr>
                                            <td style="width: 12%;">
                                                <strong>Company</strong>
                                            </td>
                                            <td style="width: 38%;">
                                                <u><?= $service->cus_name ?></u>
                                            </td>
                                            <td style="width: 12%;">

                                            </td>
                                            <td style="width: 38%;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Vessel location</strong>
                                            </td>
                                            <td>
                                                <input type="text" id="ves_location" class="form-control rounded-0" placeholder="Vessel location">
                                            </td>
                                            <td>
                                                <strong>Vessel Name</strong>
                                            </td>
                                            <td>
                                                <input type="text" id="ves_name" class="form-control rounded-0" value="<?php $i = 1;
                                                                                                                        foreach ($vessel as $item) {
                                                                                                                            echo $item->ves_name;
                                                                                                                            if ($i > 1) {
                                                                                                                                echo ",";
                                                                                                                            }
                                                                                                                            $i++;
                                                                                                                        } ?>" placeholder="Vessel Name" disabled>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-md-12">
                                    <div class="tabledetail">

                                        <table class="tabledata">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <strong>1) TVRO Phsical Check</strong>
                                                    </td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 20%;"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>1.1) TVRO Equipment</strong>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.1) Antenna (Monkey Island)</strong>
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        Checked/Not
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Physical Connector & Cables
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro1_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <hr>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.2) ACU</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Front Panel
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Front Panel Status
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Power On
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro2_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Tracking ( THAICOM 5/8) 078.5E
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro2_2">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - LOCK Status
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro2_3">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <strong><u>If Not Pass Check Antenna Cables</u></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Clean-Up
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro2_4">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Connector & Cables
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro2_5">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.3) NVR Status</strong>
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        Checked/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check green light status
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro3_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Checked">Checked</option>
                                                            <option value="Not Checked">Not Checked</option>
                                                        </select>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Clean-UP
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro3_2">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Checked">Checked</option>
                                                            <option value="Not Checked">Not Checked</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Connector & Cables
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro3_3">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Checked">Checked</option>
                                                            <option value="Not Checked">Not Checked</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.4) TV Splitter 2-8 Ways</strong>
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        Checked/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Connector & Cables
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro4_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Checked">Checked</option>
                                                            <option value="Not Checked">Not Checked</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.5) Signal test by per receiver box</strong>
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check open all channel
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="tvro5_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <table class="tableremark">
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Customer Remark :</strong></strong><textarea id="customer_remark" class="form-control rounded-0" placeholder="Remark" required></textarea>

                                                </td>
                                                <td>
                                                    <strong>Customer Comment :</strong></strong><textarea id="customer_comment" class="form-control rounded-0" placeholder="Remark" required></textarea>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12 mt-2">

                                        <button id="create" class="btn btn-primary rounded-0">Create</button>

                                        <button onclick="clearForm()" class="btn btn-default rounded-0">Clear</button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

    </section>

</div>


<script>
    //-------------------------------------------------------------------------S C R I P T-----------------------------------------------------------------------------------

    //clear form

    function clearFormAll() {

        $('#').val('');

        $('#').val('');

        $('#').val('');

    }

    function checked_disabled(value) {
        if ($('#done' + value).prop('checked')) {
            $("#tvro" + value).prop("disabled", false);
        } else {
            $("#tvro" + value).prop("disabled", true);
        }
    }


    $(document).ready(function() {



    });



    // Create ATP

    $(document).on('click', '#create', function() {

        let tvro1_1 = $('#tvro1_1').val();
        let tvro2_1 = $('#tvro2_1').val();
        let tvro2_2 = $('#tvro2_2').val();
        let tvro2_3 = $('#tvro2_3').val();
        let tvro2_4 = $('#tvro2_4').val();
        let tvro2_5 = $('#tvro2_5').val();
        let tvro3_1 = $('#tvro3_1').val();
        let tvro3_2 = $('#tvro3_2').val();
        let tvro3_3 = $('#tvro3_3').val();
        let tvro4_1 = $('#tvro4_1').val();
        let tvro5_1 = $('#tvro5_1').val();
        let customer_remark = $('#customer_remark').val();
        let customer_comment = $('#customer_comment').val();
        let ves_location = $('#ves_location').val();

        var formdata = new FormData();

        formdata.append('service_invoice', '<?= $service->service_invoice ?>');
        formdata.append('pms', '<?= $pms ?>');
        formdata.append('tvro1_1', tvro1_1);
        formdata.append('tvro2_1', tvro2_1);
        formdata.append('tvro2_2', tvro2_2);
        formdata.append('tvro2_3', tvro2_3);
        formdata.append('tvro2_4', tvro2_4);
        formdata.append('tvro2_5', tvro2_5);
        formdata.append('tvro3_1', tvro3_1);
        formdata.append('tvro3_2', tvro3_2);
        formdata.append('tvro3_3', tvro3_3);
        formdata.append('tvro4_1', tvro4_1);
        formdata.append('tvro5_1', tvro5_1);
        formdata.append('customer_remark', customer_remark);
        formdata.append('customer_comment', customer_comment);
        formdata.append('ves_location', ves_location);

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

            text: "ต้องการสร้างรายการซ่อมนี้?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowEscapeKey: false,

                    allowOutsideClick: false,

                    html: 'กำลังสร้างรายการ กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>report/createReport',

                            method: 'POST',

                            dataType: 'JSON',

                            data: formdata,

                            processData: false,

                            contentType: false,

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'สร้างรายการซ่อมสำเร็จ',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    setTimeout(function() {

                                        window.location.assign('<?= base_url(); ?>pages/report/<?= $pms ?>');

                                    }, 1500);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด!',

                                        text: res.message,

                                        confirmButtonText: 'ตกลง'

                                    });

                                    return false;

                                }

                            }

                        })

                    }

                })

            }

        })

    });
</script>
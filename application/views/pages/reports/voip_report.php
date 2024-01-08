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
                                                <td colspan="3" rowspan="3" style="text-align: center;">

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
                                        <tr>
                                            <td>
                                                <strong>VoIP IP</strong>
                                            </td>
                                            <td>
                                                <input type="text" id="voip_ip" class="form-control rounded-0" placeholder="IP Address">
                                            </td>
                                            <td>
                                                <strong>VoIP MAC Address</strong>
                                            </td>
                                            <td>
                                                <input type="text" id="voip_mac" class="form-control rounded-0" placeholder="MAC Address">
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
                                                        <strong>1) VoIP Physical Check</strong>
                                                    </td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 20%;"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>1.1) VoIP Equipment</strong>
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
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.1) VoIP Physical (Bridge Deck)</strong>
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Connector & Cables
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="voip1_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Clean-up
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="voip1_2">
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
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.2) VOIP Status (Bridge Deck)</strong>
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Panel Status " Registered " VoIP will show phone number
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="voip2_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <strong><u>If Not Pass Check Internet Connection</u></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check call back to shore
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="voip2_2">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check call back to vessel
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="voip2_3">
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
                                            </tbody>
                                        </table>
                                        <table class="tableremark">
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
            $("#voip" + value).prop("disabled", false);
        } else {
            $("#voip" + value).prop("disabled", true);
        }
    }


    $(document).ready(function() {



    });



    // Create ATP

    $(document).on('click', '#create', function() {

        let voip1_1 = $('#voip1_1').val();
        let voip1_2 = $('#voip1_2').val();
        let voip2_1 = $('#voip2_1').val();
        let voip2_2 = $('#voip2_2').val();
        let voip2_3 = $('#voip2_3').val();
        let customer_remark = $('#customer_remark').val();
        let customer_comment = $('#customer_comment').val();
        let ves_location = $('#ves_location').val();
        let voip_ip = $('#voip_ip').val();
        let voip_mac = $('#voip_mac').val();

        var formdata = new FormData();

        formdata.append('service_invoice', '<?= $service->service_invoice ?>');
        formdata.append('pms', '<?= $pms ?>');
        formdata.append('voip1_1', voip1_1);
        formdata.append('voip1_2', voip1_2);
        formdata.append('voip2_1', voip2_1);
        formdata.append('voip2_2', voip2_2);
        formdata.append('voip2_3', voip2_3);
        formdata.append('customer_remark', customer_remark);
        formdata.append('customer_comment', customer_comment);
        formdata.append('ves_location', ves_location);
        formdata.append('voip_ip', voip_ip);
        formdata.append('voip_mac', voip_mac);

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
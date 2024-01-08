<style>
    .header {
        border-collapse: collapse;
        width: 100%;
    }

    .header td {
        border: 1px solid #333;
    }

    .crop {
        border-collapse: collapse;
        border: 1px solid #333;
        width: 100%;
    }

    .info {
        border-collapse: collapse;
        border: 1px solid #333;
        width: 100%;
    }

    .info td {
        padding-left: 10px;
    }

    .data {
        margin-left: 0px;
        border-collapse: collapse;
        border: 1px solid #333;
        width: 100%;

    }

    .data .tabledata {
        width: 100%;
    }

    .data .tabledata td {
        height: 48px;
        padding: 5px 5px 5px;
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
                                            <td style="width: 7%;">
                                                User
                                            </td>
                                            <td style="width: 43%;">
                                                <input type="text" id="user" class="form-control rounded-0" placeholder="User">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Pc Location
                                            </td>
                                            <td>
                                                <input type="text" id="pc_location" class="form-control rounded-0" placeholder="Pc Location">
                                            </td>
                                            <td>
                                                WorkGroup
                                            </td>
                                            <td>
                                                <input type="text" id="workgroup" class="form-control rounded-0" placeholder="Workgroup">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Pc Name
                                            </td>
                                            <td>
                                                <input type="text" id="pc_name" class="form-control rounded-0" placeholder="Pc Name">
                                            </td>
                                            <td>
                                                IP
                                            </td>
                                            <td>
                                                <input type="text" id="pc_ip" class="form-control rounded-0" placeholder="IP Address">
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-md-12">
                                    <div class="row data">
                                        <div class="col-md-5">
                                            <table class="tabledata">
                                                <tbody>
                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            1) Re-Arrange Wire&Cable
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            2) Clean-Up
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Case (RAM?Cable/SW)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Monitor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Mouse
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Keyboard
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Environment
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            3) Network
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Switch
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Plug&Network Card
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - File Sharing
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            4) Update Antivirus Defination
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            5) Undo Card
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Markup new point
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Change password
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            6) Benchmark System Performance
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-1">
                                            <table class="tabledata">
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>Done</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done1" value="1" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_1" value="2_1" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_2" value="2_2" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_3" value="2_3" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_4" value="2_4" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_5" value="2_5" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done3_1" value="3_1" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done3_2" value="3_2" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done3_3" value="3_3" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done4" value="4" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done5" value="5" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done5_1" value="5_1" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done5_2" value="5_2" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done6" value="6" onclick="checked_disabled(value)"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <table class="tabledata">
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td style="width: 100%;">Select ( 1 - 5 )</td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms1">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms2_1">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms2_2">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms2_3">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms2_4">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms2_5">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms3_1">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms3_2">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms3_3">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="datetime-local" id="pms4" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= date('d-m-Y'); ?>" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms5">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="datetime-local" id="pms5_1" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= date('d-m-Y'); ?>" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" id="pms5_2" class="form-control rounded-0" placeholder="Password" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" disabled id="pms6">

                                                                <option value="0" selected disabled>Select Score</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row col-md-12" style="padding-top:10px; padding-bottom:10px;">
                                            <div class="col-md-6">

                                                Ship's Remark : <textarea id="ship_remark" class="form-control rounded-0" placeholder="Remark" required></textarea>

                                            </div>
                                            <div class="col-md-6">

                                                POS's Remark : <textarea id="pos_remark" class="form-control rounded-0" placeholder="Remark" required></textarea>

                                            </div>
                                        </div>
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
            $("#pms" + value).prop("disabled", false);
        } else {
            $("#pms" + value).prop("disabled", true);
        }
    }


    $(document).ready(function() {



    });



    // Create ATP

    $(document).on('click', '#create', function() {

        let pms1 = $('#pms1').val();
        let pms2_1 = $('#pms2_1').val();
        let pms2_2 = $('#pms2_2').val();
        let pms2_3 = $('#pms2_3').val();
        let pms2_4 = $('#pms2_4').val();
        let pms2_5 = $('#pms2_5').val();
        let pms3_1 = $('#pms3_1').val();
        let pms3_2 = $('#pms3_2').val();
        let pms3_3 = $('#pms3_3').val();
        let pms4 = $('#pms4').val();
        let pms5 = $('#pms5').val();
        let pms5_1 = $('#pms5_1').val();
        let pms5_2 = $('#pms5_2').val();
        let pms6 = $('#pms6').val();
        let ship = $('#ship_remark').val();
        let pos = $('#pos_remark').val();
        let user = $('#user').val();
        let pc_location = $('#pc_location').val();
        let pc_name = $('#pc_name').val();
        let pc_ip = $('#pc_ip').val();
        let workgroup = $('#workgroup').val();

        var formdata = new FormData();

        formdata.append('service_invoice', '<?= $service->service_invoice ?>');
        formdata.append('pms', '<?= $pms ?>');
        formdata.append('pms1', pms1);
        formdata.append('pms2_1', pms2_1);
        formdata.append('pms2_2', pms2_2);
        formdata.append('pms2_3', pms2_3);
        formdata.append('pms2_4', pms2_4);
        formdata.append('pms2_5', pms2_5);
        formdata.append('pms3_1', pms3_1);
        formdata.append('pms3_2', pms3_2);
        formdata.append('pms3_3', pms3_3);
        formdata.append('pms4', pms4);
        formdata.append('pms5', pms5);
        formdata.append('pms5_1', pms5_1);
        formdata.append('pms5_2', pms5_2);
        formdata.append('pms6', pms6);
        formdata.append('ship', ship);
        formdata.append('pos', pos);
        formdata.append('user', user);
        formdata.append('pc_location', pc_location);
        formdata.append('pc_name', pc_name);
        formdata.append('pc_ip', pc_ip);
        formdata.append('workgroup', workgroup);

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

                                        window.location.assign('<?= base_url(); ?>report/print_report/<?= $pms ?>?invoice=<?= $service->service_invoice ?>');

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
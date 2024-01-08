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
                                                <input type="text" id="company" class="form-control rounded-0" value="<?= $service->cus_name ?>" placeholder="Vessel location" disabled>
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
                                                <strong>PC IP</strong>
                                            </td>
                                            <td>
                                                <input type="text" id="pc_ip" class="form-control rounded-0" placeholder="IP Address">
                                            </td>
                                            <td>
                                                <strong>PC MAC Address</strong>
                                            </td>
                                            <td>
                                                <input type="text" id="mac_add" class="form-control rounded-0" placeholder="MAC Address">
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
                                                        <strong>1) VSAT's physical Check</strong>
                                                    </td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 20%;"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>1.1) VSAT Equipment</strong>
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
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Phisical Connector & Cables
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat1_1">
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
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.2) Modem (iDirect X7)</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Front Panel
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Front panel light status
                                                    </td>
                                                    <td class="textcenter">
                                                        Check
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        Green/Red
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Power
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done2_2" value="2_2" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_2" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Red">Red</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Green</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Status
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done2_3" value="2_3" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_3" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Red">Red</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Green</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Fan
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done2_4" value="2_4" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_4" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Red">Red</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Green</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Temp
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done2_5" value="2_5" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_5" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Red">Red</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Green</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - RX1
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done2_6" value="2_6" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_6" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Red">Red</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Green</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - RX2
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done2_7" value="2_7" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_7" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Red">Red</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Red</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - TX
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done2_8" value="2_8" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_8" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Red">Red</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Green</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - NET
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done2_9" value="2_9" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat2_9" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Red">Red</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Green</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.3) ACU</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Front Panel
                                                    </td>
                                                    <td class="textcenter">
                                                        Check
                                                    </td>
                                                    <td class="textcenter">
                                                        Tracking
                                                    </td>
                                                    <td class="textcenter">
                                                        Searching
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Front panel light status
                                                    </td>
                                                    <td class="textcenter">
                                                        <input type="checkbox" id="done3" value="3" onclick="checked_disabled(value)">
                                                    </td>
                                                    <td class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat3_1" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Tracking">Tracking</option>
                                                            <option value="Not Tracking">Not Tracking</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat3_2" disabled>
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Searching">Searching</option>
                                                            <option value="Not Searching">Not Searching</option>
                                                        </select>
                                                    </td>
                                                    <td class="textcenter"><strong><u>Must be Tracking</u></strong></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.4) Gateway & Switch Hub</strong>
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        Checked/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Physical Connector & Cables
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat4_1">
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
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.5) Rack physical Check</strong>
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check & Clean-up
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat5_1">
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
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.6) Access Point</strong>
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Power Status
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat6_1">
                                                            <option value="" selected disabled>Select Choice</option>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Not Pass">Not Pass</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check position or re-aligned
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat6_2">
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
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.7) UPS</strong>
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Function Test
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat7_1">
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
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat7_2">
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
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.8) Blockage Vertification</strong>
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        Pass/Not
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Blockage
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2" class="textcenter">
                                                        <select class="form-control select2 rouned-0" id="vsat8_1">
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
            if (value == '3') {
                $("#vsat" + value + "_1").prop("disabled", false);
                $("#vsat" + value + "_2").prop("disabled", false);
            } else {
                $("#vsat" + value).prop("disabled", false);

            }

        } else {
            if (value == '3') {
                $("#vsat" + value + "_1").prop("disabled", true);
                $("#vsat" + value + "_2").prop("disabled", true);
            } else {
                $("#vsat" + value).prop("disabled", true).val("");
            }
        }
    }


    $(document).ready(function() {



    });



    // Create ATP

    $(document).on('click', '#create', function() {
        let vsat1_1 = $('#vsat1_1').val();
        let vsat2_1 = $('#vsat2_1').val();
        let vsat2_2 = $('#vsat2_2').val();
        let vsat2_3 = $('#vsat2_3').val();
        let vsat2_4 = $('#vsat2_4').val();
        let vsat2_5 = $('#vsat2_5').val();
        let vsat2_6 = $('#vsat2_6').val();
        let vsat2_7 = $('#vsat2_7').val();
        let vsat2_8 = $('#vsat2_8').val();
        let vsat2_9 = $('#vsat2_9').val();
        let vsat3_1 = $('#vsat3_1').val();
        let vsat3_2 = $('#vsat3_2').val();
        let vsat4_1 = $('#vsat4_1').val();
        let vsat5_1 = $('#vsat5_1').val();
        let vsat6_1 = $('#vsat6_1').val();
        let vsat6_2 = $('#vsat6_2').val();
        let vsat7_1 = $('#vsat7_1').val();
        let vsat7_2 = $('#vsat7_2').val();
        let vsat8_1 = $('#vsat8_1').val();
        let customer_remark = $('#customer_remark').val();
        let customer_comment = $('#customer_comment').val();
        let ves_location = $('#ves_location').val();
        let pc_ip = $('#pc_ip').val();
        let mac_add = $('#mac_add').val();

        var formdata = new FormData();


        formdata.append('service_invoice', '<?= $service->service_invoice ?>');
        formdata.append('pms', '<?= $pms ?>');
        formdata.append('vsat1_1', vsat1_1);
        formdata.append('vsat2_1', vsat2_1);
        formdata.append('vsat2_2', vsat2_2);
        formdata.append('vsat2_3', vsat2_3);
        formdata.append('vsat2_4', vsat2_4);
        formdata.append('vsat2_5', vsat2_5);
        formdata.append('vsat2_6', vsat2_6);
        formdata.append('vsat2_7', vsat2_7);
        formdata.append('vsat2_8', vsat2_8);
        formdata.append('vsat2_9', vsat2_9);
        formdata.append('vsat3_1', vsat3_1);
        formdata.append('vsat3_2', vsat3_2);
        formdata.append('vsat4_1', vsat4_1);
        formdata.append('vsat5_1', vsat5_1);
        formdata.append('vsat6_1', vsat6_1);
        formdata.append('vsat6_2', vsat6_2);
        formdata.append('vsat7_1', vsat7_1);
        formdata.append('vsat7_2', vsat7_2);
        formdata.append('vsat8_1', vsat8_1);
        formdata.append('customer_remark', customer_remark);
        formdata.append('customer_comment', customer_comment);
        formdata.append('ves_location', ves_location);
        formdata.append('pc_ip', pc_ip);
        formdata.append('mac_add', mac_add);

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

                                        window.location.assign('<?= base_url(); ?>service/print_report?pms=<?= $pms ?>&invoice=<?= $service->service_invoice ?>');

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
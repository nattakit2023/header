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
                                                :&nbsp;<u><?= $service->cus_name ?></u>
                                            </td>
                                            <td style="width: 7%;">
                                                User
                                            </td>
                                            <td style="width: 43%;">
                                                :&nbsp;<u>หหหหห</u>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Pc Location
                                            </td>
                                            <td>
                                                :&nbsp;<u>หหหหห</u>
                                            </td>
                                            <td>
                                                WorkGroup
                                            </td>
                                            <td>
                                                :&nbsp;<u>หหหหห</u>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Pc Name
                                            </td>
                                            <td>
                                                :&nbsp;<u>หหหหห</u>
                                            </td>
                                            <td>
                                                IP
                                            </td>
                                            <td>
                                                :&nbsp;<u>หหหหห</u>
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
                                                        <td><input type="checkbox" id="done1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done2_5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done3_1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done3_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done3_3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done5_1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done5_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" id="done6"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <table class="tabledata">
                                                <tbody class="text-center">
                                                    <tr>

                                                        <td style="width: 100%;">Score ( 1 - 5 )</td>



                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2 rouned-0" id="pms1">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms2_1">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms2_2">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms2_3">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms2_4">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms2_5">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms3_1">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms3_2">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms3_3">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms4">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms5_1">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms5_2">

                                                                <option value="" selected disabled>Select Score</option>
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
                                                            <select class="form-control select2 rouned-0" id="pms6">

                                                                <option value="" selected disabled>Select Score</option>
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

                                                Ship's Remark : <textarea id="remark_create" class="form-control rounded-0" placeholder="Remark" required></textarea>

                                            </div>
                                            <div class="col-md-6">

                                                POS's Remark : <textarea id="remark_create" class="form-control rounded-0" placeholder="Remark" required></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

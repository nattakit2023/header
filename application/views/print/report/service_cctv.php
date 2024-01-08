<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">

    <title><?= $title; ?></title>

    <style>
        h1,

        h2,

        h3,

        h4,

        h5,

        h6,

        p {

            padding: 0px;

            margin: 0px;

        }


        /*---------------------------------------------------------------------------- Header Job ---------------------------------------------------------------------------- */

        .tableheader {
            border-collapse: collapse;
            width: 100%;
        }

        .tableheader td {
            border: 1px solid #333;
        }

        /*---------------------------------------------------------------------- Header Service Detail ---------------------------------------------------------------------- */

        .tableheaderdetail {
            border-collapse: collapse;
            border: 1px solid #333;
            width: 100%;
            font-size: 16px;
        }

        .tableheaderdetail td {
            padding-left: 10px;
        }

        /*-------------------------------------------------------------------------- Service Detail -------------------------------------------------------------------------- */

        .tabledetail {
            border-collapse: collapse;
            border: 1px solid #333;


        }

        .tabledetail .tabledata {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }





        /*-------------------------------------------------------------------------- Remark Detail -------------------------------------------------------------------------- */

        .tableremark {
            border-collapse: collapse;
            width: 100%;
        }

        .tableremark td {
            width: 50%;
            padding: 10px 10px 10px;
        }

        /*------------------------------------------------------------------------ Add Service Detail ------------------------------------------------------------------------ */


        /*  */

        .tablesign {
            border-collapse: collapse;
        }

        .tablesign td {
            text-align: center;
        }

        .bg-dark {

            background-color: #333;

        }

        .bg-deep {
            background-color: rgb(170, 230, 255);
        }


        .text-white {

            color: white;

        }

        .textcenter {
            text-align: center;
        }
    </style>

</head>



<body>

    <?php

    $startYear = date('Y', strtotime($service->create_date)) + 543;

    //หาวันปัจจุบันเป็นไทย

    $todayYear = date('Y', strtotime(date('Y-m-d'))) + 543;

    ?>

    <table class="tableheader">
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


    <table class="tableheaderdetail">
        <tr>
            <td style="width: 15%;">
                <strong>Company</strong>
            </td>
            <td style="width: 35%;">
                : <u><?= $service->cus_name ?></u>
            </td>
            <td style="width: 15%;">

            </td>
            <td style="width: 35%;">

            </td>
        </tr>
        <tr>
            <td>
                <strong>Vessel location</strong>
            </td>
            <td>
                : 
            </td>
            <td>
                <strong>Vessel Name</strong>
            </td>
            <td>
                : <?php $i = 1;
                    foreach ($vessel as $item) {
                        echo $item->ves_name;
                        if ($i < count($vessel)) {
                            echo ',';
                        }
                        $i++;
                    } ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>NVR IP</strong>
            </td>
            <td>
                : <?= $report->nvr_ip ?>
            </td>
            <td>
                <strong> NVR MAC Address</strong>
            </td>
            <td>
                : <?= $report->nvr_mac ?>
            </td>
        </tr>
    </table>


    <div class="tabledetail">

        <table class="tabledata">
            <tbody>
                <tr>
                    <td style="width: 50%;">
                        <strong>1) CCTV Online Physical Check</strong>
                    </td>
                    <td style="width: 10%;"></td>
                    <td style="width: 10%;"></td>
                    <td style="width: 10%;"></td>
                    <td style="width: 20%;"></td>
                </tr>
                <tr>
                    <td>
                        <strong>1.1) CCTV Online Equipment</strong>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.1) CAMERA (Monkey Island)</strong>
                    </td>
                    <td class="textcenter">
                        Pass
                    </td>
                    <td class="textcenter">

                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check CAMERA's BOW Physical Connector & Cables
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv1_1 == "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check CAMERA's ASTREN Physical Connector & Cables
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv1_2 == "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.2) CAMERA (Bridge Deck)</strong>
                    </td>
                    <td class="textcenter">
                        Pass
                    </td>
                    <td class="textcenter">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check CAMERA's Bridge BOW Physical Connector & Cables
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv2_1 == "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check CAMERA's Bridge ASTREN Physical Connector & Cables
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv2_2 == "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
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
                    <td class="textcenter">
                        Pass
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Physical Check
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv3_1 == "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Check Front Panel
                    </td>
                    <td class="textcenter">
                        Green
                    </td>
                    <td class="textcenter">
                        Red
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Power
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv3_2 === "Green") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv3_2 === "Red") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Status
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv3_3 === "Green") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv3_3 === "Red") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - TxRx
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv3_4 === "Green") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv3_4 === "Red") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.4) Rack Physical Check</strong>
                    </td>
                    <td class="textcenter">
                        Check
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check &Clean-up
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv4_1 == "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.5) UPS</strong>
                    </td>
                    <td class="textcenter">
                        Pass
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Function Test
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv5_1 == "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Clean-up
                    </td>
                    <td class="textcenter">
                        <?php if ($report->cctv5_2 == "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
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
                    <strong>Customer Remark :</strong> <?= $report->customer_remark ?>

                </td>
            </tr>
            <tr>
                <td>
                    <strong>Customer Comment :</strong> <?= $report->customer_comment ?>
                </td>
            </tr>
        </table>
    </div>





    <!--ลายเซ็น -->

    <div style="padding-top:50px; ">

        <table class="tablesign" style="width: 100%">

            <tr>

            </tr>

            <tr>

                <td style="padding-top: 30px;">.........................................................</td>

                <td style="padding-top: 30px;">.........................................................</td>

            </tr>

            <tr>
                <td>
                    ......../......../........
                </td>

                <td>
                    ......../......../........
                </td>
            </tr>

            <tr>
                <td>
                    Duty Officer Signature/Ship's Stamp
                </td>

                <td>
                    Service Engineer
                </td>
            </tr>

        </table>

    </div>

</body>




</html>
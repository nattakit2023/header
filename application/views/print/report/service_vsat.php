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

        .tabledetail .tabledata .bd-top {
            border-top: 1px solid #333;
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
                : <?= $service->cus_name ?>
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
                : <?= $report->ves_location ?>
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
                <strong>Pc IP</strong>
            </td>
            <td>
                : <?= $report->pc_ip ?>
            </td>
            <td>
                <strong>Pc MAC Address</strong>
            </td>
            <td>
                : <?= $report->mac_add ?>
            </td>
        </tr>
    </table>


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
                    <td class="textcenter">
                        Pass
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Phisical Connector & Cables
                    </td>
                    <td class="textcenter">
                        <?php if ($report->vsat1_1 = "Pass") : ?>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.2) Modem (iDirect X7)</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Front Panel
                    </td>
                    <td class="textcenter">
                        <strong>Pass</strong>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="textcenter">
                        <?php if ($report->vsat2_1 = "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Front panel light status
                    </td>
                    <td class="textcenter">
                        <strong>Check</strong>
                    </td>
                    <td class="textcenter">
                        <strong>Green</strong>
                    </td>
                    <td class="textcenter">
                        <strong>Red</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Power
                    </td>
                    <?php if ($report->vsat2_2 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_2 == "Green") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_2 == "Red") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php endif; ?>
                    <td><strong><u>Must be Green</u></strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Status
                    </td>
                    <?php if ($report->vsat2_3 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_3 == "Green") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_3 == "Red") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>

                    <?php endif; ?>
                    <td><strong><u>Must be Green</u></strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Fan
                    </td>
                    <?php if ($report->vsat2_4 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_4 == "Green") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_4 == "Red") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>

                    <?php endif; ?>
                    <td><strong><u>Must be Green</u></strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Temp
                    </td>
                    <?php if ($report->vsat2_5 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_5 == "Green") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_5 == "Red") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>

                    <?php endif; ?>
                    <td><strong><u>Must be Green</u></strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - RX1
                    </td>
                    <?php if ($report->vsat2_6 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_6 == "Green") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_6 == "Red") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>

                    <?php endif; ?>
                    <td><strong><u>Must be Green</u></strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - RX2
                    </td>
                    <?php if ($report->vsat2_7 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_7 == "Green") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_7 == "Red") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>

                    <?php endif; ?>
                    <td><strong><u>Must be Red</u></strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - TX
                    </td>
                    <?php if ($report->vsat2_8 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_8 == "Green") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_8 == "Red") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>

                    <?php endif; ?>
                    <td><strong><u>Must be Green</u></strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - NET
                    </td>
                    <?php if ($report->vsat2_9 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_9 == "Green") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat2_9 == "Red") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>

                    <?php endif; ?>
                    <td><strong><u>Must be Green</u></strong></td>
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
                    <?php if ($report->vsat3_1 != null) : ?>
                        <td class="textcenter">
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat3_1 == "Tracking") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                        <td class="textcenter">
                            <?php if ($report->vsat3_1 == "Searching") : ?>
                                <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                            <?php endif; ?>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                        <td></td>

                    <?php endif; ?>
                    <td><strong><u>Must be Tracking</u></strong></td>
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
                    <td class="textcenter">
                        Check
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Physical Connector & Cables
                    </td>
                    <td class="textcenter">
                        <?php if ($report->vsat4_1 = "Checked") : ?>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.5) Rack physical Check</strong>
                    </td>
                    <td class="textcenter">
                        Pass
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check & Clean-up
                    </td>
                    <td class="textcenter">
                        <?php if ($report->vsat5_1 = "Pass") : ?>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.6) Access Point</strong>
                    </td>
                    <td class="textcenter">
                        Pass
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Power Status
                    </td>
                    <td class="textcenter">
                        <?php if ($report->vsat6_1 = "Pass") : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php else : ?>
                            <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 20px;"></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check position or re-aligned
                    </td>
                    <td class="textcenter">
                        <?php if ($report->vsat6_2 = "Pass") : ?>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.7) UPS</strong>
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
                        <?php if ($report->vsat7_1 = "Pass") : ?>
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
                        <?php if ($report->vsat7_1 = "Pass") : ?>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.1.8) Blockage Vertification</strong>
                    </td>
                    <td class="textcenter">
                        Pass
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Check Blockage
                    </td>
                    <td class="textcenter">
                        <?php if ($report->vsat2_1 = "Pass") : ?>
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
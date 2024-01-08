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

        .textcenter {
            text-align: center;
        }

        .tableheader {
            width: 100%;

        }

        .tableheader td,
        .tableheader th {
            padding-left: 50px;
            width: 50%;
            height: 20px;

        }

        .tableheaderdetail {
            border-collapse: collapse;
            width: 100%;
        }

        .tableheaderdetail td {
            border: 1px solid #333;
            height: 20px;
        }

        .tabledetail {
            border-collapse: collapse;
            width: 100%;
        }

        .tabledetail td {
            border: 1px solid #333;
            height: 20px;
            text-align: center;
        }



        .tablesign {
            border-collapse: collapse;
        }

        .tablesign td {
            border: 1px solid #333;
            height: 40px;

        }

        .tablehistory {
            border-collapse: collapse;
            width: 100%;

        }

        .tablehistory td {
            border: 1px solid #333;
            padding-left: 10px;
            height: 25px;
        }

        .container {
            padding-top: 30px;
        }

        .container .detail {
            padding-top: 30px;
        }

        .container .detail .data {
            padding-left: 30px;
        }

        .table {

            border-collapse: collapse;

        }



        .table th,

        .table td {

            border: 1px solid #333;

        }



        .table td {

            padding-left: 5px;

        }



        .bg-dark {

            background-color: #333;

        }
    </style>

</head>



<body>

    <?php

    $startYear = date('Y', strtotime($service->due_date)) + 543;



    //หาวันปัจจุบันเป็นไทย

    $todayYear = date('Y', strtotime(date('Y-m-d'))) + 543;

    ?>

    <!--- PAGE 1 -->
    <div class="container">

        <div class="detail" style="width: 100%;text-align:center;">
            <h1><strong>SHIPEXPERT</strong></h1>
        </div>
        <div class="detail" style="width: 100%;text-align:center;">
            <h1><strong>Final Acceptance Test</strong></h1>
        </div>
        <div class="detail" style="width: 100%;text-align:center;">
            <h1><strong>Purchase Order No : <u><?= $service->service_invoice ?></u></strong></h1>
        </div>
        <div class="detail" style="width: 100%;text-align:center;">
            <h1><strong>(VESSEL : <?php $i = 1;
                                    foreach ($vessel as $item) : ?>
                        <?= $item->ves_name;
                                        if ($i < count($vessel)) : ?>
                            /
                        <?php $i++;
                                        endif; ?>


                        <?php endforeach; ?>)</strong></h1>
        </div>
        <div style="width: 100%;text-align:center;">
            <h3><strong>MMSI : <?= $service->ves_mmsi ?></strong></h3>
        </div>
        <div class="detail" style="width: 100%;text-align:center;">
            <img src="<?= base_url() ?>/assets/img/logo.png" alt="" style="max-width: 400px;">
        </div>
        <div class="detail" style="width: 100%;text-align:center;">
            <strong>By Shipexpert Co.,Ltd</strong>
        </div>
        <div class="detail" style="width: 100%;text-align:center;">
            <strong>Installation Date (commpletion): <?= date_format(date_create($service->end_date), 'd/m/Y'); ?></strong>
        </div>
    </div>



    <pagebreak></pagebreak>

    <!-- PAGE 2 -->

    <div class="container">
        <div class="detail" style="width: 100%;text-align:center;">
            <h1><strong>Revision History</strong></h1>
        </div>
        <div class="detail">
            <table class="tablehistory">
                <tr>
                    <td>Date</td>
                    <td>Author</td>
                    <td>Version</td>
                    <td style="text-align: center;">Revistion Summary</td>
                </tr>

                <?php foreach ($atp_history as $item) : ?>
                    <tr>
                        <td><?= $item->his_date ?></td>
                        <td><?= $item->engineer ?></td>
                        <td><?= $item->version ?></td>
                        <td><?= str_replace("\n", '<br />', $item->his_detail) ?></td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>


    <pagebreak></pagebreak>

    <!-- PAGE 3 -->

    <div class="container" style="padding-left: 50px;">
        <div class="detail">
            <h2><strong>I. Objectives</strong></h2>
            <div class="data">
                <p>The installation test has been prepared to evaluate the quality of Shipexpert provided by SHIPEXPERT CO.,LTD.</p>
            </div>

        </div>
        <div class="detail">
            <h2><strong>II. Installation test items</strong></h2>
            <div class="data">
                <strong>
                    <h4>1. Service description</h4>
                    <div style="padding-left: 10px;">1.1 Service package</div>
                    <div style="padding-left: 10px;">1.2 Satellite</div>
                    <div style="padding-left: 10px;">1.3 Network digram</div>
                </strong>
                <strong>
                    <h4>2. Equipment list</h4>
                    <div style="padding-left: 10px;">Inspection of equipment list, quantity, serial no, and physical insatallation</div>
                </strong>
                <strong>
                    <h4>3. System functional test</h4>
                    <div style="padding-left: 10px;">3.1 Satellite acquition test</div>
                    <div style="padding-left: 10px;">3.2 Satellite communication system test</div>
                    <div style="padding-left: 10px;">3.3 Internet access via WIFI access point test</div>
                    <div style="padding-left: 10px;">3.4 Service monitoring by ... Captive portal</div>
                </strong>
                <strong>
                    <h4>4. Additional information</h4>
                </strong>
                <strong>
                    <h4>5. Acknowledgement and Approval</h4>
                </strong>
            </div>
        </div>
        <div class="detail">
            <h2><strong>III. Appendix</strong></h2>
            <div class="data">
                <strong>
                    <h4>1. Appendix A : Physical installation of Equipment</h4>
                </strong>
                <strong>
                    <h4>2. Appendix B : Test result</h4>
                </strong>
                <strong>
                    <h4>3. Appendix C :</h4>
                </strong>
                <strong>
                    <h4>4. Appendix D : Customer support</h4>
                </strong>
            </div>
        </div>

    </div>

    <pagebreak></pagebreak>

    <!-- PAGE 4 -->

    <div class="container" style="padding-left: 50px;">
        <div class="detail">
            <h2><strong>1. Service description</strong></h2>
            <div class="data">
                <h3><strong>1.1 Service package</strong></h3>
                <table class="tablehistory">
                    <tr>
                        <td style="width: 15%;text-align:center;"> Service package</td>
                        <td style="width: 35%;text-align:center;"> Maximum speed <div>(Download / Upload)</div>
                        </td>
                        <td style="width: 35%;text-align:center;">Committed speed <div>(Download / Upload)</div>
                        </td>
                        <td style="width: 15%;text-align:center;">Note</td>
                    </tr>
                    <?php foreach ($service_package as $items) : ?>
                        <?php $internet = str_split($items->pack_internet);
                        $mir = strpos($items->pack_internet, 'MIR');
                        $cir = strpos($items->pack_internet, 'CIR');
                        $str_mir = "";
                        $str_cir = "";
                        ?>
                        <tr>
                            <td style="text-align:center;"><?= $items->pack_name ?></td>
                            <?php if ($mir != '') { ?>
                                <td style="text-align:center;"><?php for ($count = $mir; $count < $cir; $count++) {
                                                                    $str_mir = $str_mir . $internet[$count];
                                                                } ?>
                                    <?= $str_mir ?> </td>
                            <?php } else { ?>
                                <td style="text-align:center;">-</td>
                            <?php } ?>
                            <?php if ($cir != '') { ?>
                                <td style="text-align:center;"><?php for ($count = $cir; $count < count($internet); $count++) {
                                                                    $str_cir = $str_cir . $internet[$count];
                                                                } ?>
                                    <?= $str_cir ?> </td>
                            <?php } else { ?>
                                <td style="text-align:center;">-</td>
                            <?php } ?>
                            <?php if ($cir == '' && $mir == '') { ?>
                                <td style="text-align:center;"><?= $items->pack_internet ?></td>
                            <?php } else { ?>
                                <td style="text-align:center;">-</td>
                            <?php } ?>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </div>
            <div class="data">
                <h3><strong>1.2 Network System diagram</strong></h3>
                <?php foreach ($atp_upload as $item) : ?>
                    <?php if ($item->page == 'page4') : ?>
                        <img src="<?= base_url() ?>/upload_atp/<?= $service->service_invoice ?>/network/<?= $item->uploads_name ?>" alt="" style="height: 650px;width:auto;">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <pagebreak></pagebreak>

    <!-- PAGE 6 -->

    <div class="container" style="padding-left: 50px;">
        <div class="detial">
            <h2><strong>2. Equipment list</strong></h2>

            <div style="margin-top: 10px;">

                <table class="table" style="width: 100%;">

                    <thead>

                        <tr class="bg-dark">

                            <th style="width: 5%; color:white;">No.</th>

                            <th style="width: 45%; color:white;">Equipment</th>

                            <th style="width: 40%; color:white;">Detail</th>

                            <th style="width: 10%; color:white;">Quantity</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $i = 0;
                        $sum = 0;

                        foreach ($service_detail as $item) : ?>

                            <tr>

                                <td style="text-align: center; padding:0px;"><?= ++$i; ?></td>

                                <td>

                                    <?= $item->service_name; ?><br>

                                    <em><small style="color: #333;"><?= $item->detail; ?></small></em>

                                </td>

                                <td></td>

                                <td style="text-align: center;">
                                    <em><small style="color: #333;"><?= $item->amount; ?></small></em>

                                </td>


                            </tr>

                        <?php endforeach; ?>

                    </tbody>



                </table>

            </div>
            <div class="data" style="margin-top: 50px;">
                <table class="tablesign" style="width: 100%;">
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="width: 50%;"></td>
                    </tr>
                    <tr>
                        <td>tester <div>Rep. Shipexpert</div>
                        </td>
                        <td>Witness <div>Rep. </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <pagebreak></pagebreak>

    <!-- PAGE 7 -->

    <div class="container" style="padding-left: 50px;">
        <div class="detail">
            <h2><strong>3. System function test</strong></h2>
        </div>
    </div>
    <table class="tabledetail">
        <tr>
            <td rowspan="2" style="width: 10%;">Item</td>
            <td rowspan="2" style="width: 50%;">Test proceduce</td>
            <td colspan="2" style="width: 10%;">Test Result</td>
            <td rowspan="2" style="width: 30%;"> Remark</td>
        </tr>
        <tr>
            <td style="width: 5%;">Pass</td>
            <td style="width: 5%;">Fail</td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td>
                <strong>3.1 Satellite acquisition test</strong>
            </td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td class="textcenter" style="width:10%;">
                <strong>1</strong>
            </td>
            <td style="width:50%;">
                <strong>
                    <p>Verify that the antenna is installed at the location that has no obstruction to satellite lookup angle</p>
                </strong>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_11 == "true") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_11 == "false") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:30%;">
                <strong></strong>
            </td>
        </tr>
        <tr>
            <td class="textcenter"><strong>2</strong></td>
            <td><strong>
                    <p>Power on the antenna control unit (ACU) and modem</p>
                </strong>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_12 == "true") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_12 == "false") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" rowspan="2"><strong>Please refer to figure B1 of Appendix B: Test result</strong></td>
        </tr>
        <tr>
            <td class="textcenter"><strong>3</strong></td>
            <td><strong>
                    <p>Antenna can track the satellite</p>
                </strong>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_13 == "true") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_13 == "false") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter"><strong></strong></td>

        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td>
                <strong>3.2 Satellite communication system test</strong>
            </td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td class="textcenter" style="width:10%;">
                <strong>1</strong>
            </td>
            <td style="width:50%;">
                <strong>
                    <p>Test the speed of satellite connection with the designated speed test server.</p>
                    <p>Download speed &nbsp; = <?= $atp_detail->download ?> Mbps</p>
                    <p>Upload speed &nbsp; = <?= $atp_detail->upload ?> Mbps</p>
                    <p><strong>Remark:</strong>The speed of satellite connection shall be more than Committed Speed and wihthin Maximum Speed</p>
                </strong>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_21 == "true") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_21 == "false") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:30%;">
                <strong>
                    <p>Please refer to figure B3 Appendix B: Test result</p>
                </strong>
            </td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td>
                <strong>3.3 Payment Gateway test</strong>
            </td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td class="textcenter" style="width:10%;">
                <strong>1</strong>
            </td>
            <td style="width:50%;">
                <strong>
                    <p>Test access to billing gateway and buy point</p>
                </strong>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_31 == "true") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_31 == "false") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:30%;">
                <strong>Test with Crew if don't have Shipexpert controller skip this topic</strong>
            </td>
        </tr>
        <tr>
            <td class="textcenter"><strong>2</strong></td>
            <td><strong>
                    <p>Transfer point to another account</p>
                </strong>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_32 == "true") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_32 == "false") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter"><strong>Test with Crew if don't have Shipexpert controller skip this topic</strong></td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td>
                <strong>3.4 Internet access via WIFI access point test</strong>
            </td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td class="textcenter" style="width:10%;">
                <strong>1</strong>
            </td>
            <td style="width:50%;">
                <strong>
                    <p>Test Internet access by browsing the following</p>
                    <p>websites. http://www.google.com and specified</p>
                    <p>websites. http://www.Shipexpert.com/</p>
                </strong>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_41 == "true") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page6_41 == "false") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:30%;">
                <strong>
                    <p>Please refer to figure B3 Appendix B: Test result</p>
                </strong>
            </td>
        </tr>
    </table>

    <div class="data" style="margin-top: 50px;">
        <table class="tablesign" style="width: 100%;">
            <tr>
                <td style="width: 50%;"></td>
                <td style="width: 50%;"></td>
            </tr>
            <tr>
                <td>tester <div>Rep. Shipexpert</div>
                </td>
                <td>Witness <div>Rep. </div>
                </td>
            </tr>
        </table>
    </div>

    <pagebreak></pagebreak>

    <!-- PAGE 8 -->

    <div class="container" style="padding-left: 50px;">
        <div class="detail">
            <h2><strong>3. System function test (Cont.)</strong></h2>
        </div>
    </div>
    <table class="tabledetail">
        <tr>
            <td rowspan="2" style="width: 10%;">Item</td>
            <td rowspan="2" style="width: 50%;">Test proceduce</td>
            <td colspan="2" style="width: 10%;">Test Result</td>
            <td rowspan="2" style="width: 30%;"> Remark</td>
        </tr>
        <tr>
            <td style="width: 5%;">Pass</td>
            <td style="width: 5%;">Fail</td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td>
                <strong>3.4 Internet access (VOIP) [fix MAC Address] test </strong>
            </td>
        </tr>
    </table>
    <table class="tableheaderdetail">
        <tr>
            <td class="textcenter" style="width:10%;">
                <strong>1</strong>
            </td>
            <td style="width:50%;">
                <strong>
                    <p>Mac Address: </p>
                    <p>Type of device: </p>
                    <p>Email address: </p>
                    <p>and test internet access by browsing the following</p>
                    <p>websites: </p>
                </strong>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page7_41 == "true") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:5%;">
                <?php if ($atp_detail->page7_41 == "false") : ?>
                    <strong><img src="<?= base_url() ?>/assets/img/check.png" alt="" style="max-width: 30px;"></strong>
                <?php endif; ?>
            </td>
            <td class="textcenter" style="width:30%;">
                <strong>
                    <p>Please refer to figure B3 Appendix B: Test result</p>
                </strong>
            </td>
        </tr>
    </table>


    <pagebreak></pagebreak>

    <!-- PAGE 9 -->
    <div class="container" style="padding-left: 50px;">
        <div class="detail">
            <h2><strong>4. Additional information</strong></h2>
        </div>
        <div class="detail">
            <div class="data">
                <strong><?= str_replace("\n", '<br />', $atp_detail->additional); ?></strong>
            </div>
        </div>
    </div>

    <pagebreak></pagebreak>

    <!-- PAGE 10 -->

    <div class="container" style="padding-left: 50px;">
        <div class="detail">
            <h2><strong>5. Acknowledgement and Approval</strong></h2>
        </div>
        <div class="detail">
            <div class="data" style="padding-bottom: 5px;">
                <strong> 1. The ship owner permits Shipexpert CO.,LTD to install and commission the Equipment and demobillze when the commercial contract expires.</strong>
            </div>
            <div class="data" style="padding-bottom: 5px;">
                <strong>2. The Master of the ship or Officer of Duty the representative and the reseller / the representative have acknowledged that the title in the Equipment shall, at all time, remains with Shipexpert CO.,LTD</strong>
            </div>
            <div class="data" style="padding-bottom: 5px;">
                <strong>3. This Final Acceptance Test hav been successfully conducted, and it's test results are complete and fully satisfactory upon the acknowledgement and approval by and amongst the following parties.</strong>
            </div>
            <div class="data" style="padding-bottom: 5px;">
                <strong>4. Upon the completion of the following approval, the commercial service will be commenced in 7 days from rhe date of the last approver</strong>
            </div>
        </div>
        <div class="detail">
            <div class="data">
                <strong>Ship Owner:</strong>
            </div>
            <div class="data">
                <strong>(By the Ship Master's Duty Authorized Representative)</strong>
            </div>
            <div style="margin-top: 20px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 50%;text-align: center;">_____________________________________</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">(_______________________________________)</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Duty Officer</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Date: </td>
                    </tr>
                </table>
            </div>
            <div class="data">
                <strong>Ship Owner:</strong>
            </div>
            <div class="data">
                <strong>(By the Ship Master's Duty Authorized Representative)</strong>
            </div>
            <div style="margin-top: 20px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 50%;text-align: center;">_____________________________________</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">(___________<?= $engineer->engineer ?>___________)</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Witness</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Date: </td>
                    </tr>
                </table>
            </div>
            <div class="data">
                <strong>Ship Owner:</strong>
            </div>
            <div class="data">
                <strong>(By the Ship Master's Duty Authorized Representative)</strong>
            </div>
            <div style="margin-top: 20px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 50%;text-align: center;">_____________________________________</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">(___________<?= $engineer->engineer ?>___________)</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Tester</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">Date: </td>
                    </tr>
                </table>
            </div>
        </div>

        <pagebreak></pagebreak>

        <!-- PAGE 11 -->

        <div class="container" style="padding-left: 50px;">
            <div class="detail">
                <h2><strong> Appendix A : Physical installation of equipment</strong></h2>
            </div>
        </div>
        <div>
            <?php $i = 1;
            foreach ($atp_upload as $item) : ?>
                <?php if ($item->page == 'page10') : ?>
                    <img src="<?= base_url() ?>/upload_atp/<?= $service->service_invoice ?>/app_a/<?= $item->uploads_name ?>" alt="" style="height: 650px;width:auto;">
                    <div style="text-align: center;width:100%;"><strong>Figure A <?= $i ?> : <?= trim($item->uploads_name, '.png') ?></strong></div>
                <?php $i++;
                endif; ?>
            <?php endforeach; ?>
        </div>

        <pagebreak></pagebreak>

        <!-- PAGE 12 -->

        <div class="container" style="padding-left: 50px;">
            <div class="detail">
                <h2><strong> Appendix B : Test Result</strong></h2>
            </div>
        </div>
        <div>
            <p style="text-align: center;">
                <strong>This section contains the screen capture and snapshot of acceptance test result</strong>
            </p>
            <?php $i = 1;
            foreach ($atp_upload as $item) : ?>
                <?php if ($item->page == 'page11') : ?>
                    <img src="<?= base_url() ?>/upload_atp/<?= $service->service_invoice ?>/app_b/<?= $item->uploads_name ?>" alt="" style="height: 650px;width:auto;">
                    <div style="text-align: center;width:100%;"><strong>Figure B <?= $i ?> : <?= trim($item->uploads_name, '.png') ?></strong></div>
                <?php $i++;
                endif; ?>
            <?php endforeach; ?>

        </div>

        <pagebreak></pagebreak>

        <!-- PAGE 13 -->

        <div class="container" style="padding-left: 50px;">
            <div class="detail">
                <h2><strong> Appendix C : STELLAR Captive portal</strong></h2>
            </div>
        </div>
        <div>
            <?php $i = 1;
            foreach ($atp_upload as $item) : ?>
                <?php if ($item->page == 'page12') : ?>
                    <img src="<?= base_url() ?>/upload_atp/<?= $service->service_invoice ?>/app_c/<?= $item->uploads_name ?>" alt="" style="height: 650px;width:auto;">
                    <div style="text-align: center;width:100%;"><strong>Figure C <?= $i ?> : <?= trim($item->uploads_name, '.png') ?></strong></div>
                <?php $i++;
                endif; ?>
            <?php endforeach; ?>
        </div>

        <pagebreak></pagebreak>

        <!-- PAGE 14 -->

        <div class="container" style="padding-left: 50px;">
            <div class="detail">
                <h2><strong> Appendix D : Customer Support</strong></h2>
            </div>
            <div>
                <img src="<?= base_url() ?>/assets/img/CustomerSupport.png" alt="" style="height: 500px;width:auto;text-align:center;">
            </div>
        </div>

</body>



</html>
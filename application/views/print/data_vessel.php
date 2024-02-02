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
        }

        .tableheaderdetail td {
            border: 0.5px solid #333;
            font-size: 16px;
            padding-left: 10px;
        }

        /*-------------------------------------------------------------------------- Service Detail -------------------------------------------------------------------------- */

        .tabledetail {

            border-collapse: collapse;
        }

        .tabledetail td {
            border: 0.5px solid #333;
            font-size: 14px;
            padding-left: 5px;
        }


        /*------------------------------------------------------------------------ Add Service Detail ------------------------------------------------------------------------ */
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
    </style>

</head>



<body>

    <?php

    //หาวันปัจจุบันเป็นไทย

    $todayYear = date('Y', strtotime(date('Y-m-d'))) + 543;

    ?>
    <?php foreach ($service as $item) : ?>

        <!----------------------------------------------------------------V E S S E L--------------------------------------------------------------------------->

        <table class="tableheaderdetail bg-deep" style="width: 100%;">

            <tr>
                <td>
                    <strong>1. VESSEL DETAIL (<?= date_format(date_create($item->due_date), ' d/m/Y'); ?> - <?= date_format(date_create($item->end_date), ' d/m/Y'); ?>)</strong>
                </td>
            </tr>
        </table>

        <table class="tabledetail " style="width: 100%;">
            <tr>
                <td style="width: 30%">
                    <strong>Fleet : </strong><?= $item->ves_fleet; ?>
                </td>
                <td style="width: 20%">
                    <strong>Call Sign : </strong><?= $item->ves_callsign; ?>
                </td>
                <td style="width: 25%">
                    <strong>Home port : </strong><?= $item->ves_home_port; ?>
                </td>
                <td>
                    <strong>Mode of Work : </strong><?php if ($item->ves_installation == 'true') {
                                                        echo 'Installation';
                                                    } else if ($item->ves_survey == 'true') {
                                                        echo 'Survey';
                                                    } else {
                                                        if ($item->ves_maintenance == 'Uninstall') {
                                                            echo 'Uninstall';
                                                        } else if ($item->ves_maintenance == 'Preventive Maintenance') {
                                                            echo 'PM';
                                                        } else {
                                                            echo 'CM';
                                                        }
                                                    } ?>
                </td>
            </tr>

            <tr>
                <td>
                    <strong> Name : </strong><?= $item->ves_name ?>
                </td>
                <td>
                    <strong>MMSI : </strong><?= $item->ves_mmsi; ?>
                </td>
                <td colspan="2">
                    <strong>Flag : </strong><?= $item->ves_flag; ?>
                </td>

            </tr>

            <tr>
                <td>
                    <strong>Type : </strong><?= $item->ves_type; ?>
                </td>
                <td>
                    <strong>IMO : </strong><?= $item->ves_imo; ?>
                </td>
                <td colspan="2">
                    <strong>Gross Tonnage : </strong><?= $item->ves_gross_tonnage; ?>
                </td>

            </tr>
        </table>

        <!----------------------------------------------------------------P A C K A G E--------------------------------------------------------------------------->

        <table class="tableheaderdetail bg-deep" style="width: 100%;">
            <tr>
                <td>
                    <strong>2. PACKAGE</strong>
                </td>
            </tr>
        </table>
        <table class="tabledetail " style="width: 100%;">
            <?php if ($service_package != null) : ?>
                <?php foreach ($service_package as $package) :
                    if ($item->service_invoice == $package->service_invoice) : ?>

                        <tr>
                            <td>
                                <strong>Package Name : </strong><?= $package->pack_name; ?>
                            </td>
                            <td>
                                <strong>Package Internet : </strong><?= $package->pack_internet; ?>
                            </td>
                            <td>
                                <strong>Contract Strat :
                                    <?= date_format(date_create($item->contract_start), ' d/m/Y'); ?>
                                    -
                                    <?= date_format(date_create($item->contract_end), ' d/m/Y'); ?>
                                </strong>
                            </td>
                        </tr>

                <?php endif;
                endforeach; ?>
            <?php else : ?>
                <tr>
                    <td>
                        <strong>Contract Strat :
                            <?= date_format(date_create($service->contract_start), ' d/m/' . $contract_start . ''); ?>
                            -
                            <?= date_format(date_create($service->contract_end), ' d/m/' . $contract_end . ''); ?>
                        </strong>
                    </td>
                </tr>
            <?php endif; ?>
        </table>

        <!----------------------------------------------------------------P R O D U C T--------------------------------------------------------------------------->

        <table class="tableheaderdetail bg-deep" style="width: 100%;">
            <tr>
                <td>
                    <strong>3. PRODUCT</strong>
                </td>
            </tr>
        </table>

        <table class="tabledetail " style="width: 100%;">
            <?php foreach ($service_product as $index) :
                if ($item->service_invoice == $index->service_invoice) : ?>
                    <tr>
                        <td>
                            <strong>Product : </strong>

                            <?= $index->product; ?>

                        </td>
                    </tr>
            <?php endif;
            endforeach; ?>
        </table>

        <!----------------------------------------------------------------E N G I N E E R--------------------------------------------------------------------------->

        <table class="tableheaderdetail bg-deep" style="width: 100%;">
            <tr>
                <td>
                    <strong>4. ENGINEER</strong>
                </td>
            </tr>
        </table>

        <table class="tabledetail " style="width: 100%;">
            <?php foreach ($engineer as $index) :
                if ($item->service_invoice == $index->service_invoice) : ?>
                    <tr>
                        <td>
                            <strong>Engineer : </strong>

                            <?= $index->engineer; ?> / <?= $index->detail_engineer ?>

                        </td>
                    </tr>
            <?php endif;
            endforeach; ?>
        </table>
        <!-- รายการสั่งซื้อและบริการ -->

        <div style="margin-top: 10px;">

            <h3 style="text-align:center"><strong>Equipment Detail</strong></h3>

            <table class="table" style="width: 100%;">

                <thead>

                    <tr class="bg-dark">

                        <th style="width: 5%; color:white;">No.</th>

                        <th style="width: 15%;color:white;">Code</th>

                        <th style="width: 40%; color:white;">Equipment</th>

                        <th style="width: 30%; color:white;">Detail</th>

                        <th style="width: 10%; color:white;">Quantity</th>

                    </tr>

                </thead>

                <tbody>

                    <?php $i = 0;

                    foreach ($service_detail as $item2) :
                        if ($item2->service_invoice == $item->service_invoice) : ?>

                            <tr>

                                <td style="text-align: center; padding:0px;"><?= ++$i; ?></td>

                                <td style="text-align: center; padding:0px;"><?= $item2->code ?></td>

                                <td>

                                    <?= $item2->service_name; ?><?php if ($item2->serial_number != null) {
                                                                    echo '(' . $item2->serial_number . ')';
                                                                } ?><br>

                                    <em><small style="color: #333;"><?= $item2->detail; ?></small></em>

                                </td>

                                <td><?= $item2->service_detail ?></td>

                                <td style="text-align: center;">

                                    <?= $item2->amount; ?>

                                </td>
                            </tr>

                    <?php endif;
                    endforeach; ?>

                </tbody>

            </table>

        </div>
        <pagebreak>
        <?php endforeach; ?>


</body>




</html>
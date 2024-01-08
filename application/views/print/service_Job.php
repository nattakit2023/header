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

    $startYear = date('Y', strtotime($service->create_date)) + 543;




    //หาวันปัจจุบันเป็นไทย

    $todayYear = date('Y', strtotime(date('Y-m-d'))) + 543;

    ?>

    <div style="font-size:14px;margin-top: 5px;width:100%;">
        <p>
            <strong>Requerted Installation & Activation date (DD/MM/YYYY) : </strong>
            <?= date_format(date_create($service->due_date), 'd/m/' . $startYear); ?>
            -
            <?= date_format(date_create($service->end_date), 'd/m/' . $startYear); ?>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            <strong>Project Code : <?php $i = 1;
                                    foreach ($service_project as $index) : ?>
                    <?= $index->projects ?>
                    <?php if ($i < count($service_project)) : ?>
                        /
                    <?php $i++;
                                        endif; ?>
                <?php endforeach; ?>
            </strong>

        </p>

    </div>

    <!----------------------------------------------------------------C U S T O M E R--------------------------------------------------------------------------->
    <table class="tableheaderdetail bg-deep" style="width: 100%; ">

        <tr>
            <td>
                <strong>1. CUSTOMER DETAIL</strong>
            </td>
        </tr>
    </table>

    <table class="tabledetail" style="width: 100%; ">
        <tr>

            <td style="width: 50%">

                <strong>Name :</strong> <?= $service->cus_name; ?>

            </td>

            <td style="width: 25%">
                <strong>Tel : </strong><?= $service->cus_tel; ?>


            </td>

            <td style="width: 25%">

                <strong>Email :</strong> <?= $service->cus_email; ?>

            </td>




        </tr>

        <tr>
            <td>

                <strong>Address :</strong> <?= $service->cus_address; ?>

            </td>
            <td>

                <strong>Zipcode :</strong> <?= $service->cus_zipcode; ?>

            </td>
        </tr>

    </table>

    <!----------------------------------------------------------------V E S S E L--------------------------------------------------------------------------->

    <table class="tableheaderdetail bg-deep" style="width: 100%;">

        <tr>
            <td>
                <strong>2. VESSEL DETAIL</strong>
            </td>
        </tr>
    </table>

    <table class="tabledetail " style="width: 100%;">
        <tr>
            <td style="width: 30%">
                <strong>Fleet : </strong><?= $service->ves_fleet; ?>
            </td>
            <td style="width: 15%">
                <strong>Call Sign : </strong><?= $service->ves_callsign; ?>
            </td>
            <td style="width: 25%">
                <strong>Home port : </strong><?= $service->ves_home_port; ?>
            </td>
            <td>
                <strong>Mode of Work : </strong><?= $service->ves_maintenance; ?>
            </td>
        </tr>

        <tr>
            <td>
                <strong> Name : </strong>
                <?php $i = 1;
                foreach ($vessel as $item) : ?>
                    <?= $item->ves_name ?>
                    <?php if ($i < count($vessel)) : ?>
                        ,
                    <?php $i++;
                    endif; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <strong>MMSI : </strong><?= $service->ves_mmsi; ?>
            </td>
            <td>
                <strong>Flag : </strong><?= $service->ves_flag; ?>
            </td>
            <td>
                <strong>Survey : </strong><?= $service->ves_survey; ?>
            </td>
        </tr>

        <tr>
            <td>
                <strong>Type : </strong><?= $service->ves_type; ?>
            </td>
            <td>
                <strong>IMO : </strong><?= $service->ves_imo; ?>
            </td>
            <td>
                <strong>Gross Tonnage : </strong><?= $service->ves_gross_tonnage; ?>
            </td>
            <td>
                <strong>Installation : </strong><?= $service->ves_installation; ?>
            </td>
        </tr>
    </table>

    <!----------------------------------------------------------------C O N T R A C T--------------------------------------------------------------------------->
    <table class="tableheaderdetail bg-deep" style="width: 100%;">
        <tr>
            <td>
                <strong>3. CONTACT ONBOARD</strong>
            </td>
        </tr>
    </table>
    <table class="tabledetail " style="width: 100%;">
        <tr>
            <td>
                <strong>Name : </strong><?= $service->con_name; ?>
            </td>
            <td>
                <strong>Tel : </strong><?= $service->con_tel; ?>
            </td>
            <td>
                <strong>Email : </strong><?= $service->con_email; ?>
            </td>
            <td>
                <strong>ETA : </strong><?= date_format(date_create($service->ETA), ' d/m/' . $startYear . ' H:i:s');; ?>
            </td>
        </tr>

        <tr>
            <td>
                <strong>Port : </strong><?= $service->port_name; ?>
            </td>
            <td colspan="2">
                <strong>Province : </strong><?= $service->port_province; ?>
            </td>
            <td>
                <strong>ETD : </strong><?= date_format(date_create($service->ETD), ' d/m/' . $startYear . ' H:i:s');; ?>
            </td>
        </tr>
    </table>

    <!----------------------------------------------------------------P A C K A G E--------------------------------------------------------------------------->

    <table class="tableheaderdetail bg-deep" style="width: 100%;">
        <tr>
            <td>
                <strong>4. PACKAGE</strong>
            </td>
        </tr>
    </table>
    <table class="tabledetail " style="width: 100%;">
        <?php foreach ($service_package as $package) : ?>
            <tr>
                <td>
                    <strong>Package Name : </strong><?= $package->pack_name; ?>
                </td>
                <td>
                    <strong>Package Internet : </strong><?= $package->pack_internet; ?>
                </td>
                <td>
                    <strong>Contract Strat :
                        <?= date_format(date_create($service->contract_start), ' d/m/' . $startYear . ''); ?>
                        -
                        <?= date_format(date_create($service->contract_end), ' d/m/' . $startYear . ''); ?>
                    </strong>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

    <!----------------------------------------------------------------P R O D U C T--------------------------------------------------------------------------->

    <table class="tableheaderdetail bg-deep" style="width: 100%;">
        <tr>
            <td>
                <strong>5. PRODUCT</strong>
            </td>
        </tr>
    </table>

    <table class="tabledetail " style="width: 100%;">
        <?php foreach ($service_product as $index) : ?>
            <tr>
                <td>
                    <strong>Product : </strong>

                    <?= $index->product; ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!----------------------------------------------------------------E N G I N E E R--------------------------------------------------------------------------->

    <table class="tableheaderdetail bg-deep" style="width: 100%;">
        <tr>
            <td>
                <strong>6. ENGINEER</strong>
            </td>
        </tr>
    </table>

    <table class="tabledetail " style="width: 100%;">
        <tr>
            <td>
                <strong>Engineer : </strong>
                <?php $i = 1;
                foreach ($engineer as $index) : ?>
                    <?= $index->engineer; ?>
                    <?php if ($i < count($engineer)) : ?>
                        /
                    <?php $i++;
                    endif; ?>
                <?php endforeach; ?>
            </td>
        </tr>
    </table>

    </div>


    <!-- รายการสั่งซื้อและบริการ -->

    <div style="margin-top: 10px;">

        <h3 style="text-align:center"><strong>Equipment Detail</strong></h3>

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

                foreach ($service_detail as $item) : ?>

                    <tr>

                        <td style="text-align: center; padding:0px;"><?= ++$i; ?></td>

                        <td>

                            <?= $item->service_name; ?><br>

                            <em><small style="color: #333;"><?= $item->detail; ?></small></em>

                        </td>

                        <td><?= $item->service_detail ?></td>

                        <td style="text-align: center;">

                            <?= $item->amount; ?>

                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

    <br><br><br><br>


    <!--ลายเซ็น -->

    <div style="padding-top:50px; ">

        <table class="tablesign" style="width: 100%">

            <tr>
                
            </tr>

            <tr>

                <td style="padding-top: 30px;">Sign.........................................................Engineer</td>

                <td style="padding-top: 30px;">Sign.........................................................Management</td>

            </tr>

        </table>

    </div>

    <div>
        <div>**************************************************************************************************************************************</div>
        <h3>REMARK</h3>
        <div>
            <?= str_replace("\n", '<br />', $service->remark_create) ?>
        </div>
    </div>

</body>




</html>
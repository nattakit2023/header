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

    $due_date = date('Y', strtotime($service->due_date)) + 543;

    $end_date = date('Y', strtotime($service->end_date)) + 543;

    $appYear = date('Y', strtotime($service->approve_date)) + 543;

    $ETA = date('Y', strtotime($service->ETA)) + 543;

    $ETD = date('Y', strtotime($service->ETD)) + 543;

    $contract_start = date('Y', strtotime($service->contract_start)) + 543;

    $contract_end = date('Y', strtotime($service->contract_end)) + 543;




    //หาวันปัจจุบันเป็นไทย

    $todayYear = date('Y', strtotime(date('Y-m-d'))) + 543;

    ?>
    <div>
        <h2>ขั้นตอนการทำงาน Job Order</h2>
    </div>

    <table>
        <tr>
            <td style="width:30%">
                <strong>Name</strong>
            </td>
            <td>
                : <?php if ($engineer == '') {
                        echo 'MR.Kirk Vilaimal';
                    } else if ($engineer == 'Edit') {
                        echo 'K.Phornphen Saksirisamphun';
                    } else {
                        $i = 1;
                        foreach ($engineer as $item) {
                            echo $item->engineer;
                            if ($i < count($engineer)) {
                                echo ', ';
                                $i++;
                            }
                        }
                    }
                    ?>

            </td>
        </tr>

        <tr>
            <td>
                <strong>Installation Date</strong>
            </td>
            <td>
                : <?= date_format(date_create($service->due_date), ' d/m/' . $due_date); ?>
            </td>
        </tr>

        <tr>
            <td>
                <strong>Completetion Date</strong>
            </td>
            <td>
                : <?= date_format(date_create($service->end_date), ' d/m/' . $end_date); ?>
            </td>
        </tr>

        <tr>
            <td>
                <strong>Status</strong>
            </td>
            <td>
                : <?= $service->service_status ?>
            </td>
        </tr>

        <tr>
            <td>
                <strong>URL</strong>
            </td>
            <td>
                : <a href="http://support.shipexpert.info/pages/service_detail/<?= $service->service_invoice ?>">http://support.shipexpert.info/pages/service_detail/<?= $service->service_invoice ?></a>
            </td>
        </tr>
    </table>

</body>

</html>
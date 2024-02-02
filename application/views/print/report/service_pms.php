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
            border: 0.5px solid #333;
        }

        /*---------------------------------------------------------------------- Header Service Detail ---------------------------------------------------------------------- */

        .tableheaderdetail {
            border-collapse: collapse;
            border: 0.5px solid #333;
            font-size: 16px;
            padding: 10px 10px 10px;
        }

        /*-------------------------------------------------------------------------- Service Detail -------------------------------------------------------------------------- */

        .tabledetail {
            border-collapse: collapse;
            border: 1px solid #333;
            font-size: 14px;

        }

        .tabledetail .tabledata {
            width: 100%;
            border-collapse: collapse;
        }

        .tabledetail .tabledata td {
            border-bottom: 1px solid #333
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


    $due_date = date('Y', strtotime($service->due_date)) + 543;

    $end_date = date('Y', strtotime($service->end_date)) + 543;

    ?>
    <div style="font-size:14px;margin-top: 5px;width:100%;">
        <p>
            <strong>Requerted Installation & Activation date (DD/MM/YYYY) : </strong>
            <?= date_format(date_create($service->due_date), 'd/m/' . $due_date); ?>
            -
            <?= date_format(date_create($service->end_date), 'd/m/' . $end_date); ?>
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
            <strong>Project Code : <?=$service->project?></strong>
        </p>

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

        <table class="tableheaderdetail bg-deep" style="width: 100%;">

            <tr>
                <td>
                    <strong>2. VESSEL DETAIL</strong>
                </td>
            </tr>

        </table>

        <table class="tabledetail" style="width: 100%;">
            <tr>
                <td style="width: 50%;">
                    <strong>Vessel Fleet : </strong><?= $service->ves_fleet; ?>
                </td>
                <td>
                    <strong>Vessel Name : </strong><?= $service->ves_name; ?>
                </td>
            </tr>

        </table>

        <table class="tableheaderdetail bg-deep" style="width: 100%;">

            <tr>
                <td>
                    <strong>3. Product</strong>
                </td>
            </tr>

        </table>

        <table class="tabledetail" style="width: 100%;">
            <tr>
                <td style="width: 50%;">
                    <strong>Product : <?= $service->product ?>
                </td>
            </tr>

        </table>





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

</body>




</html>
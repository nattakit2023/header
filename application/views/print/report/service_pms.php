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
                :&nbsp;<u><?= $service->cus_name ?></u>
            </td>
        </tr>
        <tr>
            <td>
                Pc Location
            </td>
            <td>
                :&nbsp;<u><?= $service->cus_name ?></u>
            </td>
            <td>
                WorkGroup
            </td>
            <td>
                :&nbsp;<u><?= $service->cus_name ?></u>
            </td>
        </tr>
        <tr>
            <td>
                Pc Name
            </td>
            <td>
                :&nbsp;<u><?= $service->cus_name ?></u>
            </td>
            <td>
                IP
            </td>
            <td>
                :&nbsp;<u><?= $service->cus_name ?></u>
            </td>
        </tr>
    </table>
    <div class="tabledetail">

        <table class="tabledata">
            <tbody>
            <tr style="background-color: rgb(210,210,210)">
                    <td style="width: 40%;"></td>
                    <td style="width: 10%;"></td>
                    <td colspan="5" class="textcenter" style="width: 50%;">Score</td>
                </tr>
                <tr style="background-color: rgb(210,210,210)">
                    <td></td>
                    <td class="textcenter">Done</td>
                    <td class="textcenter">
                        1
                    </td>
                    <td class="textcenter">
                        2
                    </td>
                    <td class="textcenter">
                        3
                    </td>
                    <td class="textcenter">
                        4
                    </td>
                    <td class="textcenter">
                        5
                    </td>
                </tr>
                <tr>
                    <td>
                        1) Re-Arrange Wire&Cable
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">
                        1
                    </td>
                    <td class="textcenter">
                        2
                    </td>
                    <td class="textcenter">
                        3
                    </td>
                    <td class="textcenter">
                        4
                    </td>
                    <td class="textcenter">
                        5
                    </td>
                </tr>
                <tr style="background-color: rgb(210,210,210)">
                    <td>
                        2) Clean-Up
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Case (RAM?Cable/SW)
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Monitor
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Mouse
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Keyboard
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Environment
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr style="background-color: rgb(210,210,210)">
                    <td>
                        3) Network
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Switch
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Plug&Network Card
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - File Sharing
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        4) Update Antivirus Defination
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        5) Undo Card
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Markup new point
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Change password
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
                <tr>
                    <td>
                        6) Benchmark System Performance
                    </td>
                    <td class="textcenter"></td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                    <td class="textcenter">

                    </td>
                </tr>
            </tbody>
        </table>

        <table class="tableremark">
            <tr>
                <td>
                    Ship's Remark :

                </td>
                <td>
                    POS's Remark :

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

                <td style="padding-top: 30px;">Sign.........................................................Engineer</td>

                <td style="padding-top: 30px;">Sign.........................................................Management</td>

            </tr>

        </table>

    </div>

</body>




</html>
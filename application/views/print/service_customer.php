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

        .tableheader {
            border-collapse: collapse;
            width: 100%;

        }

        .tableheader td,
        .tableheader th {
            border: 1px solid #333;
            height: 20px;

        }

        .tableheader td .tableinside {
            width: 100%;

        }

        .tableheaderdetail {
            border-collapse: collapse;
            width: 100%;
        }

        .tableheaderdetail td {
            border: 1px solid #333;
            font-size: 16px;
            background-color: rgb(199, 199, 199);
            padding-left: 10px;
        }

        .tabledetail {
            border-collapse: collapse;
            width: 100%;
        }

        .tabledetail td {
            border: 1px solid #333;
            font-size: 14px;
            padding-left: 10px;
            width: 50%;
        }

        .tablesign {
            border-collapse: collapse;
            width: 100%;
            margin-top: 100;
        }

        .tablesign th {
            text-align: left;
            padding-left: 5px;
        }

        .tablesign td {
            border: 1px solid #333;
            width: 50%;
            height: 25px;
            padding-left: 5px;

        }

        .tableimage {
            margin-top: 50px;
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



        .text-white {

            color: white;

        }
    </style>

</head>



<body>

    <?php

    $startYear = date('Y', strtotime($service->due_date)) + 543;



    //หาวันปัจจุบันเป็นไทย

    $todayYear = date('Y', strtotime(date('Y-m-d'))) + 543;

    ?>

    <!-- ข้อมูลเจ้าของรถ  -->

    <table class="tableheaderdetail" style="margin-top: 30px;">

        <tr>

            <td style="width: 50%;">

                <strong>Implementation Detail </strong>

            </td>

        </tr>

    </table>

    <table class="tabledetail">

        <tr>

            <td><strong>Date </strong></td>
            <td> <?= date_format(date_create(date($service->end_date)), ': d F Y'); ?></td>

        </tr>
        <tr>

            <td><strong>Location</strong> </td>
            <td><?= $service->port_name; ?> , <?= $service->port_province ?> </td>

        </tr>

        <tr>

            <td><strong>Customer Company Name </strong></td>
            <td><?= $service->cus_name; ?> </td>

        </tr>

        <tr>

            <td><strong>PO no.reference </strong></td>
            <td></td>

        </tr>

        <tr>

            <td><strong>Mode of Installation </strong></td>
            <td><?php $i = 1;
                foreach ($service_product as $item) : ?>
                    <?= $item->product; ?>
                    <?php if ($i < count($service_product)) : ?>
                        /
                    <?php $i++;
                    endif; ?>
                <?php endforeach; ?></td>

        </tr>

        <tr>

            <td><strong>Product Version </strong></td>
            <td> </td>

        </tr>

        <tr>

            <td><strong>Name of the Installation Engineer </strong></td>
            <td><?php $i = 1;
                foreach ($engineer as $index) : ?>
                    <?= $index->engineer; ?>
                    <?php if ($i < count($engineer)) : ?>
                        /
                    <?php $i++;
                    endif; ?>
                <?php endforeach; ?>
            </td>

        </tr>

        <tr>

            <td><strong>Date commenced </strong></td>
            <td></strong><?= date_format(date_create(date($service->due_date)), ': d F Y'); ?> </td>

        </tr>

        <tr>

            <td><strong>Date completed </strong></td>
            <td></strong><?= date_format(date_create(date($service->end_date)), ': d F Y'); ?></td>

        </tr>


    </table>

    <table class="tableheaderdetail">
        <tr>
            <td>
                Remark
            </td>
        </tr>

    </table>

    <table class="tabledetail">
        <tr>
            <td>
                <?php if ($service->remark_add != null) : ?>
                    <?= str_replace("\n", '<br />', $service->remark_add) ?>
                <?php endif; ?>
            </td>
        </tr>

    </table>

    <table class="tableheaderdetail">
        <tr>
            <td>
                <strong>Vessel Implementation </strong>
            </td>
        </tr>
    </table>
    <table class="tabledetail">
        <tr>
            <td>
                <strong>Port Name </strong>
            </td>

            <td>
                <strong> : </strong><?= $service->port_name; ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Sign On Date </strong>
            </td>

            <td>
                <strong><?= date_format(date_create(date($service->ETA)), ': d F Y'); ?></strong>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Port Name </strong>
            </td>

            <td>
                <strong> : </strong><?= $service->port_name; ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Sign Out Date </strong>
            </td>

            <td>
                <strong><?= date_format(date_create(date($service->ETD)), ': d F Y'); ?></strong>
            </td>
        </tr>

    </table>

    <!-- รายการสั่งซื้อและบริการ -->

    <div style="margin-top: 10px;">

        <h3 style="text-align:center"><strong>Equipment detail</strong></h3>

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

                        <td><?= $item->service_detail; ?></td>

                        <td style="text-align: center;">
                            <em><small style="color: #333;"><?= $item->amount; ?></small></em>

                        </td>


                    </tr>

                <?php endforeach; ?>

            </tbody>



        </table>

    </div>
    <pagebreak></pagebreak>

    <div style="padding-top: 10px;"></div>
    <table class="tableimage">
        <tr>
            <?php foreach ($service_uploads_back as $item) : ?>
                <td>
                    <img src="<?= base_url(); ?>/uploads_back/<?= $service->service_invoice ?>/<?= $item->uploads_name ?>" alt="" style="max-width: 250;max-height: 250px;padding-right:10px;">
                </td>
            <?php endforeach; ?>
        </tr>
    </table>

    <table class="tablesign">
        <tr>
            <th>
                <strong>Client :</strong>
            </th>
            <th>
                <strong>Implementation Engineer :</strong>
            </th>
        </tr>
        <tr>
            <td>
                <strong>Name :

                </strong>
            </td>
            <td>
                <strong>Name :
                    <?php $i = 1;
                    foreach ($engineer as $item) : ?>
                        <?= $item->engineer ?>
                        <?php if ($i < count($engineer)) : ?>
                            ,
                        <?php endif; ?>
                    <?php endforeach; ?>
                </strong>

            </td>
        </tr>
        <tr>
            <td>
                <strong> Duty Officer </strong>

            </td>
            <td>
                <strong> Shipexpert </strong>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Date <?= date_format(date_create(date($service->end_date)), ': d F Y'); ?></strong>
            </td>
            <td>
                <strong>Date <?= date_format(date_create(date($service->end_date)), ': d F Y'); ?></strong>
            </td>
        </tr>
    </table>


</body>



</html>
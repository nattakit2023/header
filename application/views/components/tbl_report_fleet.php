<table class="table table-bordered table-hover" id="tblReportFleet">

    <thead>

        <tr class="text-center">

            <th style="width: 5%"><input type="checkbox" id="checkall" onclick="checked_all()"></th>

            <th style="width: 10%">Job Order</th>

            <th style="width: 10%">Fleet</th>

            <th style="width: 10%">Vessel</th>

            <th style="width: 10%">Installation Date</th>

            <th style="width: 10%">Completed Date</th>

            <th style="width: 10%">Status</th>

            <th style="width: 10%">Option</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($service_eqp as $item) : ?>

            <tr>

                <td class="text-center"> <input type="checkbox" id="<?= $item->id ?>"></td>

                <td class="text-center"><span class="badge badge-dark"><?= $item->service_invoice; ?></span></td>

                <td><?= $item->fleet ?></td>

                <td><?= $item->vessel ?></td>



                <td class="text-center">

                    <?= date_format(date_create($item->installation_date), 'd/m/Y'); ?>

                </td>

                <td class="text-center">

                    <?php if ($item->complete_date != null) {
                        echo date_format(date_create($item->complete_date),  'd/m/Y');
                    } else {
                        echo date_format(date_create($item->complete_date), 'd/m/Y');
                    } ?>

                </td>

                <td class="text-center"><?php

                                        switch ($item->status) {

                                            case 'On Service':

                                                echo '<span class="badge badge-success">On Service</span>';

                                                break;

                                            case 'Off Service':

                                                echo '<span class="badge badge-danger">Off Service</span>';

                                                break;

                                            default:

                                                echo '';
                                        }

                                        ?></td>

                <td class="text-center">

                    <button onclick="equipment(<?= $item->id ?>)" class="btn btn-sm btn-outline-primary rounded-0">Details</button>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<script>
    function checked_all() {
        if ($('#checkall').prop('checked')) {
            <?php foreach ($service_eqp as $item) : ?>
                $('#' + <?= $item->id ?>).prop("checked", true);
            <?php endforeach; ?>
        } else {
            <?php foreach ($service_eqp as $item) : ?>
                $('#' + <?= $item->id ?>).prop("checked", false);
            <?php endforeach; ?>
        }
    }

    $('#tblReportFleet').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": true,

        "ordering": false,

        "info": false,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 10,

        language: {

            search: "ค้นหา :",

            searchPlaceholder: "",

            "lengthMenu": "แสดง _MENU_ รายการ/หน้า",

            "zeroRecords": "--ไม่มีข้อมูล--",

            "paginate": {

                "first": "<<",

                "last": ">>",

                "next": ">",

                "previous": "<"

            },

            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",

        },

    });
</script>
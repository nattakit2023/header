<table class="table table-bordered table-hover" id="tblContract1">

    <thead>

        <tr class="text-center">

            <th>Invoice</th>

            <th>Fleet/Vessel</th>

            <th style="width: 15%">Contract</th>

            <th style="width: 20%">Status</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($contract as $item) : ?>

            <tr id="row<?= $item->service_invoice; ?>">

                <td><?= $item->service_invoice ?></td>

                <td><?= $item->ves_fleet; ?> / <?= $item->ves_name ?></td>

                <td><?= date(date_format($item->contract_end,'d/m/Y')); ?></td>

                <td><?php switch ($item->ves_installation) {
                        case '':
                            echo '';
                            break;
                    } ?></td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<script>
    $('#tblContract1').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": true,

        "ordering": false,

        "info": false,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 5,



        language: {

            search: "ค้นหา :",

            searchPlaceholder: "ค้นหาข้อมูลในตาราง",

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
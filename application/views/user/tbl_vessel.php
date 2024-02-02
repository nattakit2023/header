<table class="table table-bordered table-hover" id="tblVessel">

    <thead>

        <tr class="text-center">

            <th style="width: 15%">Fleet/Vessel</th>

            <th style="width: 15%">Work Date</th>

            <th style="width: 15%">Customer</th>

            <th style="width: 25%">Package</th>

            <th style="width: 15%">Status</th>

            <th style="width: 5%">ตัวเลือก</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($service as $item) : ?>

            <tr id="row<?= $item->service_invoice; ?> " class="text-center">

                <td><?= $item->ves_fleet ?> / <?= $item->ves_name ?></td>

                <td><?= date_format(date_create($item->due_date), 'd/m/Y'); ?> - <?= date_format(date_create($item->end_date), 'd/m/Y'); ?></td>

                <td><?= $item->cus_name ?></td>

                <td><?php $i = 1;
                    foreach ($package as $pack) {

                        if ($pack->service_invoice == $item->service_invoice) {
                            if ($i > 1) {
                                echo '\n';
                            }
                            echo $pack->pack_name . ' / ' . $pack->pack_internet;
                            $i++;
                        }

                    ?>
                    <?php } ?>
                </td>

                <td><?php if ($item->ves_installation == 'true') {
                        echo 'Installation';
                    } else if ($item->ves_survey == 'true') {
                        echo 'Survey';
                    } else {
                        echo $item->ves_maintenance;
                    } ?></td>

                <td><button class="btn btn-outline-primary" onclick=""><i class="fas fa-info"></i></button></td>
            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<script>
    function detail(invoice) {
        $.ajax({
            url: '<?= base_url() ?>page_users/get_vessel',
            method: 'POST',
            dataType: 'JSON',
            data: {
                invoice: invoice
            },
            success: function(res) {
                if (res.status == 'SUCCESS') {

                } else {
                    Swal.fire({

                    });
                }
            }
        });
    }
    
    $('#tblVessel').DataTable({

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
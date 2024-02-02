<table class="table table-bordered table-hover table-sm" id="tblServiceDetail">

    <thead>

        <tr class="text-center">

            <th style="width: 5%" class="text-center">#</th>

            <th style="width: 45%">Equipment</th>

            <th style="width: 45%">Detail</th>

            <th style="width: 5%">Amount</th>
            <?php if ($service->service_status == 'created') : ?>
                <th style="width: 10%">Option</th>
            <?php endif; ?>
        </tr>

    </thead>

    <tbody>

        <?php $sum = 0;
        $i = 0;
        foreach ($service_detail as $item) : ?>

            <tr>

                <td class="text-center"><?= ++$i; ?></td>

                <td><?= $item->service_name; ?>
                    <?php if ($item->serial_number != null) {
                        echo '(S/N : ' . $item->serial_number . ')';
                    } ?>
                    <br>

                    <small class="text-muted"><?= $item->detail; ?></small>

                </td>
                <td>
                    <?= $item->service_detail ?>
                </td>

                <td class="text-center"><?= $item->amount; ?></td>

                <?php if ($service->service_status == 'created') : ?>
                    <td class="text-center">
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown">Action</button>
                                <div class="dropdown-menu">
                                    <?php if ($item->serial_number == null) : ?>
                                        <button onclick="add_serial_number('<?= $item->id; ?>');" class="dropdown-item"><i class="fas fa-plus"></i>Add</button>
                                    <?php else : ?>
                                        <button onclick="edit_serial_number('<?= $item->id; ?>');" class="dropdown-item"><i class="fas fa-plus"></i>Edit</button>
                                    <?php endif; ?>
                                    <button id="delServiceDetail" onclick="delServiceDetail('<?= $item->id; ?>');" class="dropdown-item"><i class="fas fa-trash-alt"></i>Delete</button>
                                </div>
                            </div>
                        </div>
                    </td>
                <?php endif; ?>
            </tr>

        <?php endforeach; ?>

    </tbody>


    <!--
    <tfoot>

        <tr>

            <th colspan="4" class="text-right">

                ยอดรวม

            </th>

            <th class="text-danger"><?= number_format($sum, 2); ?></th>

            <th>บาท</th>

        </tr>

    </tfoot>
        -->
</table>



<script>
    $('#tblServiceDetail').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": false,

        "ordering": false,

        "info": false,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 10,



        language: {

            search: "ค้นหา :",

            searchPlaceholder: "ค้นหาข้อมูลในตาราง",

            "lengthMenu": "แสดง _MENU_ รายการ/หน้า",

            "zeroRecords": "--ไม่มีรายการ--",

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
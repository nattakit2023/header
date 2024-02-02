<table class="table table-bordered table-hover" id="tblCalendar2">

    <thead>

        <tr class="text-center">

            <th style="width: 10%">PMS Invoice</th>

            <th style="width: 10%">Installation Date</th>

            <th style="width: 10%">End Date</th>

            <th style="width: 15%">Customer</th>

            <th style="width: 15%">Vessel Name</th>

            <th style="width: 15%">Status</th>

            <th style="width: 10%">ตัวเลือก</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($pms as $item) : ?>

            <tr id="row<?= $item->pms_invoice; ?> " class="text-center">

                <td><?= $item->pms_invoice; ?></td>

                <td><?= date_format(date_create($item->plan_due_pms), 'd/m/Y'); ?></td>

                <td><?= date_format(date_create($item->plan_end_pms), 'd/m/Y'); ?></td>

                <td><?= $item->cus_name ?></td>

                <td><?= $item->ves_name ?></td>

                <td><?php switch ($item->pms_status) {
                        case 'created':

                            echo '<span class="badge badge-dark">Planning</span>';

                            break;

                        case 'success':

                            echo '<span class="badge badge-success">Succes</span>';

                            break;

                        default:

                            echo '';
                    } ?></td>

                <td class="text-center">
                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown"><i class="assignment"></i>Action</button>
                            <div class="dropdown-menu">
                                <button type="button" target="_blank" onclick="detail('<?= $item->pms_invoice; ?>')" class="dropdown-item">Details</button>
                                    <?php if ($item->pms_status != 'success') : ?>
                                        <button onclick="modalEditService('<?= $item->pms_invoice; ?>')" class="dropdown-item">Edit Calendar</button>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<input type="hidden" id="edit_con_id">

<script>
    $('#tblCalendar2').DataTable({

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
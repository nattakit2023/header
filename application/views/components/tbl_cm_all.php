<table class="table table-bordered table-hover" id="tblCM">

    <thead>

        <tr class="text-center">

            <th style="width: 5%">ID</th>

            <th style="width: 10%;">CM Invoice</th>

            <th style="width: 15%">Project Code</th>

            <th style="width: 10%">Product</th>

            <th style="width: 15%">Customer Name</th>

            <th style="width: 20%">Vessel</th>

            <th style="width: 10%">Status</th>

            <th>Option</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($service_cm as $item) : ?>

            <tr id="<?= $item->id; ?>">

                <td class="text-center"><span class="badge badge-dark"><?= $item->id; ?></span></td>

                <td><?= $item->cm_invoice ?></td>

                <td><?= $item->project; ?></td>

                <td><?= $item->product; ?></td>

                <td><?= $item->cus_name; ?></td>

                <td><?= $item->ves_fleet; ?> ( <?= $item->ves_name; ?> )</td>

                <td class="text-center">

                    <?php

                    switch ($item->cm_status) {

                        case 'created':

                            echo '<span class="badge badge-primary">Created</span>';

                            break;

                        case 'success':

                            echo '<span class="badge badge-success">Success</span>';

                            break;

                        default:

                            echo '';
                    }

                    ?>

                </td>

                <td class="text-center">

                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown">Action</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" target="_blank" href="<?= base_url(); ?>prints/print_cm?cm=cm&id=<?= $item->id ?>"><?= strtoupper('cm') ?></a>

                                <?php if ($item->cm_status == 'created') : ?>

                                    <button class="dropdown-item" id="createService" onclick="create(<?= $item->id ?>,<?= $item->id_calendar ?>)"> Converse Job</button>
                                    <button class="dropdown-item" id="delCM" onclick="del(<?= $item->id ?>,<?= $item->id_calendar ?>)"> Delete CM</button>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<script>
    $('#tblCM').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": true,

        "ordering": false,

        "info": true,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 10,

        language: {

            search: "Search :",

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
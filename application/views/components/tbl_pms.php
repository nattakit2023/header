<table class="table table-bordered table-hover" id="tblPMS">

    <thead>

        <tr class="text-center">

            <th style="width: 10%">Job Order</th>

            <th style="width: 15%">Vessel</th>

            <th>Customer</th>

            <th style="width: 15%">Telephone</th>

            <th style="width: 10%">Status</th>

            <th style="width: 15%">Option</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($service as $item) : ?>

            <?php if ($item->$pms == '1' || $item->$pms == 'created') : ?>

                <tr>

                    <td class="text-center"><span class="badge badge-dark"><?= $item->service_invoice; ?></span></td>

                    <td>
                        <div class="row">

                            <div class="col-md-8">
                                <?php $i = 1;
                                foreach ($service_vessel as $vessel) : ?>
                                    <?php if ($item->service_invoice == $vessel->service_invoice) : ?>
                                        <?php if ($i > 1) : ?>
                                            /
                                        <?php endif; ?>
                                        <?= $vessel->ves_name;  ?>
                                    <?php $i++;
                                    endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </td>

                    <td><?= $item->cus_name; ?></td>

                    <td><?= $item->cus_tel; ?></td>

                    <td class="text-center">

                        <?php

                        switch ($item->service_status) {

                            case 'created':

                                echo '<span class="badge badge-primary">Created</span>';

                                break;

                            case 'verify':

                                echo '<span class="badge badge-info">Verify</span>';

                                break;

                            case 'approve':

                                echo '<span class="badge badge-danger">Approve</span>';

                                break;

                            case 'wait':

                                echo '<span class="badge badge-danger">Wait</span>';

                                break;

                            case 'fixed':

                                echo '<span class="badge badge-warning">Inprogress</span>';

                                break;

                            case 'uninstall':

                                echo '<span class="badge badge-danger">Uninstall</span>';

                                break;

                            case 'done':

                                echo '<span class="badge badge-success">Completed</span>';

                                break;

                            default:

                                echo '';
                        }

                        ?>

                    </td>

                    <td class="text-center">

                        <?php if ($item->$pms == '1') { ?>

                            <a class="btn btn-sm btn-outline-primary rounded-0" href="<?= base_url(); ?>pages/reports/<?= $pms ?>/<?= $item->service_invoice ?>"> Create <?= strtoupper($pms) ?></a>

                        <?php } else if ($item->$pms == 'created') { ?>

                            <a class="btn btn-sm btn-outline-danger rounded-0" target="_blank" href="<?= base_url(); ?>service/print_report?pms=<?= $pms ?>&invoice=<?= $item->service_invoice ?>"><?= strtoupper($pms) ?></a>

                            <a href="#" class="btn btn-sm btn-outline-success rounded-0">Edit <?= strtoupper($pms) ?></a>

                        <?php } ?>
                    </td>

                </tr>
            <?php endif; ?>

        <?php endforeach; ?>

    </tbody>

</table>






<script>
    $('#tblPMS').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": true,

        "ordering": false,

        "info": true,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 25,

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
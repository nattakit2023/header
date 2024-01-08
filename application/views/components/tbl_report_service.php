<table class="table table-bordered table-hover" id="tblReportService">

    <thead>

        <tr class="text-center">

            <th style="width: 10%">Job Order</th>

            <th style="width: 15%">Project Code</th>

            <th style="width: 15%">Vessel</th>

            <th style="width: 15%">Customer Name</th>

            <th style="width: 10%">Installation Date</th>

            <th style="width: 10%">Completed Date</th>

            <th style="width: 10%">Option</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($service as $item) : ?>

            <tr>

                <td class="text-center"><span class="badge badge-dark"><?= $item->service_invoice; ?></span></td>

                <td>
                    <?php $i = 1;
                    foreach ($service_project as $project) : ?>
                        <?php if ($project->service_invoice == $item->service_invoice) : ?>
                            <?php if ($i > 1) : ?>
                                /
                            <?php
                            endif; ?>

                            <?= $project->projects ?>

                        <?php $i++;
                        endif; ?>

                    <?php endforeach; ?>
                </td>

                <td><?php $i = 1;
                    foreach ($service_vessel as $vessel) : ?>

                        <?php if ($item->service_invoice == $vessel->service_invoice) : ?>
                            <?php if ($i > 1) : ?>
                                /
                            <?php
                            endif; ?>

                            <?= $vessel->ves_name;  ?>

                        <?php $i++;
                        endif; ?>

                    <?php endforeach; ?></td>

                <td><?= $item->cus_name; ?></td>



                <td class="text-center">

                    <?= date_format(date_create($item->due_date), 'd/m/Y'); ?>

                </td>

                <td class="text-center">

                    <?= date_format(date_create($item->end_date), 'd/m/Y'); ?>

                </td>

                <td class="text-center">

                    <a href="<?= base_url(); ?>pages/service_detail/<?= $item->service_invoice; ?>" class="btn btn-sm btn-default rounded-0">Details</a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<script>
    $('#tblReportService').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": true,

        "ordering": true,

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
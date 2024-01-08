<table class="table table-bordered table-hover" id="tblPMS">

    <thead>

        <tr class="text-center">

            <th style="width: 5%">ID</th>

            <th style="width: 10%;"> PMS Invoice</th>

            <th style="width: 15%">Project Code</th>

            <th style="width: 10%">Product</th>

            <th style="width: 15%">Customer Name</th>

            <th style="width: 20%">Vessel</th>

            <th style="width: 10%">Status</th>

            <th>Option</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($service_pms as $item) : ?>

            <tr id="<?= $item->id; ?>">

                <td class="text-center"><span class="badge badge-dark"><?= $item->id; ?></span></td>

                <td><?= $item->pms_invoice ?></td>

                <td><?= $item->project; ?></td>

                <td><?= $item->product; ?></td>

                <td><?= $item->cus_name; ?></td>

                <td><?= $item->ves_fleet; ?> ( <?= $item->ves_name; ?> )</td>

                <td class="text-center">

                    <?php

                    switch ($item->pms_status) {

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

                    <a class="btn btn-sm btn-outline-danger rounded-0" target="_blank" href="<?= base_url(); ?>service/print_pms?pms=pms&id=<?= $item->id ?>"><?= strtoupper('pms') ?></a>

                    <?php if ($item->pms_status == 'created') : ?>

                        <a class="btn btn-sm btn-outline-primary rounded-0" id="createService" onclick="create(<?= $item->id ?>,<?= $item->id_calendar ?>)"> Converse Job</a>

                        <a href="#" class="btn btn-sm btn-outline-success rounded-0">Edit <?= strtoupper($pms) ?></a>

                    <?php endif; ?>

                </td>

            </tr>

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

    function create(id, calendar) {

        $.ajax({

            url: '<?= base_url(); ?>service/create_service?id=' + id + '&id_calendar=' + calendar,

            method: 'POST',

            dataType: 'JSON',

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    Swal.fire({

                        icon: 'success',

                        title: 'สำเร็จ',

                        text: 'สร้างรายการซ่อมสำเร็จ',

                        showConfirmButton: false,

                        timer: 1500

                    });

                    setTimeout(function() {

                        window.location.assign('<?= base_url(); ?>pages/service_edit_detail/' + res.service_invoice);

                    }, 1500);

                } else {

                    Swal.fire({

                        icon: 'error',

                        title: 'ผิดพลาด!',

                        text: res.message,

                        confirmButtonText: 'ตกลง'

                    });

                    return false;

                }

            }

        })

    }
</script>
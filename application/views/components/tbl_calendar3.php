<table class="table table-bordered table-hover" id="tblCalendar3">

    <thead>

        <tr class="text-center">

            <th style="width: 10%">CM Invoice</th>

            <th style="width: 10%">Installation Date</th>

            <th style="width: 10%">End Date</th>

            <th style="width: 15%">Customer</th>

            <th style="width: 10%">Vessel Name</th>

            <th style="width: 10%">Tel</th>

            <th style="width: 10%">ตัวเลือก</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($cm as $item) : ?>

            <tr id="row<?= $item->cm_invoice; ?> " class="text-center">

                <td><?= $item->cm_invoice; ?></td>

                <td><?= date_format(date_create($item->plan_due_cm), 'd/m/Y'); ?></td>

                <td><?= date_format(date_create($item->plan_end_cm), 'd/m/Y'); ?></td>

                <td><?= $item->cus_name ?></td>

                <td><?= $item->ves_name ?></td>

                <td><?= $item->cus_tel; ?></td>

                <td class="text-center">
                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown"><i class="assignment"></i>Action</button>
                            <div class="dropdown-menu">
                                <button type="button" target="_blank" onclick="detail('<?= $item->cm_invoice; ?>')" class="dropdown-item">Details</button>
                                <?php if ($item->cm_status != 'success') : ?>
                                    <button onclick="modalEditService('<?= $item->cm_invoice; ?>')" class="dropdown-item">Edit Calendar</button>
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
    function del(con_id) {

        Swal.fire({

            title: 'ลบผู้ใช้งาน',

            text: "ต้องการลบข้อมูลผู้ใช้งานนี้?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    html: 'กำลังลบข้อมูลผู้ใช้งาน กรุณารอสักครู่',

                    allowEnterKey: false,

                    allowEscapeKey: false,

                    allowOutsideClick: false,

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>contact/del_contact',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                con_id: con_id

                            },

                            success: function(res) {

                                if (res.status === 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'ลบข้อมูลผู้ใช้เรียบร้อยแล้ว',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    window.location.assign('<?= base_url(); ?>pages/contact');

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

                                        text: res.mesage,

                                        confirmButtonText: 'ตกลง'

                                    });

                                    return false;

                                }

                            }

                        })

                    }

                })

            }

        })

    }


    function edit(con_id) {

        $.ajax({

            url: '<?= base_url(); ?>contact/get_contact',

            method: 'POST',

            dataType: 'JSON',

            data: {
                con_id: con_id
            },

            success: function(res) {

                if (res.status === 'SUCCESS') {

                    $('#edit_con_id').val(res.data.con_id);

                    $('#edit_con_name').val(res.data.con_name);

                    $('#edit_con_email').val(res.data.con_email);

                    $('#edit_con_tel').val(res.data.con_tel);

                }

            }

        })

    }

    $('#tblCalendar3').DataTable({

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
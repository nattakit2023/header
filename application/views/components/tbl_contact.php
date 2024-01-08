<table class="table table-bordered table-hover" id="tblContact">

    <thead>

        <tr class="text-center">

            <th>ชื่อ-นามสกุล</th>

            <th>Email</th>

            <th style="width: 15%">Tel</th>

            <th style="width: 20%">ตัวเลือก</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($contact as $item) : ?>

            <tr id="row<?= $item->con_id; ?>">

                <td><?= $item->con_name; ?></td>

                <td><?= $item->con_email; ?></td>

                <td><?= $item->con_tel; ?></td>

                <td class="text-center">

                    <button onclick="edit('<?= $item->con_id; ?>')" con_id="<?= $item->con_id; ?>" type="button" class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modalEditContact"><i class="fas fa-edit"></i></button>

                    <button onclick="del('<?= $item->con_id; ?>')" type="button" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-trash"></i></button>

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



    $('#tblContact').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": true,

        "ordering": false,

        "info": false,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 25,



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
<table class="table table-bordered table-hover" id="tblPort">

    <thead>

        <tr class="text-center">

            <th>ID</th>

            <th>Port Name</th>

            <th>Province</th>

            <th style="width: 20%">ตัวเลือก</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($port as $item) : ?>

            <tr id="row<?= $item->id; ?>">

                <td><?= $item->id; ?></td>

                <td><?= $item->port_name; ?></td>

                <td><?= $item->port_province; ?></td>

                <td class="text-center">

                    <button onclick="edit('<?= $item->id; ?>')" id="<?= $item->id; ?>" type="button" class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modalEditPort"><i class="fas fa-edit"></i></button>

                    <button onclick="del('<?= $item->id; ?>')" type="button" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-trash"></i></button>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<input type="hidden" id="edit_port_id">

<script>
    function del(port_id) {

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

                            url: '<?= base_url(); ?>port/del_port',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                port_id: port_id

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

                                    window.location.assign('<?= base_url(); ?>pages/port');

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


    function edit(port_id) {

        $.ajax({

            url: '<?= base_url(); ?>port/get_port',

            method: 'POST',

            dataType: 'JSON',

            data: {
                port_id: port_id
            },

            success: function(res) {

                if (res.status === 'SUCCESS') {

                    $('#edit_port_id').val(res.data.id);

                    $('#edit_port_name').val(res.data.port_name);

                    $('#edit_port_province').val(res.data.port_province);

                }

            }

        })

    }



    $('#tblPort').DataTable({

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
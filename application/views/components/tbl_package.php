<table class="table table-bordered table-hover" id="tblPackage">

    <thead>

        <tr class="text-center">

            <th style="width: 10%">ID</th>

            <th style="width: 20%">Package Name</th>

            <th>Package Internet</th>

            <th style="width: 20%">ตัวเลือก</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($package as $item) : ?>

            <tr id="row<?= $item->id; ?>">

                <td class="text-center"><?= $item->id; ?></td>

                <td><?= $item->pack_name; ?></td>

                <td><?= $item->pack_internet; ?></td>

                <td class="text-center">

                    <button onclick="edit('<?= $item->id; ?>')" id="editPackage" type="button" class="btn btn-success btn-sm rounded-0" ><i class="fas fa-edit"></i></button>

                    <button onclick="del('<?= $item->id; ?>')" type="button" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-trash"></i></button>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<input type="hidden" id="edit_id">

<script>
    function del(id) {

        Swal.fire({

            title: 'ลบแพ็คเกจ',

            text: "ต้องการลบข้อมูลแพ็คเกจนี้?",

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

                            url: '<?= base_url(); ?>package/del_package',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                id: id

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

                                    window.location.assign('<?= base_url(); ?>pages/package');

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


    function edit(id) {

        $.ajax({

            url: '<?= base_url(); ?>package/get_package',

            method: 'POST',

            dataType: 'JSON',

            data: {
                id: id
            },

            success: function(res) {

                if (res.status === 'SUCCESS') {

                    $('#edit_id').val(res.data.id);

                    $('#edit_pack_name').val(res.data.pack_name);

                    $('#edit_pack_internet').val(res.data.pack_internet);

                }

            }

        })

    }



    $('#tblPackage').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": true,

        "ordering": false,

        "info": false,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 10,



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
<table class="table table-bordered table-hover" id="tblCalendar4">

    <thead>

        <tr class="text-center">

            <th style="width: 10%">Installation Date</th>

            <th style="width: 10%">End Date</th>

            <th style="width: 25%">Title</th>

            <th style="width: 25%">Descript</th>

            <th style="width: 15%">Color</th>

            <th style="width: 10%">ตัวเลือก</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($event as $item) : ?>

            <tr id="row<?= $item->id; ?> " class="text-center">

                <td><?= date_format(date_create($item->cal_due), 'd/m/Y'); ?></td>

                <td><?= date_format(date_create($item->cal_end), 'd/m/Y'); ?></td>

                <td><?= $item->title ?></td>

                <td><?= $item->descript ?></td>

                <td><button id="color<?= $item->id ?>" class="button"></button></td>

                <td>
                    <button onclick="edit_calendar('<?= $item->id; ?>')" id="<?= $item->id; ?>" class="btn btn-success">Edit</button>
                    <button onclick="del_calendar('<?= $item->id; ?>')" id="<?= $item->id; ?>" class="btn btn-danger">Delete</button>
                </td>

            </tr>

            <div class="modal fade" id="modalEditEvent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content rounded-0">

                        <div class="modal-header bg-dark rounded-0">

                            <h5 class="modal-title" id="edit_header">Edit Calendar</h5>

                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12 mb-2">

                                    <div class="row mb-2">

                                        <label class="col-md-3"><strong class="text-danger">*</strong>Title :</label>
                                        <div class="col-md-9">
                                            <input type="text" id="edit_title" class="form-control rounded-0" value="<?= $item->title ?>">
                                        </div>

                                    </div>

                                    <div class="row mb-2">

                                        <label class="col-md-3"><strong class="text-danger">*</strong>Descript :</label>

                                        <div class="col-md-9">
                                            <textarea id="edit_descript" class="form-control rounded-0" required><?= $item->descript ?></textarea>
                                        </div>

                                    </div>

                                    <div class="row mb-2">

                                        <label class="col-md-3"><strong class="text-danger">*</strong>Start Date :</label>

                                        <div class="col-md-9">
                                            <input type="date" id="edit_due_date" class="form-control rounded-0" placeholder="วันที่ซ่อมบำรุงเสร็จ" value="<?= date($item->due_date) ?>">
                                        </div>

                                    </div>

                                    <div class="row mb-2">

                                        <label class="col-md-3"><strong class="text-danger">*</strong>End Date :</label>

                                        <div class="col-md-9">
                                            <input type="date" id="edit_end_date" class="form-control rounded-0" placeholder="วันที่ซ่อมบำรุงเสร็จ" value="<?= date($item->end_date) ?>">
                                        </div>

                                    </div>

                                    <div class="row mb-2">

                                        <label class="col-md-3"><strong class="text-danger">*</strong>Color :</label>

                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input id="edit_color" name="color" type="color" class="form-control input-md" readonly="readonly" value="<?= $item->color ?>" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" style="text-align: center;">
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4 mt-2">

                                            <button id="editCalendar" class="btn btn-success rounded-0">Edit Event</button>

                                        </div>


                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 mb-2" id="showSearch">

                                    <div class="row">

                                        <div class="col-md-12 mt-2 mb-2 text-center">

                                            <h5 class="text-info"><small>กรอกข้อมูลให้ครบทุกช่อง</small></h5>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        <?php endforeach; ?>

    </tbody>

</table>
<input type="hidden" id="cal_id">
<style>
    .button {
        border: none;
        background-color: white;
        width: 100px;
        height: 10px;
    }
</style>

<script>
    $(document).ready(function() {
        <?php foreach ($event as $item) : ?>

            $('#color' + <?= $item->id ?>).css('background-color', '<?= $item->color ?>');

        <?php endforeach; ?>
    });


    function del_calendar(cal_id) {

        Swal.fire({

            title: 'สร้างอีเวนท์บนปฏิทิน',

            text: "ต้องการสร้างอีเว้นท์นี้?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowEscapeKey: false,

                    allowOutsideClick: false,

                    html: 'กำลังสร้างรายการ กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>calendar/delCalendar',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                id: cal_id

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: res.message,

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    setTimeout(function() {

                                        window.location.assign('<?= base_url(); ?>pages/calendar/');

                                    }, 500);

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

                })

            }
        })
    }

    function edit_calendar(cal_id) {

        $.ajax({

            url: '<?= base_url(); ?>calendar/get_calendar',

            method: 'POST',

            dataType: 'JSON',

            data: {
                cal_id: cal_id
            },

            success: function(res) {

                if (res.status === 'SUCCESS') {

                    $('#modalEditEvent').modal('show');

                    $('#cal_id').val(res.data.id);

                    $('#edit_title').val(res.data.title);

                    $('#edit_descript').val(res.data.descript);

                    $('#edit_due_date').val(res.data.due_date);

                    $('#edit_end_date').val(res.data.end_date);

                    $('#edit_color').val(res.data.color);

                    $('#edit_header').val(res.data.header);

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

    $('#tblCalendar4').DataTable({

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
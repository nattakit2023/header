<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><strong><?=$title?></strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">หน้าหลัก</a></li>

                        <li class="breadcrumb-item active"><?=$title?></li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12 mb-2">

                    <button type="button" onclick="clearForm()" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#modalAddContact"><i class="fas fa-user-plus"></i> Contact</button>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card rounded-0">

                        <div class="card-body" id="showTable">

                            <div class="text-center">

                                <div class="spinner-border text-dark" role="status">

                                    <span class="sr-only">Loading...</span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<!-- Modal Add Contact -->

<div class="modal fade" id="modalAddContact" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">ข้อมูลติดต่อคุมบนเรือ</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Name :</label>
                            <div class="col-md-9">
                                <input type="text" id="con_name" class="form-control rounded-0" placeholder="Contact Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Email :</label>

                            <div class="col-md-9">
                                <input type="email" id="con_email" class="form-control rounded-0" placeholder="Contact Email">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Tel :</label>

                            <div class="col-md-9">
                                <input type="text" id="con_tel" class="form-control rounded-0" placeholder="Contact Tel" maxlength="15" oninput="this.value=this.value.replace(/[^0-9\\-]/g,'');">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button id="createContact" class="btn btn-primary rounded-0">Create</button>

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

<!-- Modal Edit Contact -->

<div class="modal fade" id="modalEditContact" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">แก้ไขข้อมูล</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Name :</label>
                            <div class="col-md-9">
                                <input type="text" id="edit_con_name" class="form-control rounded-0" placeholder="Contact Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Email :</label>

                            <div class="col-md-9">
                                <input type="text" id="edit_con_email" class="form-control rounded-0" placeholder="Contact Email">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Tel :</label>

                            <div class="col-md-9">
                                <input type="text" id="edit_con_tel" class="form-control rounded-0" placeholder="Contact Tel" maxlength="15" oninput="this.value=this.value.replace(/[^0-9\\-]/g,'');">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button type="button" id="EditContact" class="btn btn-primary rounded-0">Save</button>

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


<script>
    function tblContact() {

        $.ajax({

            url: '<?= base_url(); ?>contact/tbl_contact',

            method: 'POST',

            success: function(res) {

                $('#showTable').html(res);

            }

        })

    }

    $(document).ready(function() {

        tblContact();

    });

    function clearForm(){

        $('#con_name').val('');

        $('#con_tel').val('');

        $('#con_email').val('');

    }



    // Edit Contact

    $(document).on('click', '#EditContact', function() {

        let con_id = $('#edit_con_id').val();

        let con_name = $('#edit_con_name').val();

        let con_tel = $('#edit_con_tel').val();

        let con_email = $('#edit_con_email').val();

        

        if (con_id == '' || con_name == '' || con_tel == '' || con_email == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

            text: "ต้องการสร้างรายการซ่อมนี้?",

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

                            url: '<?= base_url(); ?>contact/update_Contact',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                con_id: con_id,

                                con_name: con_name,

                                con_tel: con_tel,

                                con_email: con_email

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'สร้างรายการซ่อมสำเร็จ',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    tblContact();

                                    $('#edit_con_email').val('');

                                    $('#edit_con_tel').val('');

                                    $('#edit_con_name').val('');

                                    $('#modalEditContact').modal('hide');

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

    });

    // Create Contact

    $(document).on('click', '#createContact', function() {

        let con_name = $('#con_name').val();

        let con_tel = $('#con_tel').val();

        let con_email = $('#con_email').val();

        if (con_name == '' || con_tel == '' || con_email == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

            text: "ต้องการสร้างรายการซ่อมนี้?",

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

                            url: '<?= base_url(); ?>contact/create_Contact',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                con_name: con_name,

                                con_tel: con_tel,

                                con_email: con_email

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'สร้างรายการซ่อมสำเร็จ',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    tblContact();

                                    $('#modalAddContact').modal('hide');

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

    });
</script>
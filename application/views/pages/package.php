<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><strong><?= $title ?></strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">หน้าหลัก</a></li>

                        <li class="breadcrumb-item active"><?= $title ?></li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12 mb-2">

                    <button type="button" onclick="clearForm()" class="btn btn-primary rounded-0" id="addPackage"><i class="fas fa-user-plus"></i> Package</button>

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

<!-- Modal Add Package -->

<div class="modal fade" id="modalAddPackage" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">กรอกข้อมูล Package</h5>

                <button type="button" class="close text-white" onclick="hide('modalAddPackage')">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Package Name :</label>
                            <div class="col-md-8">
                                <input type="text" id="pack_names" class="form-control rounded-0" placeholder="Package Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Package Internet :</label>

                            <div class="col-md-8">
                                <input type="email" id="pack_internets" class="form-control rounded-0" placeholder="Package Internet">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button id="createPackage" class="btn btn-primary rounded-0">Create</button>

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

<div class="modal fade" id="modalEditPackage" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">แก้ไขข้อมูล</h5>

                <button type="button" class="close text-white" onclick="hide('modalEditPackage')">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Name :</label>
                            <div class="col-md-9">
                                <input type="text" id="edit_pack_name" class="form-control rounded-0" placeholder="Package Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Email :</label>

                            <div class="col-md-9">
                                <input type="text" id="edit_pack_internet" class="form-control rounded-0" placeholder="Package Internet">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button type="button" id="EditPackage" class="btn btn-primary rounded-0">Save</button>

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
    function tblPackage() {

        $.ajax({

            url: '<?= base_url(); ?>package/tbl_package',

            method: 'POST',

            success: function(res) {

                $('#showTable').html(res);

            }

        })

    }

    function hide(modal) {
        $('#' + modal).modal('hide');
    }

    function clearForm() {

        $('#pack_name').val('');

        $('#pack_internet').val('');

    }

    $(document).ready(function() {

        tblPackage();

    });



    // Modal Package Add

    $(document).on('click', '#addPackage', function() {
        $('#modalAddPackage').modal('show');
    });

    // Modal Package Add

    $(document).on('click', '#editPackage', function() {
        $('#modalEditPackage').modal('show');
    });

    // Edit Package

    $(document).on('click', '#EditPackage', function() {

        let pack_id = $('#edit_id').val();

        let pack_name = $('#edit_pack_name').val();

        let pack_internet = $('#edit_pack_internet').val();


        if (pack_id == '' || pack_name == '' || pack_internet == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'แก้ไขแพ็คเกจ',

            text: "ต้องการแก้ไขข้อมูลแพ็คเกจนี้?",

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

                            url: '<?= base_url(); ?>package/update_Package',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                pack_id: pack_id,

                                pack_name: pack_name,

                                pack_internet: pack_internet,

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'แก้ไขแพ็คเกจสำเร็จ',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    tblPackage();

                                    $('#edit_id').val('');

                                    $('#edit_pack_name').val('');

                                    $('#edit_pack_internet').val('');

                                    $('#modalEditPackage').modal('hide');

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

    // Create Package

    $(document).on('click', '#createPackage', function() {

        let pack_names = $('#pack_names').val();

        let pack_internets = $('#pack_internets').val();

        if (pack_names == '' || pack_internets == '') {

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

            text: "ต้องการสร้างแพ็คเกจนี้?",

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

                            url: '<?= base_url(); ?>package/create_Package',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                pack_names: pack_names,

                                pack_internets: pack_internets,


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

                                    tblPackage();

                                    $('#modalAddPackage').modal('hide');

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
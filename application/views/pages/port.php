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

                    <button type="button" class="btn btn-primary rounded-0" id="addport"><i class="fas fa-user-plus"></i> Port</button>

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

<!-- Modal Add Port -->

<div class="modal fade" id="modalAddPort" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">ข้อมูลท่าเรือ</h5>

                <button type="button" class="close text-white" onclick="hide('modalAddPort')">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Port :</label>

                            <div class="col-md-9">
                                <input type="text" id="port_names" class="form-control rounded-0" placeholder="Port Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Province :</label>
                            <div class="col-md-9">
                                <input type="text" id="port_provinces" class="form-control rounded-0" placeholder="Province of Port">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button id="createPort" class="btn btn-primary rounded-0">Create</button>

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

<!-- Modal Edit Port -->

<div class="modal fade" id="modalEditPort" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">แก้ไขข้อมูล</h5>

                <button type="button" class="close text-white" onclick="hide('modalEditPort')">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Port Name :</label>
                            <div class="col-md-9">
                                <input type="text" id="edit_port_name" class="form-control rounded-0" placeholder="Contact Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Province :</label>

                            <div class="col-md-9">
                                <input type="text" id="edit_port_province" class="form-control rounded-0" placeholder="Contact Email">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button type="button" id="EditPort" class="btn btn-primary rounded-0">Save</button>

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
    function tblPort() {

        $.ajax({

            url: '<?= base_url(); ?>port/tbl_port',

            method: 'POST',

            success: function(res) {

                $('#showTable').html(res);

            }

        })

    }

    function clearFormPort() {

        $('#port_names').val('');

        $('#port_provinces').val('');

    }

    function hide(modal) {
        $('#' + modal).modal('hide');
    }
    
    $(document).ready(function() {

        tblPort();

    });


    //  Show Modal Edit Port 

    $(document).on('click', '#editport', function() {
        $('#modalEditPort').modal('show');
    });


    //  Show Modal Add Port 

    $(document).on('click', '#addport', function() {
        $('#modalAddPort').modal('show');
    });


    // Edit Contact

    $(document).on('click', '#EditPort', function() {

        let port_id = $('#edit_port_id').val();

        let port_names = $('#edit_port_name').val();

        let port_provinces = $('#edit_port_province').val();

        if (port_id == '' || port_names == '' || port_provinces == '') {

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

                            url: '<?= base_url(); ?>port/update_Port',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                port_id: port_id,

                                port_names: port_names,

                                port_provinces: port_provinces

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

                                    $('#edit_con_email').val('');

                                    $('#edit_con_tel').val('');

                                    $('#edit_con_name').val('');

                                    $('#modalEditPort').modal('hide');

                                    tblPort();

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

    // Create Port

    $(document).on('click', '#createPort', function() {

        let port_names = $('#port_names').val();

        let port_provinces = $('#port_provinces').val();

        if (port_names == '' || port_provinces == '') {

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

                            url: '<?= base_url(); ?>port/create_Port',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                port_names: port_names,

                                port_provinces: port_provinces,

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
                                    tblPort();

                                    clearFormPort();

                                    $('#modalAddPort').modal('hide');

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
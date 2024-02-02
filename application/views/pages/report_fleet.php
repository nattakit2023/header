<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><i class="fas fa-clipboard-list"></i><strong> <?= $title ?></strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">Index</a></li>

                        <li class="breadcrumb-item active"> <?= $title ?></li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

            <!-- เวลา -->

            <div class="row">

                <div class="col-md-12 mb-2">

                    <a href="<?= base_url(); ?>/pages/create_equipment" class="btn btn-primary rounded-0"><i class="fas fa-tools"></i> Create </a>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card rounded-0">
                        <div class="card-header rounded-0">
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-ship"></i> Fleet</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" onclick="tblReportFleet(null)">All</a>

                                            <?php foreach ($fleet as $item) : ?>
                                                <button class="dropdown-item" id="<?= $item->name ?>" onclick="tblReportFleet(<?= $item->name ?>)"><?= $item->name ?></button>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="fas fa-file"></i> Export</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Excel</a>
                                            <a class="dropdown-item" href="#">PDF</a>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>

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

<!-- Modal Edit Equipment -->

<div class="modal fade" id="equipment" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title" id="title"></h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Fleet :</label>

                            <div class="col-md-8">
                                <input type="text" id="fleets" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Vessel :</label>
                            <div class="col-md-8">
                                <input type="text" id="vessels" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Type :</label>
                            <div class="col-md-8">
                                <input type="text" id="types" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Sattellite :</label>
                            <div class="col-md-8">
                                <input type="text" id="sattellites" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Zone :</label>
                            <div class="col-md-8">
                                <input type="text" id="zones" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Size :</label>
                            <div class="col-md-8">
                                <input type="text" id="sizes" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Antenna Maker :</label>
                            <div class="col-md-8">
                                <input type="text" id="antennas" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>System :</label>
                            <div class="col-md-8">
                                <input type="text" id="systems" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Modem :</label>
                            <div class="col-md-8">
                                <input type="text" id="modems" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Controller :</label>
                            <div class="col-md-8">
                                <input type="text" id="controllers" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Installation Date :</label>
                            <div class="col-md-8">
                                <input type="date" id="due_dates" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Complete Date :</label>
                            <div class="col-md-8">
                                <input type="date" id="end_dates" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>VoIP :</label>
                            <div class="col-md-8">
                                <input type="text" id="voips" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>TVRO :</label>
                            <div class="col-md-8">
                                <input type="text" id="tvros" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>CCTV :</label>
                            <div class="col-md-8">
                                <input type="date" id="cctvs" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Status :</label>
                            <div class="col-md-8">
                                <input type="text" id="status" class="form-control rounded-0">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12 mt-2 text-center">

                                <button id="Edit" class="btn btn-success rounded-0">Edit</button>

                                <button id="Cancel" data-dismiss="modal" class="btn btn-danger rounded-0" hidden>Cancel</button>

                                <button id="Save" class="btn btn-primary rounded-0" hidden>Save</button>

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

<input type="hidden" id="edit_id_eqp">

<script>
    function equipment(id) {

        $.ajax({

            url: '<?= base_url(); ?>report/get_equipment',

            method: 'POST',

            dataType: 'JSON',

            data: {

                id: id
            },

            success: function(res) {

                if (res.status === 'SUCCESS') {

                    $('#equipment').modal('show');

                    $('#Save, #Cancel').attr('hidden', true);

                    $('#Edit').attr('hidden', false);

                    if (res.data.service_invoice != '') {
                        $('#title').html('By Job :' + res.data.service_invoice + ' (' + res.data.due_date + ' - ' + res.data.end_date + ' )');
                    } else {
                        $('#title').html(res.data.vessel + ' ( ' + res.data.due_date + ' - ' + res.data.end_date + ' )');
                    }

                    $('#edit_id_eqp').val(id);

                    $('#fleets').val(res.data.fleet).prop('disabled', true);

                    $('#vessels').val(res.data.vessel).prop('disabled', true);

                    $('#types').val(res.data.type).prop('disabled', true);

                    $('#sattellites').val(res.data.sattellite).prop('disabled', true);

                    $('#zones').val(res.data.zone).prop('disabled', true);

                    $('#sizes').val(res.data.size).prop('disabled', true);

                    $('#antennas').val(res.data.antenna).prop('disabled', true);

                    $('#systems').val(res.data.system).prop('disabled', true);

                    $('#modems').val(res.data.modem).prop('disabled', true);

                    $('#controllers').val(res.data.controller).prop('disabled', true);

                    $('#due_dates').attr('value', res.data.due_date).prop('disabled', true);

                    $('#end_dates').attr('value', res.data.end_date).prop('disabled', true);

                    $('#voips').val(res.data.voip).prop('disabled', true);

                    $('#tvros').val(res.data.tvro).prop('disabled', true);

                    $('#cctvs').val(res.data.cctv).prop('disabled', true);

                    $('#status').val(res.data.edit_status).prop('disabled', true);

                }

            }
        });
    }

    function tblReportFleet(fleet) {

        $.ajax({

            url: '<?= base_url(); ?>report/tblReportFleet?fleet=' + fleet,

            method: 'POST',

            success: function(res) {

                $('#showTable').html(res);

            }

        })

    }


    $(document).ready(function() {

        tblReportFleet(null);

    });

    $(document).on('click', '#Save', function() {

        var formdata = new FormData();

        formdata.append('edit_id_eqp', $('#edit_id_eqp').val());

        formdata.append('fleets', $('#fleets').val());

        formdata.append('vessels', $('#vessels').val());

        formdata.append('types', $('#types').val());

        formdata.append('sattellites', $('#sattellites').val());

        formdata.append('zonessizes', $('#zonessizes').val());

        formdata.append('sizes', $('#sizes').val());

        formdata.append('antennas', $('#antennas').val());

        formdata.append('systems', $('#systems').val());

        formdata.append('modems', $('#modems').val());

        formdata.append('controllers', $('#controllers').val());

        formdata.append('due_dates', $('#due_dates').val());

        formdata.append('end_dates', $('#end_dates').val());

        formdata.append('voips', $('#voips').val());

        formdata.append('tvro', $('#tvros').val());

        formdata.append('cctv', $('#cctvs').val());

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

            text: "ต้องการเปลียนแปลงข้อมูลนี้?",

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

                            url: '<?= base_url() ?>report/edit_equipment',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {
                                data: formdata
                            },

                            processData: false,

                            contentType: false,

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: res.message,

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    $('#Edit').modal('hide');

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

    $(document).on('click', '#Edit', function() {

        $('#sattellites, #zones, #sizes, #antennas, #systems, #modems, #controllers, #due_dates, #end_dates, #voips, #tvros, #cctvs')
            .prop('disabled', false);

        $('#Edit').attr('hidden', true);
        $('#Cancel, #Save').attr('hidden', false);
    });
</script>
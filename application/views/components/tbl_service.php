<table class="table table-bordered table-hover" id="tblService">

    <thead>

        <tr class="text-center">

            <th style="width: 10%">Job Order</th>

            <th style="width: 20%">Vessel</th>

            <th>Customer</th>

            <th style="width: 15%">Telephone</th>

            <th style="width: 10%;">Maintenance</th>

            <th style="width: 10%">Status</th>

            <th style="width: 15%">Option</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($service as $item) : ?>

            <tr>

                <?php if (strtotime(date('Y-m-d')) <= strtotime(date($item->contract_end))) : ?>

                    <td class="text-center"><span class="badge badge-dark"><?= $item->service_invoice; ?></span></td>

                <?php else : ?>

                    <td class="text-center"><span class="badge badge-danger"><?= $item->service_invoice; ?></span></td>

                <?php endif; ?>

                <td>
                    <div class="row">

                        <div class="col-md-8">
                            <?= $item->ves_name ?>
                        </div>

                        <div class="col-md-4">
                            <?php if ($item->his_count > 0) : ?>
                                <button type="button" class="btn btn-outline-danger rounded-0" data-toggle="modal" data-target="#modalHistory<?= $item->service_invoice ?>" id="<?= $item->service_invoice; ?>" value="<?= $item->service_invoice; ?>"><i class="fas fa-exclamation"></i></button>
                            <?php endif; ?>
                        </div>

                    </div>
                </td>

                <td><?= $item->cus_name; ?></td>

                <td><?= $item->cus_tel; ?></td>

                <td><?php if ($item->ves_installation == 'true') {
                        echo '<span>Installation</span>';
                    } else if ($item->ves_survey == 'true') {
                        echo '<span>Survey</span>';
                    } else {
                        echo  '<span>' . $item->ves_maintenance . '</span>';
                    }
                    ?>
                </td>

                <td class="text-center">

                    <?php

                    switch ($item->service_status) {

                        case 'created':

                            echo '<span class="badge badge-dark">Add Equ.</span>';

                            break;

                        case 'verify':

                            echo '<span class="badge badge-success">Verify</span>';

                            break;

                        case 'approve':

                            echo '<span class="badge badge-info">Approve</span>';

                            break;

                        case 'wait':

                            echo '<span class="badge badge-danger">Inprogress</span>';

                            break;

                        case 'fixed':

                            echo '<span class="badge badge-warning">Complete</span>';

                            break;

                        case 'uninstall':

                            echo '<span class="badge badge-primary">Uninstall</span>';

                            break;

                        case 'done':

                            echo '<span class="badge badge-default text-dark">Done</span>';

                            break;

                        default:

                            echo '';
                    }

                    ?>

                </td>

                <td class="text-center">
                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown"><i class="assignment"></i>Action</button>
                            <div class="dropdown-menu">

                                <a href="<?= base_url(); ?>pages/service_detail/<?= $item->service_invoice; ?>" class="dropdown-item">Details</a>

                                <?php if (($this->session->userdata('admin_position') != 'Engineer' || $this->session->userdata('admin_position') != 'User') && $item->service_status == 'created') : ?>

                                    <a href="<?= base_url(); ?>pages/service_edit_detail/<?= $item->service_invoice; ?>" class="dropdown-item" target="_blank">Edit</a>

                                <?php endif; ?>
                                <?php if ($item->service_status == 'fixed') : ?>
                                    <?php if ($item->ves_maintenance == 'Preventive Maintenance' && $item->ves_installation != 'false') : ?>
                                        <a href="<?= base_url(); ?>pages/pms_create?service_invoice=<?= $item->service_invoice; ?>" class="dropdown-item" target="_blank">PMS</a>
                                        <a href="<?= base_url(); ?>pages/cm_create?service_invoice=<?= $item->service_invoice; ?>" class="dropdown-item" target="_blank">CM</a>
                                    <?php endif; ?>
                                    <?php $atp_upload = $this->Function_model->getDataRow('tbl_atp_upload_back', ['service_invoice' => $item->service_invoice]); ?>
                                    <?php if ($atp_upload != NULL) : ?>
                                        <a href="<?= base_url(); ?>/upload_atp_back/<?= $item->service_invoice; ?>/<?= $atp_upload->uploads_name ?>" target="_blank" class="dropdown-item">ATP</a>
                                    <?php endif; ?>
                                    <?php if ($item->ves_installation != 'false') : ?>
                                        <button id="qr_code" onclick="gen_qrcode('<?= $item->service_invoice ?>')" class="dropdown-item">QR Code</button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <!-- Modal Show History -->

            <div class="modal fade" id="modalHistory<?= $item->service_invoice ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content rounded-0">

                        <div class="modal-header bg-dark rounded-0">

                            <h5 class="modal-title">ข้อมูลการตีกลับ</h5>

                            <button type="button" class="close text-white" onclick="hide('modalHistory')">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12 mb-2">
                                    <?php $i = 1; ?>
                                    <?php foreach ($history as $item2) : ?>
                                        <?php if ($item2->service_invoice == $item->service_invoice) : ?>

                                            <div class="row ">
                                                <label class="col-md-4"><strong class="text-danger"><?= $i ?>. </strong><?= $item2->his_name ?></label>

                                            </div>
                                            <div class="row mb-2">
                                                <input type="text" id="con_names" class="form-control rounded-0" placeholder="<?= $item2->descript ?>" disabled>
                                            </div>
                                            <?php $i++; ?>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Modal QR Code -->

            <div class="modal fade" id="modalQRcode" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content rounded-0">

                        <div class="modal-header bg-dark rounded-0">

                            <h5 class="modal-title">
                                <div id="header_qr">sss</div>
                            </h5>

                            <button type="button" class="close text-white" onclick="hide('modalQRcode')">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12 mb-2">

                                    <div class="row mb-3">

                                        <div class="col-md-12" id='qr_code'>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <input type="hidden" id="edit_service_detail_id">

                        </div>

                    </div>

                </div>

            </div>
        <?php endforeach; ?>

    </tbody>

</table>


<script>
    $('#tblService').DataTable({

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

    function gen_qrcode(invoice) {
        $.ajax({
            url: '<?= base_url() ?>qrcodes/generate_qr',
            method: 'POST',
            dataType: 'JSON',
            data: {
                invoice: invoice
            },
            success: function(res) {
                if (res.status == 'SUCCESS') {
                    $('#modalQRcode').modal('show');
                    $('#header_qr').html(res.header);
                    $('#qr_code').html(res.qr_code);
                }

            }
        });

    }

    function hide(modal) {
        $('#' + modal).modal('hide');
    }
</script>
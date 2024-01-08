<table class="table table-bordered table-hover" id="tblService">

    <thead>

        <tr class="text-center">

            <th style="width: 10%">Job Order</th>

            <th style="width: 15%">Vessel</th>

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

                <td class="text-center"><span class="badge badge-dark"><?= $item->service_invoice; ?></span></td>

                <td>
                    <div class="row">

                        <div class="col-md-8">
                            <?php $i = 1;
                            foreach ($service_vessel as $vessel) : ?>
                                <?php if ($item->service_invoice == $vessel->service_invoice) : ?>
                                    <?php if ($i > 1) : ?>
                                        /
                                    <?php endif; ?>
                                    <?= $vessel->ves_name;  ?>
                                <?php $i++;
                                endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php if ($item->his_count > 0) : ?>
                            <button type="button" class="btn btn-outline-danger rounded-0" data-toggle="modal" data-target="#modalHistory<?= $item->service_invoice ?>" id="<?= $item->service_invoice; ?>" value="<?= $item->service_invoice; ?>"><i class="fas fa-exclamation"></i></button>
                        <?php endif; ?>
                    </div>
                </td>

                <td><?= $item->cus_name; ?></td>

                <td><?= $item->cus_tel; ?></td>

                <td><?= $item->ves_maintenance ?></td>

                <td class="text-center">

                    <?php

                    switch ($item->service_status) {

                        case 'created':

                            echo '<span class="badge badge-primary">Created</span>';

                            break;

                        case 'verify':

                            echo '<span class="badge badge-info">Verify</span>';

                            break;

                        case 'approve':

                            echo '<span class="badge badge-danger">Approve</span>';

                            break;

                        case 'wait':

                            echo '<span class="badge badge-danger">Wait</span>';

                            break;

                        case 'fixed':

                            echo '<span class="badge badge-warning">Inprogress</span>';

                            break;

                        case 'uninstall':

                            echo '<span class="badge badge-danger">Uninstall</span>';

                            break;

                        case 'done':

                            echo '<span class="badge badge-success">Completed</span>';

                            break;

                        default:

                            echo '';
                    }

                    ?>

                </td>

                <td class="text-center">

                    <?php if ($item->service_status == 'uninstall' && $item->ves_maintenance == 'Preventive Maintenance' && $item->ves_installation != 'false') : ?>

                        <a href="<?= base_url(); ?>pages/pms_create?service_invoice=<?= $item->service_invoice; ?>" class="btn btn-sm btn-outline-danger rounded-0">PMS</a>

                    <?php endif; ?>
                    <a href="<?= base_url(); ?>pages/service_detail/<?= $item->service_invoice; ?>" class="btn btn-sm btn-outline-primary rounded-0">Details</a>

                    <?php if ($this->session->userdata('admin_position') != 'Engineer') : ?>

                        <a href="<?= base_url(); ?>pages/service_edit_detail/<?= $item->service_invoice; ?>" class="btn btn-sm btn-outline-success rounded-0">Edit</a>

                    <?php endif; ?>

                    <?php if ($item->service_status == 'uninstall') : ?>

                        <?php $atp_upload = $this->Function_model->getDataRow('tbl_atp_upload_back', ['service_invoice' => $item->service_invoice]); ?>
                        <?php if ($atp_upload != NULL) : ?>
                            <a href="<?= base_url(); ?>/upload_atp_back/<?= $item->service_invoice; ?>/<?= $atp_upload->uploads_name ?>" target="_blank" class="btn btn-sm btn-outline-danger rounded-0">ATP</a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($item->service_status == 'done') : ?>

                        <a href="<?= base_url(); ?>pages/update_status/<?= $item->service_invoice; ?>" class="btn btn-sm btn-outline-danger rounded-0">Close</a>

                    <?php endif; ?>

                </td>

            </tr>

            <!-- Modal Show History -->

            <div class="modal fade" id="modalHistory<?= $item->service_invoice ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content rounded-0">

                        <div class="modal-header bg-dark rounded-0">

                            <h5 class="modal-title">ข้อมูลการตีกลับ</h5>

                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

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
</script>
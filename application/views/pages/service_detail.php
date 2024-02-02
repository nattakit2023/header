<?php if ($service == null) {

    redirect('/pages/service_create');
}
$count_product = count($service_product);
$count_engineer = count($engineer);
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-10">

                    <h3><i class="fas fa-tools"></i><strong><?= $title ?></strong> </h3>

                    <?php if ($service->ves_installation == 'true') {
                        echo 'Installation';
                    } else if ($service->ves_survey == 'true') {
                        echo 'Survey';
                    } else {
                        echo $service->ves_maintenance;
                    } ?> ( <?= date_format(date_create($service->due_date), 'd/m/Y'); ?> - <?= date_format(date_create($service->end_date), 'd/m/Y'); ?> )

                </div>

                <div class="col-sm-2">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">Index</a></li>

                        <li class="breadcrumb-item active">Detail</li>

                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12 mb-2">

                    <button class="rounded-0 btn btn-default" onclick="window.history.back();"><i class="fas fa-angle-left"></i> Back</button>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card rounded-0">

                        <div class="card-header bg-light rounded-0">

                            Customer Information

                            <button style="margin-left:20px" type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#modalRemark">Remark <i class="fas fa-exclamation"></i> </button>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <h5>
                                        <p style="padding:0px; margin :0px;" class="text-muted"><strong>Project Code :</strong>
                                            <?= $service->project ?>
                                        </p>
                                    </h5>
                                </div>

                                <div class="col-md-6">
                                    <h5>
                                        <p style="padding:0px; margin :0px;" class="text-muted"><strong>Product :</strong>
                                            <?php $i = 1;
                                            foreach ($service_product as $item) : ?>
                                                <em><?= $item->product ?>
                                                    <?php if ($i < $count_product) : ?>
                                                        /
                                                    <?php $i++;
                                                    endif; ?></em>
                                            <?php endforeach; ?>
                                        </p>
                                    </h5>
                                </div>
                            </div>

                            <p style="margin:0px;" class="text-info"><i class="fas fa-circle"></i> Customer</p>

                            <div class="row">

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Name :
                                        </strong><em><?= $service->cus_name; ?></em></p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Telephone :
                                        </strong><em><?= $service->cus_tel; ?></em></p>

                                </div>

                                <div class="col-md-3">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>E-mail :
                                        </strong><em><?= ($service->cus_email != null ? $service->cus_email : '-'); ?></em>
                                    </p>

                                </div>

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Address :
                                        </strong><em> <?= $service->cus_address; ?></em></p>

                                </div>

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Zipcode :
                                        </strong><em> <?= $service->cus_zipcode ?> </em></p>

                                </div>

                            </div>

                            <p style="margin:0px;" class="text-info mt-2"><i class="fas fa-circle"></i> Vessel</p>

                            <div class="row">

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Fleet :
                                        </strong><em><?= $service->ves_fleet; ?></em></p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Vessel :</strong>
                                        <?= $service->ves_name ?>

                                    </p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Type :
                                        </strong><em><?= $service->ves_type; ?></em></p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Flag :
                                        </strong><em> <?= $service->ves_flag ?> </em></p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Home Port :
                                        </strong><em> <?= $service->ves_home_port ?> </em></p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Call Sign :
                                        </strong><em> <?= $service->ves_callsign ?> </em></p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>MMSI : </strong>
                                        <em><?= $service->ves_mmsi; ?></em>
                                    </p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>IMO Number :
                                        </strong><em> <?= $service->ves_imo; ?></em></p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Year Built :
                                        </strong><em> <?= $service->ves_year ?> </em></p>

                                </div>



                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Gross Tonnage :
                                        </strong><em> <?= $service->ves_gross_tonnage ?> </em></p>

                                </div>

                            </div>

                            <p style="margin:0px;" class="text-info mt-2"><i class="fas fa-circle"></i> Contact Onboard</p>

                            <div class="row ">
                                <div class="col-md-4 ">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Name :
                                        </strong><em> <?= $service->con_name; ?></em></p>

                                </div>
                                <div class="col-md-2 ">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Tel :
                                        </strong><em> <?= $service->con_tel; ?></em></p>

                                </div>
                                <div class="col-md-4 ">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Email :
                                        </strong><em> <?= $service->con_email; ?></em></p>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-2 ">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Port :
                                        </strong><em> <?= $service->port_name; ?></em></p>

                                </div>
                                <div class="col-md-2 ">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Province :
                                        </strong><em> <?= $service->port_province; ?></em></p>

                                </div>
                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>ETA :
                                        </strong><em> <?= date_format(date_create($service->ETA), ' d/m/Y H:i:s'); ?> </em></p>

                                </div>

                                <div class="col-md-2">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>ETD :
                                        </strong><em> <?= date_format(date_create($service->ETD), ' d/m/Y  H:i:s'); ?> </em></p>

                                </div>
                            </div>
                            <p style="margin:0px;" class="text-info mt-2"><i class="fas fa-circle"></i> Package</p>

                            <div class="row">

                                <?php if ($service_package != null) : ?>
                                    <?php foreach ($service_package as $item) : ?>
                                        <div class="row col-md-12">
                                            <div class="col-md-4">

                                                <p style="padding:0px; margin :0px;" class="text-muted"><strong>Package Name :
                                                    </strong><em> <?= $item->pack_name; ?></em></p>

                                            </div>

                                            <div class="col-md-4">

                                                <p style="padding:0px; margin :0px;" class="text-muted"><strong>Package Internet :
                                                    </strong><em> <?= $item->pack_internet; ?></em></p>

                                            </div>
                                            <div class="col-md-4">

                                                <p style="padding:0px; margin :0px;" class="text-muted"><strong>Contract :
                                                    </strong><em> <?= date_format(date_create($service->contract_start), ' d/m/Y'); ?></em>
                                                    -
                                                    </strong><em> <?= date_format(date_create($service->contract_end), ' d/m/Y'); ?></em>
                                                </p>

                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="row col-md-12">
                                        <div class="col-md-4">

                                            <p style="padding:0px; margin :0px;" class="text-muted"><strong>Contract :
                                                </strong><em> <?= date_format(date_create($service->contract_start), ' d/m/Y'); ?></em>
                                                -
                                                </strong><em> <?= date_format(date_create($service->contract_end), ' d/m/Y'); ?></em>
                                            </p>

                                        </div>
                                    </div>
                                <?php endif; ?>


                            </div>

                            <p style="margin:0px;" class="text-info mt-2"><i class="fas fa-circle"></i> Assign</p>
                            <?php foreach ($engineer as $item) : ?>
                                <div class="row">

                                    <div class="col-md-1">

                                        <p style="padding:0px; margin :0px;" class="text-muted"><strong>Engineer</strong></p>

                                    </div>

                                    <div class="col-md-8">

                                        <p>: <?= $item->engineer ?>
                                            <?php if ($item->detail_engineer != '') {
                                                echo '/ ' . $item->detail_engineer;
                                            } else if ($service->service_status == 'created') { ?>
                                                <a onclick="edit_detail_engineer(<?= $item->id ?>)" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                            <?php } ?>
                                        </p>

                                    </div>

                                </div>
                            <?php
                            endforeach; ?>


                            <?php if ($image != null) : $i = 1; ?>
                                <p style="margin:0px;" class="text-info mt-2"><i class="fas fa-circle"></i> File</p>
                                <?php foreach ($image as $item) : ?>
                                    <div class="row">
                                        <div class="col-md-3 mb-2">

                                            <p style="padding:0px; margin :0px;" class="text-muted"><strong>File<?= $i++; ?> :
                                                </strong><a href="<?= base_url() ?>/uploads/<?= $service->service_invoice; ?>/<?= $item->uploads_name; ?>" download=""><em> <?= $item->uploads_name; ?></em></a></p>

                                        </div>
                                        <?php if ($service->service_status == 'created') : ?>
                                            <div class="col-md-1 mb-2">
                                                <button onclick="del('<?= $item->uploads_name; ?>','created')" type="button" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-trash"></i></button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if ($image_back != null) : $i = 1; ?>
                                <p style="margin:0px;" class="text-info mt-2"><i class="fas fa-circle"></i> File Back</p>
                                <?php foreach ($image_back as $item) : ?>
                                    <div class="row">
                                        <div class="col-md-3 mb-2">

                                            <p style="padding:0px; margin :0px;" class="text-muted"><strong>File<?= $i++; ?> :
                                                </strong><a href="<?= base_url() ?>/uploads/<?= $service->service_invoice; ?>/<?= $item->uploads_name; ?>" download=""><em> <?= $item->uploads_name; ?></em></a></p>

                                        </div>
                                        <?php if ($service->service_status == 'fixed') : ?>
                                            <div class="col-md-1 mb-2">
                                                <button onclick="del('<?= $item->uploads_name; ?>','fixed')" type="button" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-trash"></i></button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>


                        </div>

                    </div>

                </div>

            </div>

            <?php if ($service->service_status == 'created' && $this->session->userdata('admin_position') != 'Admin') : ?>

                <div class="row">

                    <div class="col-md-8">

                        <div class="card rounded-0">

                            <div class="card-header rounded-0 bg-dark">

                                <i class="fas fa-cart-plus"></i> Add Service & Order

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-10">

                                        <div class="row">

                                            <div class="col-md-10 mb-2">

                                                <select class="form-control select2 rounded-0" id="service_name" onchange="optionQuantity(value)">

                                                    <option value="">Loading...</option>

                                                </select>

                                            </div>

                                            <div class="col-md-2 mb-2">

                                                <select class="form-control select2 rounded-0" id="amount">

                                                    <option value="">กรุณาเลือกสินค้า</option>

                                                </select>

                                            </div>



                                            <!--<div class="col-md-3 mb-2">

                                                <input type="number" id="price" class="form-control rounded-0" min="0" placeholder="ราคาต่อหน่วย">

                                            </div>
                                            -->
                                        </div>

                                        <div class="row">

                                            <div class="col-md-12 mb-2">

                                                <input type="text" id="detail" class="form-control rounded-0" placeholder="More Detail (ถ้ามี)">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-2 mb-2">

                                        <button id="addServiceDetail" class="btn btn-block btn-primary rounded-0"><i class="fas fa-plus"></i> Add</button>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card rounded-0">

                            <div class="card-header bg-dark rounded-0">

                                Add Files

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-8 mb-2 ">

                                        <input type="file" name="files" id="files" multiple>


                                    </div>
                                    <div class="col-md-4 mb-2">

                                        <button id="addFiles" class="btn btn-block btn-primary rounded-0"><i class="fas fa-plus"></i> Add</button>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ($service->service_status == 'wait') : ?>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card rounded-0">

                            <div class="card-header bg-dark rounded-0">

                                Remark Customer Report

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-8 mb-2 ">

                                        <textarea id="remark_add" class="form-control rounded-0" placeholder="Remark" required></textarea>

                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 mb-2">

                                        <button id="updateRemarkAdd" class="btn btn-block btn-primary rounded-0"><i class="fas fa-plus"></i> Add</button>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card rounded-0">

                            <div class="card-header bg-dark rounded-0">

                                Add Files Customer Report

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-8 mb-2 ">

                                        <strong style="font-size: 24px;">Select Files :</strong>
                                        <input type="file" name="files" id="files" multiple>


                                    </div>

                                    <div class="col-md-4 mb-2">

                                        <button id="addFilesBack" class="btn btn-block btn-primary rounded-0"><i class="fas fa-plus"></i> Add</button>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ($service->service_status == 'fixed' && $atp_upload == null && $service->ves_installation == 'true') : ?>

                <div class="col-md-12">
                    <div class="card rounded-0">

                        <div class="card-header bg-dark rounded-0">

                            Add Files ATP Report

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-8 mb-2 ">

                                    <strong style="font-size: 24px;">Select Files :</strong>
                                    <input type="file" name="files" id="files" multiple>


                                </div>

                                <div class="col-md-2">

                                </div>
                                <div class="col-md-2 mb-2">

                                    <button id="addFilesATP" class="btn btn-block btn-primary rounded-0"><i class="fas fa-plus"></i> Add</button>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
        </div>

    <?php endif; ?>

    <div class="row">

        <div class="col-md-8 mb-2">

            <div class="card rounded-0">

                <div class="card-header bg-dark rounded-0">

                    Service Order

                </div>

                <div class="card-body" id="showServiceDetail">

                    <div class="row">

                        <div class="col-md-12 mb-2 text-center">

                            <p class="text-muted"><em>--Loading..--</em></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-2">

            <div class="card rounded-0">
                <?php if ($service->service_status != '' && $service->ves_installation == 'true') : ?>
                    <?php if ($service->service_status != 'created' && $service->service_status != 'verify') : ?>

                        <div class="row">

                            <div class="col-md-4 mt-2">

                                <a id="paper_receipt" class="btn btn-default btn-block rounded-0" target="_blank" href="<?= base_url(); ?>prints/print_job?invoice=<?= $service->service_invoice; ?>">Job Order</a>

                            </div>

                            <div class="col-md-4 mt-2">

                                <a id="paper_receipt" class="btn btn-default btn-block rounded-0" target="_blank" href="<?= base_url(); ?>prints/print_customer?invoice=<?= $service->service_invoice; ?>">Customer
                                    Report</a>

                            </div>

                            <div class="col-md-4 mt-2">
                                <?php if ($service->atp_create == 'created') : ?>
                                    <a id="paper_receipt" class="btn btn-default btn-block rounded-0" target="_blank" href="<?= base_url(); ?>prints/print_atp?invoice=<?= $service->service_invoice; ?>">
                                        ATP Report
                                    </a>
                                <?php endif; ?>
                                <?php if ($service->atp_create == '') : ?>
                                    <a id="paper_receipt" class="btn btn-default btn-block rounded-0" target="_blank" href="<?= base_url(); ?>pages/atp_report/<?= $service->service_invoice; ?>">
                                        Create ATP
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php else : ?>
                    <?php if ($service->service_status != 'created' && $service->service_status != 'verify') : ?>
                        <div class="row">
                            <div class="col-md-6 mt-2">

                                <a id="paper_receipt" class="btn btn-default btn-block rounded-0" target="_blank" href="<?= base_url(); ?>prints/print_job?invoice=<?= $service->service_invoice; ?>">Job Order</a>

                            </div>

                            <div class="col-md-6 mt-2">

                                <a id="paper_receipt" class="btn btn-default btn-block rounded-0" target="_blank" href="<?= base_url(); ?>prints/print_customer?invoice=<?= $service->service_invoice; ?>">Customer Report</a>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Button Step to Update Status -->

                <div class="row">

                    <div class="col-md-12 mt-2" id="update"></div>

                </div>
                <?php if ($service->service_status != 'created' && $service->service_status != '' && ($this->session->userdata('admin_position') == 'Management' || $this->session->userdata('admin_position') == 'Super admin')) : ?>
                    <div class="row">
                        <div class="col-md-12 mt-2">

                            <button type="button" class="btn btn-danger btn-block rounded-0" id="back_order">Back Order</button>

                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->userdata('admin_position') == 'Super admin' && $service->service_status != '') : ?>
                    <div class="row">

                        <div class="col-md-12 mt-2">

                            <button id="btnCancelService" class="btn btn-default btn-block rounded-0">Cancle</button>

                        </div>

                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>
    </section>
</div>

<!-- Modal Add History -->

<div class="modal fade" id="modalAddHistory" tabindex="-1" role="dialog" aria-labelledby="modelBackOrder" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">รายละเอียด</h5>

                <button type="button" class="close text-white" onclick="hide('modalAddHistory')">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Name:</label>
                            <div class="col-md-9">
                                <select class="form-control select2 rouned-0" id="his_name">
                                    <option value="">Loading ...</option>
                                </select>
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Descript :</label>

                            <div class="col-md-9">
                                <textarea name="descript" id="descript" class="form-control rounded-0" placeholder="Descript"></textarea>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button id="btnBacktoOrder" class="btn btn-primary rounded-0">Create</button>

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

<!-- Modal Remark -->

<div class="modal fade" id="modalRemark" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">Remark</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-3">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Remark :</label>

                            <div class="col-md-9">
                                <textarea class="form-control rounded-0" disabled><?= $service->remark_create ?> </textarea>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Modal Engineer -->

<div class="modal fade" id="modalEngineer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">Engineer</h5>

                <button type="button" class="close text-white" onclick="hide('modalEngineer')">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-3">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Engineer :</label>

                            <div class="col-md-9">
                                <input id="edit_engineer" class="form-control rounded-0" disabled></input>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Detail :</label>

                            <div class="col-md-9">
                                <textarea id="edit_detail_engineer" class="form-control rounded-0"></textarea>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-5"></div>

                    <div class="col-md-4 mt-2">

                        <button id="add_detail_engineer" class="btn btn-primary rounded-0">Save</button>

                    </div>

                </div>

                <input type="hidden" id="edit_engineer_id">

            </div>

        </div>

    </div>

</div>

<!-- Modal Serail Number -->

<div class="modal fade" id="modalSerialnumber" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">Detail Equipment</h5>

                <button type="button" class="close text-white" onclick="hide('modalSerialnumber')">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-3">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Equipment :</label>

                            <div class="col-md-9">
                                <input id="edit_service_detail" class="form-control rounded-0" disabled></input>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <label class="col-md-3"><strong class="text-danger">*</strong>S/N :</label>

                            <div class="col-md-9">
                                <input type="text" id="edit_serial_number" class="form-control rounded-0"></input>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-5"></div>

                    <div class="col-md-4 mt-2">

                        <button id="add_serial_number" class="btn btn-primary rounded-0">Save</button>

                    </div>

                </div>

                <input type="hidden" id="edit_service_detail_id">

            </div>

        </div>

    </div>

</div>


<script>
    var service_invoice = '<?= $service->service_invoice; ?>';

    var atp_back = '<?= $atp_upload ?>';

    var service_status = '<?= $service->service_status; ?>';

    var user_position = '<?= $admin_position ?>';

    function del(filename, check) {
        Swal.fire({

            title: 'ลบไฟล์',

            text: "ต้องการลบไฟล์?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    html: 'กำลังลบไฟล์ กรุณารอสักครู่',

                    allowEnterKey: false,

                    allowEscapeKey: false,

                    allowOutsideClick: false,

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>service/del_file',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice,

                                filename: filename,

                                check: check

                            },

                            success: function(res) {

                                if (res.status === 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'ลบไฟล์เรียบร้อยแล้ว',

                                        showConfirmButton: false

                                    });

                                    setTimeout(function() {

                                        window.location.assign('<?= base_url(); ?>/pages/service_detail/<?= $service->service_invoice ?>');

                                    }, 1500);

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

    function clearFormService() {

        $('#service_name').val('');

        $('#amount').val('');

        $('#price').val('');

        $('#detail').val('');

        $('#remark_add').val('');

        $('#files').val('');

    }

    function clearFormSerialnumber() {
        $('#edit_service_detail').val('');

        $('#edit_serial_number').val('');

        $('#edit_service_detail_id').val('');
    }

    //Option History
    function optionHistory() {

        $.ajax({

            url: '<?= base_url(); ?>/service/option_history',

            method: 'POST',

            success: function(res) {

                $('#his_name').html(res);

            }

        })

    }

    //ดึงOption ของ Product
    function optionProduct() {

        $.ajax({

            url: '<?= base_url(); ?>/product/option_product',

            method: 'POST',

            success: function(res) {

                $('#service_name').html(res);

            }

        })

    }

    //ดึงOption ของ Product
    function optionQuantity($product_name) {
        $.ajax({

            url: '<?= base_url(); ?>/product/option_quantity',

            method: 'POST',

            data: {
                product_name: $product_name
            },


            success: function(res) {

                $('#amount').html(res);

            }

        })

    }

    //ดึงข้อมูลรายละเอียด Service Detail
    function getServiceDetail() {

        $.ajax({

            url: '<?= base_url(); ?>/service/tbl_service_detail',

            method: 'POST',

            data: {

                service_invoice: service_invoice

            },

            success: function(res) {

                $('#showServiceDetail').html(res);

            }

        })

    }

    //ลบข้อมูลรายละเอียด

    function delServiceDetail(detail_id) {

        Swal.fire({

            title: 'ลบข้อมูล',

            text: "ต้องการลบสินค้า & บริการนี้?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowOutsideClick: false,

                    allowEscapeKey: false,

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/del_service_detail',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice,

                                detail_id: detail_id

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        allowEnterKey: false,

                                        allowOutsideClick: false,

                                        allowEscapeKey: false,

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'ลบสินค้า & บริการเรียบร้อยแล้ว',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    getServiceDetail();



                                } else {

                                    Swal.fire({

                                        icon: 'warning',

                                        title: 'ผิดพลาด',

                                        text: res.message,

                                        confirmButtonText: 'ตกลง'

                                    })

                                    return false;

                                }

                            }

                        })

                    }

                })



            }

        })

    }

    // Edit Engineer

    function edit_detail_engineer(id) {

        $.ajax({
            url: '<?= base_url() ?>engineer/get_engineer',
            method: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(res) {

                if (res.status === 'SUCCESS') {

                    $('#modalEngineer').modal('show');

                    $('#edit_engineer').val(res.engineer);

                    $('#edit_engineer_id').val(res.id);

                }
            }
        });
    }

    // Add Serial Number

    function add_serial_number(id) {
        $.ajax({
            url: '<?= base_url() ?>product/get_product',
            method: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(res) {

                if (res.status === 'SUCCESS') {

                    clearFormSerialnumber();

                    $('#modalSerialnumber').modal('show');

                    $('#edit_service_detail').val(res.product_name);

                    $('#edit_service_detail_id').val(res.product_id);

                }
            }
        });
    }

    // Edit Serial Number

    function edit_serial_number(id) {
        $.ajax({
            url: '<?= base_url() ?>product/get_product',
            method: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(res) {

                if (res.status === 'SUCCESS') {

                    clearFormSerialnumber();

                    $('#modalSerialnumber').modal('show');

                    $('#edit_service_detail').val(res.product_name);

                    $('#edit_serial_number').val(res.serial_number);

                    $('#edit_service_detail_id').val(res.product_id);

                }
            }
        });
    }

    // Button Update

    function Button_status() {
        if (service_status == 'created') {
            if (user_position != 'User' || user_position != 'Admin') {
                $('#update').html('<button id="update_status" class="btn btn-primary btn-block rounded-0" ><i class="fas fa-save"></i> Save</button>');
            }
        } else if (service_status == 'verify') {
            if (user_position != 'User' || user_position != 'Admin') {
                $('#update').html('<button id="update_status" class="btn btn-success btn-block rounded-0" ><i class="fas fa-check"></i> Verify</button>');
            }
        } else if (service_status == 'approve') {
            if (user_position == 'Management' || user_position == 'Super admin') {
                $('#update').html('<button id="update_status" class="btn btn-info btn-block rounded-0" ><i class="fas fa-check"></i> Approve</button>');
            }
        } else if (service_status == 'wait') {
            if (user_position != 'User' || user_position != 'Admin') {
                if ('<?= $service->ves_installation ?>' == 'true' && '<?= $service->atp_create ?>' != '') {
                    $('#update').html('<button id="update_status" class="btn btn-warning btn-block rounded-0" ><i class="fas fa-check"></i> Complete Job </button>');
                } else if ('<?= $service->ves_installation ?>' == 'false') {
                    $('#update').html('<button id="update_status" class="btn btn-warning btn-block rounded-0" ><i class="fas fa-check"></i> Complete Maintenance </button>');
                }
            }
        } else if (service_status == 'fixed') {
            if (user_position != 'User' || user_position != 'Admin') {
                if ('<?= $service->ves_installation ?>' == 'true' && <?= strtotime(date('Y-m-d')) ?> >= <?= strtotime(date($service->contract_end)) ?> && atp_back != 0) {
                    $('#update').html('<button id="update_status" class="btn btn-danger btn-block rounded-0" ><i class="fas fa-bin"></i> Uninstall </button>');
                } else if ('<?= $service->ves_installation ?>' == 'false') {
                    $('#update').html('<button id="update_status" class="btn btn-success btn-block rounded-0" ><i class="fas fa-bin"></i>Success Job Order</button>');
                }
            }
        }
    }

    // Hide Modal

    function hide(modal) {
        $('#' + modal).modal('hide');
    }

    $(document).ready(function() {

        optionProduct();

        getServiceDetail();

        Button_status();

    });

    //Back Order
    $(document).on('click', '#back_order', function() {
        $('#modalAddHistory').modal('show');
        optionHistory();
    });

    //Update Status
    $(document).on('click', '#update_status', function() {
        Swal.fire({

            title: 'ส่งงานซ่อม',

            text: "ยืนยันการส่งงาน",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowOutsideClick: false,

                    allowEscapeKey: false,

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();


                        $.ajax({
                            url: '<?= base_url() ?>service/change_status',
                            method: 'POST',
                            dataType: 'JSON',
                            data: {
                                service_invoice: service_invoice
                            },
                            success: function(res) {
                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        allowEnterKey: false,

                                        allowOutsideClick: false,

                                        allowEscapeKey: false,

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: res.message,

                                        showConfirmButton: false,

                                        timer: 1400

                                    });

                                    setTimeout(function() {

                                        window.location.reload();

                                    }, 1500);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

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

    // Add Detail Engineer
    $(document).on('click', '#add_detail_engineer', function() {

        let id = $('#edit_engineer_id').val();

        let detail = $('#edit_detail_engineer').val();

        if (detail == '' || id == '') {

            Swal.fire({
                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;
        }

        $.ajax({
            url: '<?= base_url() ?>engineer/add_detail_engineer',
            method: 'POST',
            dataType: 'JSON',
            data: {
                id: id,
                detail: detail
            },
            success: function(res) {

                if (res.status === 'SUCCESS') {

                    Swal.fire({

                        icon: 'success',

                        title: 'สำเร็จ',

                        text: res.message,

                        showConfirmButton: false,

                        timer: 1500

                    });

                    setTimeout(function() {

                        window.location.reload();

                    }, 1500);

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
        });

    });

    //Update Service Remark Add

    $(document).on('click', '#updateRemarkAdd', function() {

        let remark_add = $('#remark_add').val();

        if (service_invoice == '' || remark_add == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        $.ajax({

            url: '<?= base_url(); ?>/service/updateRemarkAdd',

            method: 'POST',

            dataType: 'JSON',

            data: {

                service_invoice: service_invoice,

                remark_add: remark_add

            },

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    Swal.fire({

                        icon: 'success',

                        title: 'สำเร็จ',

                        text: 'เพิ่มรีมาร์คสำเร็จ',

                        showConfirmButton: false,

                        timer: 1500

                    });

                    clearFormService();

                    optionProduct();

                    getServiceDetail();

                } else {

                    Swal.fire({

                        icon: 'warning',

                        title: 'แจ้งเตือน',

                        text: res.message,

                        confirmButtonText: 'ตกลง'

                    });

                    return false;

                }

            }

        })

    });

    //Add Service Detail

    $(document).on('click', '#addServiceDetail', function() {

        let service_name = $('#service_name').val();

        let amount = $('#amount').val();

        let detail = $('#detail').val();

        if (service_invoice == '' || service_name == '' || amount == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        $.ajax({

            url: '<?= base_url(); ?>/service/add_service_detail',

            method: 'POST',

            dataType: 'JSON',

            data: {

                service_invoice: service_invoice,

                service_name: service_name,

                amount: amount,

                detail: detail

            },

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    Swal.fire({

                        icon: 'success',

                        title: 'สำเร็จ',

                        text: 'เพิ่มสินค้าและบริการสำเร็จ',

                        showConfirmButton: false,

                        timer: 1500

                    });

                    clearFormService();

                    optionProduct();

                    getServiceDetail();

                } else {

                    Swal.fire({

                        icon: 'warning',

                        title: 'แจ้งเตือน',

                        text: res.message,

                        confirmButtonText: 'ตกลง'

                    });

                    return false;

                }

            }

        })

    });

    //Add Serial Number

    $(document).on('click', '#add_serial_number', function() {

        let id = $('#edit_service_detail_id').val();

        let serial_number = $('#edit_serial_number').val();

        if (id == '' || serial_number == '') {
            Swal.fire({
                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'
            });
        }

        $.ajax({
            url: '<?= base_url() ?>product/add_serial_number',
            method: 'POST',
            dataType: 'JSON',
            data: {
                id: id,
                serial_number: serial_number
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

                    getServiceDetail();
                    clearFormSerialnumber();
                    $('#modalSerialnumber').modal('hide');

                } else {
                    Swal.fire({

                        icon: 'warning',

                        title: 'แจ้งเตือน',

                        text: res.message,

                        confirmButtonText: 'ตกลง'

                    });

                    return false;
                }
            }
        });
    });

    //Add Files

    $(document).on('click', '#addFilesATP', function() {

        let files = $('#files')[0].files;

        var formdata = new FormData();

        formdata.append('service_invoice', service_invoice);

        for (var index = 0; index < files.length; index++) {
            formdata.append('files[]', files[index]);
        }



        if (service_invoice == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        $.ajax({

            url: '<?= base_url(); ?>/service/upload_atp_back',

            method: 'POST',

            dataType: 'JSON',

            data: formdata,

            processData: false,

            contentType: false,

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    Swal.fire({

                        icon: 'success',

                        title: 'สำเร็จ',

                        text: 'เพิ่มไฟล์สำเร็จ',

                        showConfirmButton: false,

                        timer: 1500

                    });

                    setTimeout(function() {

                        window.location.assign('<?= base_url(); ?>/pages/service_detail/<?= $service->service_invoice ?>');

                    }, 1500);

                } else {

                    Swal.fire({

                        icon: 'warning',

                        title: 'แจ้งเตือน',

                        text: res.message,

                        confirmButtonText: 'ตกลง'

                    });

                    return false;

                }

            }

        })

    });

    //Add Files

    $(document).on('click', '#addFiles', function() {

        let files = $('#files')[0].files;

        var formdata = new FormData();

        formdata.append('service_invoice', service_invoice);

        for (var index = 0; index < files.length; index++) {
            formdata.append('files[]', files[index]);
            console.log(files[index])
        }

        if (service_invoice == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        $.ajax({

            url: '<?= base_url(); ?>/service/uploads',

            method: 'POST',

            dataType: 'JSON',

            data: formdata,

            processData: false,

            contentType: false,

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    Swal.fire({

                        icon: 'success',

                        title: 'สำเร็จ',

                        text: 'เพิ่มไฟล์สำเร็จ',

                        showConfirmButton: false,

                        timer: 1500

                    });

                    clearFormService();

                    optionProduct();

                    getServiceDetail();

                    setTimeout(function() {

                        window.location.assign('<?= base_url(); ?>/pages/service_detail/<?= $service->service_invoice ?>');

                    }, 1500);

                } else {

                    Swal.fire({

                        icon: 'warning',

                        title: 'แจ้งเตือน',

                        text: res.message,

                        confirmButtonText: 'ตกลง'

                    });

                    return false;

                }

            }

        })

    });

    //Add Files

    $(document).on('click', '#addFilesBack', function() {

        let files = $('#files')[0].files;

        var formdata = new FormData();

        formdata.append('service_invoice', service_invoice);

        for (var index = 0; index < files.length; index++) {
            formdata.append('files[]', files[index]);
        }



        if (service_invoice == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        $.ajax({

            url: '<?= base_url(); ?>/service/uploads_back',

            method: 'POST',

            dataType: 'JSON',

            data: formdata,

            processData: false,

            contentType: false,

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    Swal.fire({

                        icon: 'success',

                        title: 'สำเร็จ',

                        text: 'เพิ่มไฟล์สำเร็จ',

                        showConfirmButton: false,

                        timer: 1500

                    });

                    clearFormService();

                    optionProduct();

                    getServiceDetail();

                    setTimeout(function() {

                        window.location.assign('<?= base_url(); ?>/pages/service_detail/<?= $service->service_invoice ?>');

                    }, 1500);

                } else {

                    Swal.fire({

                        icon: 'warning',

                        title: 'แจ้งเตือน',

                        text: res.message,

                        confirmButtonText: 'ตกลง'

                    });

                    return false;

                }

            }

        })

    });

    //btnBacktoOrder

    $(document).on('click', '#btnBacktoOrder', function() {

        let invoice = "<?= $service->service_invoice ?>";

        let his_name = $('#his_name').val();

        let descript = $('#descript').val();

        if (his_name == '' || descript == '' || invoice == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'เพิ่มข้อความเรียบร้อย',

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

                            url: '<?= base_url(); ?>/service/Back_Order',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                his_name: his_name,

                                descript: descript,

                                invoice: invoice,

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'เตรียมพร้อมแก้ไขสำเร็จ',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    setTimeout(function() {

                                        window.location.assign('<?= base_url(); ?>/pages/service_status?status=created');

                                    }, 1500);

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

    //ตรวจสอบงานซ่อม

    $(document).on('click', '#btnVerify', function() {

        Swal.fire({

            title: 'ส่งงานซ่อม',

            text: "ยืนยันการส่งงาน",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowOutsideClick: false,

                    allowEscapeKey: false,

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/confirm_verify',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        allowEnterKey: false,

                                        allowOutsideClick: false,

                                        allowEscapeKey: false,

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: res.message,

                                        showConfirmButton: false,

                                        timer: 1400

                                    });

                                    setTimeout(function() {

                                        window.location.reload();

                                    }, 1500);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

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

    })

    //รอการอนุมัติการซ่อม

    $(document).on('click', '#btnCheck', function() {

        Swal.fire({

            title: 'ส่งงานซ่อม',

            text: "ยืนยันการส่งงาน",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowOutsideClick: false,

                    allowEscapeKey: false,

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/confirm_check',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        allowEnterKey: false,

                                        allowOutsideClick: false,

                                        allowEscapeKey: false,

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'ตรวจสอบงานเรียบร้อย',

                                        showConfirmButton: false,

                                        timer: 1400

                                    });

                                    setTimeout(function() {

                                        window.location.reload();

                                    }, 1500);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

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

    })

    //ยืนยันงานซ่อม

    $(document).on('click', '#btnConfirm', function() {

        Swal.fire({

            title: 'ส่งงานซ่อม',

            text: "ยืนยันการส่งงาน",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowOutsideClick: false,

                    allowEscapeKey: false,

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/confirm_fix',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        allowEnterKey: false,

                                        allowOutsideClick: false,

                                        allowEscapeKey: false,

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'รับงานเรียบร้อย',

                                        showConfirmButton: false,

                                        timer: 1400

                                    });

                                    setTimeout(function() {

                                        window.location.reload();

                                    }, 1500);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

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

    })

    //ยืนยันงานซ่อม

    $(document).on('click', '#btnUninstall', function() {

        Swal.fire({

            title: 'ส่งงานซ่อม',

            text: "ยืนยันการส่งงาน",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowOutsideClick: false,

                    allowEscapeKey: false,

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/uninstall',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        allowEnterKey: false,

                                        allowOutsideClick: false,

                                        allowEscapeKey: false,

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'รับงานเรียบร้อย',

                                        showConfirmButton: false,

                                        timer: 1400

                                    });

                                    setTimeout(function() {

                                        window.location.reload();

                                    }, 1500);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

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

    })

    //ซ่อมเรียบเสร็จแล้ว

    $(document).on('click', '#btnConfirmFixed', function() {

        Swal.fire({

            title: 'ยืนยันการซ่อม',

            text: "Job Order เรียบร้อยแล้ว?",

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

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/confirm_fixed',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        allowEnterKey: false,

                                        allowOutsideClick: false,

                                        allowEscapeKey: false,

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'อัพเดตสถานะข้อมูลเรียบร้อยแล้ว',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    setTimeout(function() {

                                        window.location.reload();

                                    }, 1400);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

                                        text: res.message,

                                        confirmButtonText: 'ตกลง'

                                    })

                                }

                            }

                        })

                    }

                })

            }

        })

    });

    //รับรถเรียบร้อย

    $(document).on('click', '#btnConfirmPickCar', function() {

        Swal.fire({

            title: 'ยืนยันการซ่อม',

            text: "Job Order เรียบร้อยแล้ว?",

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

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/confirm_pick_car',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        allowEnterKey: false,

                                        allowOutsideClick: false,

                                        allowEscapeKey: false,

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'ยืนยันการรับรถเรียบร้อยแล้ว',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    setTimeout(function() {

                                        window.location.reload();

                                    }, 1400);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

                                        text: res.message,

                                        confirmButtonText: 'ตกลง'

                                    })

                                }

                            }

                        })

                    }

                })

            }

        })

    });

    //เสร็จงาน

    $(document).on('click', '#btnSuccess', function() {

        $.ajax({
            url: '<?= base_url() ?>service/update_status',

            method: 'POST',

            dataType: 'JSON',

            data: {
                service_invoice: service_invoice
            },
            success: function() {

            }
        });
    });

    //Cancel Job Order
    $(document).on('click', '#btnCancelService', function() {

        Swal.fire({

            title: 'ยกเลิก',

            text: "ต้องการยกเลิก?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    html: 'กำลังลบข้อมูล กรุณารอสักครู่...',

                    timerProgressBar: true,

                    allowEnterKey: false,

                    allowEscapeKey: false,

                    allowOutsideClick: false,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/cancel_service',

                            method: 'POST',

                            data: {

                                service_invoice: service_invoice

                            },

                            dataType: 'JSON',

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'ยกเลิกเรียบร้อยแล้ว',

                                        showConfirmButton: false,

                                        timer: 1500,

                                        timerProgressBar: true,

                                        allowEnterKey: false,

                                        allowEscapeKey: false,

                                        allowOutsideClick: false,

                                    });

                                    setTimeout(function() {

                                        window.location.assign('<?= base_url(); ?>pages/service');

                                    }, 1400);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

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

    })
</script>
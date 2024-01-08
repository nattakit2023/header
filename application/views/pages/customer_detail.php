<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-6">

                    <h3><i class="fas fa-ship"></i><strong> Detail <?= $customer->ves_name; ?></strong></h3>

                    <p class="text-muted">History <?= $customer->ves_name; ?></p>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?=base_url();?>/pages">Index</a></li>

                        <li class="breadcrumb-item active">Detail Customer</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-6 mb-2">

                    <button onclick="window.history.back();" class="btn btn-default btn-flat"><i class="fas fa-angle-left"></i> Back</button>

                </div>

                <div class="col-6 mb-2 text-right">

                    <a class="btn btn-default btn-flat" href="<?=base_url();?>/pages/customer"><i class="fas fa-search"></i> Search</a>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card rounded-0">

                        <div class="card-header rounded-0 bg-dark">

                            Information

                        </div>

                        <div class="card-body">

                            <p style="margin:0px;" class="text-info"><i class="fas fa-circle"></i> Customer</p>

                            <div class="row">

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Name : </strong><em><?= $customer->cus_name; ?></em></p>

                                </div>

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Telephone : </strong><em><?= $customer->cus_tel; ?></em></p>

                                </div>

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Tax : </strong><em><?= ($customer->cus_tax != null ? $customer->cus_tax : '-'); ?></em></p>

                                </div>

                                <div class="col-md-12">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Address : </strong><em> <?= $customer->cus_address; ?></em></p>

                                </div>

                            </div>

                            <p style="margin:0px;" class="text-info mt-2"><i class="fas fa-circle"></i> Vessel</p>

                            <div class="row">

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Vessel : </strong><em><?= $customer->license_plate; ?></em></p>

                                </div>

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>MMSI : </strong><em><?= $customer->car_brand; ?></em></p>

                                </div>

                                <div class="col-md-4">

                                    <p style="padding:0px; margin :0px;" class="text-muted"><strong>Call Sign : </strong><em><?= $customer->car_model; ?></em></p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card rounded-0">

                        <div class="card-header rounded-0 bg-warning">

                           <i class="fas fa-history"></i> Service History

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-8">

                                    <div class="row">

                                        <div class="col-md-5 mb-2">

                                            <div class="input-group">

                                                <div class="input-group-prepend">

                                                    <span class="input-group-text rounded-0">From</span>

                                                </div>

                                                <input type="date" value="<?= $this->input->get('datestart'); ?>" id="datestart" class="form-control rounded-0">

                                            </div>

                                        </div>

                                        <div class="col-md-5 mb-2">

                                            <div class="input-group">

                                                <div class="input-group-prepend">

                                                    <span class="input-group-text rounded-0">To</span>

                                                </div>

                                                <input type="date" value="<?= $this->input->get('datestart'); ?>" id="dateend" class="form-control rounded-0">

                                            </div>

                                        </div>

                                        <div class="col-md-2 mb-2">

                                            <button class="btn btn-default btn-flat" id="searchHistory"><i class="fas fa-search"></i> Search</button>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <!-- แสดงตาราง -->

                            <div class="row">

                                <div class="col-md-12" id="showTable">

                                        <p class="text-muted text-center mt-3"><em>Loading...</em></p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>





<script>

    var service_id = '<?=$customers->service_id;?>';

    function tblCustomerHistory(){

        let datestart = $('#datestart').val();

        let dateend = $('#dateend').val();

        $.ajax({

            url : '<?=base_url();?>/customer/tbl_customer_history',

            method : 'POST',

            data : {

                service_id : service_id,

                datestart : datestart,

                dateend : dateend

            },

            success : function(res){

                $('#showTable').html(res);

            }

        })

    }

    $(document).ready(function(){

        tblCustomerHistory();

    });

    $(document).on('click', '#searchHistory', function(){

        let datestart = $('#datestart').val();

        let dateend = $('#dateend').val();

        history.pushState('', '', cus_id+'?datestart=' + datestart + '&dateend=' + dateend);

        tblCustomerHistory();

    });

</script>

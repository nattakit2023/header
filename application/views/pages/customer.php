<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><i class="fas fa-ship"></i><strong> Vessel</strong></h3>

                    <p class="text-muted">Service list</p>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?=base_url();?>/pages">Index</a></li>

                        <li class="breadcrumb-item active">Vessel</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="offset-md-3 col-md-6 mb-2">

                    <div class="input-group">

                        <div class="input-group-prepend ">

                            <span class="input-group-text rounded-0">Vessel</span>

                        </div>

                        <input type="text" onkeyup="searchVesselName()" id="cus_name" value="<?=$this->input->get('cus_name');?>" class="form-control" placeholder="">

                        <span class="input-group-append">

                            <button type="button" onclick="searchVesselName()" onkeyup="searchVesselName()" id="btnSearchLicense" class="btn btn-warning btn-flat"><i class="fas fa-search"></i> Search</button>

                        </span>

                    </div>

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



<script>

    function tblCustomer() {

        let name = '<?=$this->input->get('cus_name');?>';

        $.ajax({

            url : '<?=base_url();?>/customer/tblCustomer',

            method : 'POST',

            data : {

                name : name

            },

            success : function(res){

                $('#showTable').html(res);

            }

        })

    }

    function searchVesselName(){

        let license_plate = $('#license_plate').val();

        history.pushState('', '', 'customer?license_plate=' +license_plate);

        $.ajax({

            url : '<?=base_url();?>/customer/tblCustomer',

            method : 'POST',

            data : {

                license_plate : license_plate

            },

            success : function(res){

                $('#showTable').html(res);

            }

        })

    }

    $(document).ready(function(){

        tblCustomer();

    });

    

    

</script>

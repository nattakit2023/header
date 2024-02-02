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

                        <li class="breadcrumb-item active"> Lists</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12 mb-2">

                    <a href="<?= base_url(); ?>/pages/service_create" class="btn btn-primary rounded-0"><i class="fas fa-tools"></i> Create Job Order</a>

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
    function tblService() {

        $.ajax({

            url: '<?= base_url(); ?>/service/tblService',

            method: 'POST',

            success: function(res) {

                $('#showTable').html(res);

            }

        })

    }

    $(document).ready(function() {

        tblService();

    })

    $(document).on('submit', '#formSubmit', function(e) {

        e.preventDefault();

        let datestart = $('#datestart').val();

        let dateend = $('#dateend').val();

        if (datestart == '' || dateend == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณาเลือกช่วงวันที่ที่ต้องการค้นหา',

                confirmButtonText: 'ตกลง'

            })

            return false;

        }

        tblService();

    });
    
</script>
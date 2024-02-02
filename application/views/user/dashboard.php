<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><strong><?= $title ?> : <?= $vessel ?></strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/page_users?vessel=<?= $vessel ?>">หน้าหลัก</a></li>

                        <li class="breadcrumb-item active"><?= $title ?></li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

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
    var vessel = '<?= $vessel ?>'

    function tblVessel() {

        $.ajax({

            url: '<?= base_url(); ?>page_users/tbl_vessel',

            method: 'POST',

            data: {
                vessel: vessel
            },

            success: function(res) {
                $('#showTable').html(res);
            }

        })

    }

    $(document).ready(function() {

        tblVessel();

    });
</script>
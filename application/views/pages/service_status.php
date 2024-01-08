<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><i class="fas fa-clipboard-list"></i> <strong id="titleHeader"></strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">Index</a></li>

                        <li class="breadcrumb-item active"> Job Order</li>

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

        let status = '<?= $this->input->get('status'); ?>';

        let admin_name = '<?= $this->input->get('admin_name'); ?>';

        if (status == '') {

            window.location.assign('<?= base_url(); ?>/pages/service');

        }

        switch (status) {

            case 'created':

                document.title = 'ขั้นตอนการเพิ่มข้อมูล';

                $('#titleHeader').html('ขั้นตอนการเพิ่มข้อมูล');

                break;

            case 'verify':

                document.title = 'ขั้นตอนการตรวจสอบรายการ';

                $('#titleHeader').html('ขั้นตอนการตรวจสอบรายการ');

                break;

            case 'approve':

                document.title = 'รายการรอการอนุมัติ';

                $('#titleHeader').html('รายการรอการอนุมัติ');

                break;

            case 'wait':

                document.title = 'รายการที่อยู่ระหว่างดำเนินการ';

                $('#titleHeader').html('รายการที่อยู่ระหว่างดำเนินการ');

                break;

            case 'fixed':

                document.title = 'รายการที่ดำเนินการแล้ว';

                $('#titleHeader').html('รายการที่ดำเนินการแล้ว');

                break;

            case 'uninstall':

                document.title = 'รายการที่รอการรื้อถอน';

                $('#titleHeader').html('รายการที่รอการรื้อถอน');

                break;

            case 'done':

                document.title = 'รายการที่ปิดงานเรียบร้อยแล้ว';

                $('#titleHeader').html('รายการที่ปิดงานเรียบร้อยแล้ว');

                break;

            default:

                window.location.assign('<?= base_url(); ?>/pages/service');

        }

        $.ajax({

            url: '<?= base_url(); ?>/service/tblService',

            method: 'POST',

            data: {

                status: status,
                admin_name: admin_name

            },

            success: function(res) {

                $('#showTable').html(res);

            }

        })

    }



    $(document).ready(function() {

        tblService();

    })
</script>
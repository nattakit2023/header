<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary bg-dark">

    <!-- Brand Logo -->

    <a href="<?= base_url(); ?>pages" class="brand-link text-center">

        <img src="<?= base_url(); ?>/assets/img/logosidebar.webp" style="width:100%; max-width: 150px;">

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

        <!-- Sidebar user (optional) -->

        <div class="user-panel mt-3 pb-3 d-flex">

            <div class="info">

                <a href="<?= base_url(); ?>pages" class="d-block"><strong></strong> <?= $this->session->userdata('admin_name'); ?></a>

            </div>

        </div>

        <!-- Sidebar Menu -->

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item ">

                    <a href="<?= base_url(); ?>pages" class="nav-link <?= ($active == 'dashboard') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-home"></i>

                        <p>

                            Home

                        </p>

                    </a>

                </li>

                <li class="nav-item ">

                    <a href="<?= base_url(); ?>pages/service_create" class="nav-link <?= ($active == 'service_create') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-tools"></i>

                        <p>

                            Create Job Order

                        </p>

                    </a>

                </li>

                <li class="nav-item" id="sidebarService">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-clipboard-list"></i>

                        <p>

                            Job List

                            <i class="right fas fa-angle-left"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/service" class="nav-link <?= ($active == 'service' ? 'active' : ''); ?>">

                                <i class="fas fa-circle nav-icon"></i>

                                <p>All</p>

                                <span class="badge badge-info right" id="alertAll"></span>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/service_status?status=created" class="nav-link <?= ($this->input->get('status') == 'created' ? 'active' : ''); ?>">

                                <i class="fas fa-circle nav-icon text-secondary"></i>

                                <p>Add Service</p>

                                <span class="badge badge-info right" id="alertCreated"></span>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/service_status?status=verify" class="nav-link <?= ($this->input->get('status') == 'verify' ? 'active' : ''); ?>">

                                <i class="fas fa-circle nav-icon text-success"></i>

                                <p>Verify</p>

                                <span class="badge badge-info right" id="alertVerify"></span>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/service_status?status=approve" class="nav-link <?= ($this->input->get('status') == 'approve' ? 'active' : ''); ?>">

                                <i class="fas fa-circle nav-icon text-info"></i>

                                <p>Approve</p>

                                <span class="badge badge-info right" id="alertApprove"></span>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/service_status?status=wait" class="nav-link <?= ($this->input->get('status') == 'wait' ? 'active' : ''); ?>">

                                <i class="fas fa-circle nav-icon text-danger"></i>

                                <p>Inprogress</p>

                                <span class="badge badge-info right" id="alertWait"></span>

                            </a>

                        </li>


                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/service_status?status=fixed" class="nav-link <?= ($this->input->get('status') == 'fixed' ? 'active' : ''); ?>">

                                <i class="fas fa-circle nav-icon text-warning"></i>

                                <p>Complete</p>

                                <span class="badge badge-info right" id="alertFixed"></span>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/service_status?status=uninstall" class="nav-link <?= ($this->input->get('status') == 'uninstall' ? 'active' : ''); ?>">

                                <i class="fas fa-circle nav-icon text-primary"></i>

                                <p>Uninstall</p>

                                <span class="badge badge-info right" id="alertUninstall"></span>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/service_status?status=done" class="nav-link <?= ($this->input->get('status') == 'done' ? 'active' : ''); ?>">

                                <i class="fas fa-circle nav-icon text-default"></i>

                                <p>Closed</p>

                                <span class="badge badge-info right" id="alertDone"></span>

                            </a>

                        </li>

                    </ul>

                </li>

                <li class="nav-item" id="sidebarReport">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-clipboard-check"></i>

                        <p>

                            Checklist

                            <i class="right fas fa-angle-left"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <!---

                <li class="nav-item">

                    <a href="<?= base_url(); ?>/pages/product" class="nav-link <?= ($active == 'product') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-shopping-cart"></i>

                        <p>Service</p>

                    </a>

                </li>
                --->
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/report/vsat" class="nav-link <?= ($active == 'vsat') ? 'active' : ''; ?>">

                                <i class="fas fa-satellite	 nav-icon text-info"></i>

                                <p>VSAT</p>

                                <span class="badge badge-info right" id="alertVsat"></span>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/report/cctv" class="nav-link <?= ($active == 'cctv') ? 'active' : ''; ?>">

                                <i class="fas fa-camera nav-icon text-warning"></i>

                                <p>CCTV</p>

                                <span class="badge badge-info right" id="alertCCTV"></span>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/report/voip" class="nav-link <?= ($active == 'voip') ? 'active' : ''; ?>">

                                <i class="fas fa-phone-square nav-icon text-success"></i>

                                <p>VOIP</p>

                                <span class="badge badge-info right" id="alertVoip"></span>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/report/tvro" class="nav-link <?= ($active == 'tvro') ? 'active' : ''; ?>">

                                <i class="fas fa-satellite-dish nav-icon text-danger"></i>

                                <p>TVRO</p>

                                <span class="badge badge-info right" id="alertTvro"></span>

                            </a>

                        </li>
                    </ul>

                </li>


                <!---
                <li class="nav-header text-info">Customer Information</li>

                <li class="nav-item">

                    <a href="<?= base_url(); ?>/pages/customer" class="nav-link <?= ($active == 'customer') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-ship"></i>

                        <p>Information</p>

                    </a>

                </li>

--->
                <li class="nav-header text-info">Planing</li>

                <li class="nav-item">

                    <a href="<?= base_url(); ?>pages/calendar" class="nav-link <?= ($active == 'calendar') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-calendar-day"></i>

                        <p>Calendar</p>

                    </a>

                </li>

                <li class="nav-item" id="sidebarPMS">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-clipboard-check"></i>

                        <p>

                            PMS Check

                            <i class="right fas fa-angle-left"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/report/pms_cre" class="nav-link <?= ($active == 'pms_cre') ? 'active' : ''; ?>">

                                <i class="fas fa-ship	 nav-icon text-info"></i>

                                <p>PMS Created</p>

                                <span class="badge badge-info right" id="alertPms_cre"></span>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/report/pms_suc" class="nav-link <?= ($active == 'pms_suc') ? 'active' : ''; ?>">

                                <i class="fas fa-ship nav-icon text-success"></i>

                                <p>PMS Success</p>

                                <span class="badge badge-info right" id="alertPms_suc"></span>

                            </a>

                        </li>
                    </ul>

                </li>

                <!-- รายงานต่างๆ -->

                <li class="nav-header text-info">Report</li>

                <li class="nav-item">

                    <a href="<?= base_url(); ?>pages/report_service" class="nav-link <?= ($active == 'report_service') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-circle"></i>

                        <p>Report Job Order</p>

                    </a>

                </li>

                <!-- จัดการสินค้าและบริการ -->

                <li class="nav-header text-info">Management</li>

                <li class="nav-item" id="sidebarManagement">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-user-check"></i>

                        <p>

                            Management

                            <i class="right fas fa-angle-left"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <!---

                <li class="nav-item">

                    <a href="<?= base_url(); ?>/pages/product" class="nav-link <?= ($active == 'product') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-shopping-cart"></i>

                        <p>Service</p>

                    </a>

                </li>
                --->
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/port" class="nav-link <?= ($active == 'port') ? 'active' : ''; ?>">

                                <i class="fas fa-anchor	 nav-icon text-danger"></i>

                                <p>Port Management</p>

                                <span class="badge badge-info right" id="alertPort"></span>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/package" class="nav-link <?= ($active == 'package') ? 'active' : ''; ?>">

                                <i class="fas fa-satellite-dish	 nav-icon text-warning"></i>

                                <p>Package Management</p>

                                <span class="badge badge-info right" id="alertPackage"></span>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/contact" class="nav-link <?= ($active == 'contact') ? 'active' : ''; ?>">

                                <i class="fas fa-phone nav-icon text-success"></i>

                                <p>Contact Management</p>

                                <span class="badge badge-info right" id="alertContact"></span>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a href="<?= base_url(); ?>pages/user" class="nav-link <?= ($active == 'user') ? 'active' : ''; ?>">

                                <i class="fas fa-user nav-icon text-info"></i>

                                <p>User Management</p>

                                <span class="badge badge-info right" id="alertUser"></span>

                            </a>

                        </li>
                    </ul>
                </li>




                <!-- ตั้งค่า -->

                <li class="nav-header text-info">Setting</li>

                <li class="nav-item">

                    <a href="<?= base_url(); ?>/pages/change_password" class="nav-link <?= ($active == 'change_password') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-cog"></i>

                        <p>Change Password</p>

                    </a>

                </li>


                <!-- ./ตั้งค่า -->

            </ul>

        </nav>

        <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

</aside>



<script>
    var sidebar = '<?= $sidebar ?>';

    function sidebarService() {

        $.ajax({

            url: '<?= base_url(); ?>/service/sidebar_status',

            method: 'POST',

            dataType: 'JSON',

            success: function(res) {

                //all job

                if (res.service > 0) {

                    $('#alertAll').html(res.service);

                }


                //created

                if (res.service_created > 0) {

                    $('#alertCreated').html(res.service_created);

                }

                //verify

                if (res.service_verify > 0) {

                    $('#alertVerify').html(res.service_verify);

                }

                //approve

                if (res.service_approve > 0) {

                    $('#alertApprove').html(res.service_approve);

                }

                //wait

                if (res.service_wait > 0) {

                    $('#alertWait').html(res.service_wait);

                }

                //fixed

                if (res.service_fixed > 0) {

                    $('#alertFixed').html(res.service_fixed);

                }

                //uninstall

                if (res.service_uninstall > 0) {

                    $('#alertUninstall').html(res.service_uninstall);

                }

                //done

                if (res.service_done > 0) {

                    $('#alertDone').html(res.service_done);

                }

                //PMS All

                if (res.pms_cre > 0) {

                    $('#alertPms_cre').html(res.pms_cre);

                }

                //PMS All

                if (res.pms_suc > 0) {

                    $('#alertPms_suc').html(res.pms_suc);

                }


                //Vsat All

                if (res.vsat > 0) {

                    $('#alertVsat').html(res.vsat);

                }

                //CCTV All

                if (res.cctv > 0) {

                    $('#alertCCTV').html(res.cctv);

                }

                //Tvro All

                if (res.tvro > 0) {

                    $('#alertTvro').html(res.tvro);

                }

                //Voip All

                if (res.voip > 0) {

                    $('#alertVoip').html(res.voip);

                }

                //Port All

                if (res.port > 0) {

                    $('#alertPort').html(res.port);

                }


                //Package All

                if (res.package > 0) {

                    $('#alertPackage').html(res.package);

                }

                //Contact All

                if (res.contact > 0) {

                    $('#alertContact').html(res.contact);

                }

                //User All

                if (res.user > 0) {

                    $('#alertUser').html(res.user);

                }

            }

        })

    }



    $(document).ready(function() {
        sidebarService();
        if (sidebar == 'report') {
            $('#sidebarReport').addClass('menu-open');

        } else if (sidebar == 'management') {
            $('#sidebarManagement').addClass('menu-open');

        } else if (sidebar == 'job') {
            $('#sidebarService').addClass('menu-open');

        } else if (sidebar == 'pms') {
            $('#sidebarPMS').addClass('menu-open');
        }

    })
</script>
<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary bg-dark">

    <!-- Brand Logo -->

    <a href="http://127.0.0.1/support/page_users?vessel=<?= $vessel ?>" class="brand-link text-center">

        <img src="<?= base_url(); ?>/assets/img/logosidebar.webp" style="width:100%; max-width: 150px;">
        <!--<img src="<?= base_url(); ?>/assets/img/logo.png" style="width:100%; max-width: 150px;">-->
    </a>

    <!-- Sidebar -->

    <div class="sidebar">

        <!-- Sidebar user (optional) -->

        <div class="user-panel mt-3 pb-3 d-flex">

            <div class="info">

                <a href="<?= base_url(); ?>page_users?vessel=<?= $vessel ?>" class="d-block"><strong></strong> <?= $this->session->userdata('admin_name'); ?></a>

            </div>

        </div>

        <!-- Sidebar Menu -->

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item ">

                    <a href="<?= base_url(); ?>page_users?vessel=<?= $vessel ?>" class="nav-link <?= ($active == 'dashboard') ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-home"></i>

                        <p>

                            Home

                        </p>

                    </a>

                </li>

            </ul>

        </nav>

        <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

</aside>



<script>
</script>
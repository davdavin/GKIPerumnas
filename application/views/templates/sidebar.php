<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link bg-navy">
        <img src="<?php echo base_url(); ?>assets/dist/img/logo.jpg" alt="Logo GKI Perumnas" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GKI Perumnas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-navy">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if ($this->session->userdata('level_user') != 4) { ?>
                    <li class="nav-item">
                        <a <?= $this->uri->segment(1) == "admin" || $this->uri->segment(1) == "" ? "class='nav-link active'" : "class='nav-link'" ?> href="<?php echo base_url() . 'admin/dashboard' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level_user') == 1) { ?>
                    <li class="nav-item">
                        <a <?php if ($this->uri->segment(1) == "User") {
                                echo "class='nav-link active'";
                            } else {
                                echo "class='nav-link'";
                            } ?> href="<?php echo base_url() . 'User' ?>">
                            <!-- class nav link itu bisa dihapus(?)-->
                            <i class="nav-icon fas fa-user"></i>
                            <p> User </p>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level_user') != 4) { ?>
                    <li class="nav-item">
                        <a <?php if ($this->uri->segment(1) == "Anggota_Jemaat") {
                                echo "class='nav-link active'";
                            } else {
                                echo "class='nav-link'";
                            } ?> href="<?php echo base_url() . 'Anggota_Jemaat' ?>">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p> Anggota Jemaat </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a <?php if ($this->uri->segment(1) == "Pendeta") {
                                echo "class='nav-link active'";
                            } else {
                                echo "class='nav-link'";
                            } ?> href="<?php echo base_url() . 'Pendeta' ?>">
                            <i class="nav-icon fas fa-solid fa-user-friends"></i>
                            <p> Pendeta </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a <?php if ($this->uri->segment(1) == "Wilayah") {
                                echo "class='nav-link active'";
                            } else {
                                echo "class='nav-link'";
                            } ?> href="<?php echo base_url() . 'Wilayah' ?>">
                            <i class="nav-icon fas fa-map"></i>
                            <p> Wilayah </p>
                        </a>
                    </li>
                    <li <?php if ($this->uri->segment(1) == "mengelola_ruangan") {
                            echo "class='nav-item menu-open'";
                        } else {
                            echo "class='nav-item'";
                        } ?>>
                        <a <?php if ($this->uri->segment(1) == "mengelola_ruangan") {
                                echo "class='nav-link active'";
                            } else {
                                echo "class='nav-link'";
                            } ?> href="<?php echo base_url() . 'mengelola_ruangan' ?>">
                            <i class="nav-icon fas fa-door-open"></i>
                            <p>
                                Ruangan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a <?php if ($this->uri->segment(1) == "mengelola_ruangan" && $this->uri->segment(2) == "" || $this->uri->segment(1) == "mengelola_ruangan" && $this->uri->segment(2) == "edit") {
                                        echo "class='nav-link active'";
                                    } else {
                                        echo "class='nav-link'";
                                    } ?> href="<?php echo base_url() . 'mengelola_ruangan' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nama Ruangan</p>
                                </a>
                                <a <?php if ($this->uri->segment(1) == "mengelola_ruangan" && $this->uri->segment(2) == "peminjaman") {
                                        echo "class='nav-link active'";
                                    } else {
                                        echo "class='nav-link'";
                                    } ?> href="<?php echo base_url() . 'mengelola_ruangan/peminjaman' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Peminjaman</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>
                <li <?php if ($this->uri->segment(1) == "keuangan") {
                        echo "class='nav-item menu-open'";
                    } else {
                        echo "class='nav-item'";
                    } ?>>
                    <a <?php if ($this->uri->segment(1) == "keuangan") {
                            echo "class='nav-link active'";
                        } else {
                            echo "class='nav-link'";
                        } ?> href="<?php echo base_url() . 'keuangan' ?>">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Keuangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a <?php if ($this->uri->segment(1) == "keuangan" && $this->uri->segment(2) == "") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                } ?> href="<?php echo base_url() . 'keuangan' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Uang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a <?php if ($this->uri->segment(1) == "keuangan" && $this->uri->segment(2) == "pengeluaran") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                } ?> href="<?php echo base_url() . 'keuangan/pengeluaran' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Uang Keluar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a <?php if ($this->uri->segment(1) == "keuangan" && $this->uri->segment(2) == "laporan") {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                } ?> href="<?php echo base_url() . 'keuangan/laporan' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('level_user') != 4) { ?>
                    <li class="nav-item">
                        <a <?php if ($this->uri->segment(1) == "mengelola_artikel") {
                                echo "class='nav-link active'";
                            } else {
                                echo "class='nav-link'";
                            } ?> href="<?php echo base_url() . 'mengelola_artikel' ?>">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p> Artikel </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a <?php if ($this->uri->segment(1) == "Dokumen") {
                                echo "class='nav-link active'";
                            } else {
                                echo "class='nav-link'";
                            } ?> href="<?php echo base_url() . 'Dokumen' ?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p> Dokumen </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a <?php if ($this->uri->segment(1) == "Konten") {
                                echo "class='nav-link active'";
                            } else {
                                echo "class='nav-link'";
                            } ?> href="<?php echo base_url() . 'Konten' ?>">
                            <i class="nav-icon fas fa-marker"></i>
                            <p> Konten </p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'logout' ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Logout </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>
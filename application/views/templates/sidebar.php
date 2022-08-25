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
                <li class="nav-item">
                    <a <?= $this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == "" ? "class='nav-link active'" : "class='nav-link'" ?> href="<?php echo base_url() . 'Dashboard' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a <?php if ($this->uri->segment(1) == 'Admin') {
                            echo "class='nav-link active'";
                        } else {
                            echo "class='nav-link'";
                        } ?> href="<?php echo base_url() . 'Admin' ?>">
                        <!-- class nav link itu bisa dihapus(?)-->
                        <i class="nav-icon fas fa-user"></i>
                        <p> Admin </p>
                    </a>
                </li>
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
                <!--     <li class="nav-item">
          <a href="<?php echo base_url() . 'BaptisAnak' ?>" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p> Baptis Anak </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Sidi' ?>" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p> Sidi </p>
          </a>
        </li> -->
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'Pendeta' ?>" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-user-friends"></i>
                        <p> Pendeta </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'Wilayah' ?>" class="nav-link">
                        <i class="nav-icon fas fa-map"></i>
                        <p> Wilayah </p>
                    </a>
                </li>
                <!--       <li class="nav-item">
          <a href="<?php echo base_url() . 'Ruangan' ?>" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p> Ruangan </p>
          </a>
        </li> -->
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'Keuangan' ?>" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p> Keuangan </p>
                    </a>
                </li>
                <li <?php if ($this->uri->segment(1) == 'Mengelola_Artikel') {
                        echo "class='nav-item menu-open'";
                    } else {
                        echo "class='nav-item'";
                    } ?>>
                    <a <?php if ($this->uri->segment(1) == 'Mengelola_Artikel') {
                            echo "class='nav-link active'";
                        } else {
                            echo "class='nav-link'";
                        } ?> href="#">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Artikel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a <?php if ($this->uri->segment(1) == 'Mengelola_Artikel' && $this->uri->segment(2) == 'tambah_artikel' || $this->uri->segment(2) == 'edit_artikel' || $this->uri->segment(1) == 'Mengelola_Artikel' && $this->uri->segment(2) == '') {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                } ?> href="<?php echo base_url() . 'Mengelola_Artikel' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Artikel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a <?php if ($this->uri->segment(2) == 'tipe_artikel') {
                                    echo "class='nav-link active'";
                                } else {
                                    echo "class='nav-link'";
                                } ?> href="<?php echo base_url() . 'Mengelola_Artikel/tipe_artikel' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tipe Artikel</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a <?php if ($this->uri->segment(1) == 'Dokumen') {
                            echo "class='nav-link active'";
                        } else {
                            echo "class='nav-link'";
                        } ?> href="<?php echo base_url() . 'Dokumen' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p> Dokumen </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'Konten' ?>" class="nav-link">
                        <i class="nav-icon fas fa-marker"></i>
                        <p> Konten </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . 'Login_Admin/logout' ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Logout </p>
                    </a>
                </li>

                <!--     <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Akun
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Ubah Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Login_Admin/logout' ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>
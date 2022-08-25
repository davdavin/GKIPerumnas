<?php if ($this->session->has_userdata('sukses')) { ?>
    <!--    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i> <?php //echo $this->session->flashdata('sukses');
                                                ?>
        </div> -->

    <div class="sukses" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>"></div>

<?php
}
unset($_SESSION['sukses']); ?>

<?php if ($this->session->has_userdata('gagal')) { ?>
    <div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
    <!--  <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-exclamation-triangle"></i> <?php //echo $this->session->flashdata('gagal'); 
                                                            ?>
    </div>-->
<?php
}
unset($_SESSION['gagal']); ?>
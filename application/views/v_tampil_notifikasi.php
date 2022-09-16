 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Notifikasi</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
             <li class="breadcrumb-item active">Notifikasi</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">

       <!-- Timelime example  -->
       <div class="row">
         <div class="col-md-12">
           <!-- The time line -->
           <div class="timeline">
             <!-- timeline item -->
             <!-- <?php // for ($i = 0; $i < count($tampil); $i++) { 
                  ?>
               <div>
                 <div class="timeline-item">
                   <span class="time"><i class="fas fa-clock"></i> <?php // echo waktu($tampil[$i]['waktu_kirim']) 
                                                                    ?></span>
                   <h3 class="timeline-header text-bold text-center">Notifikasi dari <?php //echo $tampil[$i]['nama_lengkap_anggota'] 
                                                                                      ?></h3>

                   <div class="timeline-body">
                      <div class="row m-2">
                       <div class="col-sm-4">
                         <p class="text-bold">No. HP Baru</p>
                       </div>
                       <div class="col-sm-4">
                         <p><?php //echo $tampil[$i]['nohp_baru'] 
                            ?></p>
                       </div>
                     </div>
                     <div class="row m-2">
                       <div class="col-sm-4">
                         <p class="text-bold">Email Baru</p>
                       </div>
                       <div class="col-sm-4">
                         <p><?php //echo $tampil[$i]['email_baru'] 
                            ?></p>
                       </div>
                     </div>
                     <div class="row m-2">
                       <div class="col-sm-4">
                         <p class="text-bold">Alamat Baru</p>
                       </div>
                       <div class="col-sm-4">
                         <p><?php //echo $tampil[$i]['alamat_baru'] 
                            ?></p>
                       </div>
                     </div>
                     <div class="row m-2">
                       <div class="col-sm-4">
                         <p class="text-bold">Pekerjaan Baru</p>
                       </div>
                       <div class="col-sm-4">
                         <p><?php //echo $tampil[$i]['pekerjaan_baru'] 
                            ?></p>
                       </div>
                     </div>

                   </div>
                   <div class="timeline-footer">
                     <a class="btn btn-primary btn-sm">Read more</a>
                     <a class="btn btn-danger btn-sm">Delete</a>
                   </div>
                 </div>
               </div>
             <?php //} 
              ?> -->

             <?php if (count($notifRequest) > 0) {
                foreach ($notifRequest as $notif) { ?>
                 <div>
                   <div class="timeline-item">
                     <span class="time"><i class="fas fa-clock"></i> <?php echo date_format(date_create($notif->tanggal_permintaan), "H:i") ?></span>
                     <h3 class="timeline-header text-bold text-center">Notifikasi dari <?php echo $notif->nama_lengkap_anggota ?></h3>

                     <div class="timeline-body">
                       <div class="row m-2 text-bold">
                         <div class="col-sm-4">
                           <p></p>
                         </div>
                         <div class="col-sm-4">
                           <p>Baru</p>
                         </div>
                         <div class="col-sm-4">
                           <p>Lama</p>
                         </div>
                       </div>
                       <div class="row m-2">
                         <div class="col-sm-4">
                           <p class="text-bold">No. HP Baru</p>
                         </div>
                         <div class="col-sm-4">
                           <p><?php echo dekripsi_notifikasi($notif->nohp_baru); ?></p>
                         </div>
                         <div class="col-sm-4">
                           <p><?php echo $notif->nohp_anggota; ?></p>
                         </div>
                       </div>
                       <div class="row m-2">
                         <div class="col-sm-4">
                           <p class="text-bold">Email Baru</p>
                         </div>
                         <div class="col-sm-4">
                           <p><?php echo dekripsi_notifikasi($notif->email_baru); ?></p>
                         </div>
                         <div class="col-sm-4">
                           <p><?php echo $notif->email_anggota; ?></p>
                         </div>
                       </div>
                       <div class="row m-2">
                         <div class="col-sm-4">
                           <p class="text-bold">Alamat Baru</p>
                         </div>
                         <div class="col-sm-4">
                           <p><?php echo dekripsi_notifikasi($notif->alamat_baru); ?></p>
                         </div>
                         <div class="col-sm-4">
                           <p><?php echo $notif->alamat_anggota; ?></p>
                         </div>
                       </div>
                       <div class="row m-2">
                         <div class="col-sm-4">
                           <p class="text-bold">Pekerjaan Baru</p>
                         </div>
                         <div class="col-sm-4">
                           <p><?php echo dekripsi_notifikasi($notif->pekerjaan_baru); ?></p>
                         </div>
                         <div class="col-sm-4">
                           <p><?php echo $notif->pekerjaan_anggota; ?></p>
                         </div>
                       </div>

                     </div>
                     <div class="card-footer">
                       <?php if ($notif->is_updated == "0") { ?>
                         <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'anggota_jemaat/ubah_data_jemaat/' . $notif->id_permintaan ?> ">Ubah Data</a>
                       <?php } else { ?>
                         <span class="badge badge-success">Sudah di ubah</span>
                         <a class="btn btn-danger btn-sm tombol-hapus" href="<?php echo base_url() . 'Notifikasi/hapus_permintaan/' . $notif->id_permintaan ?>">
                           <i class="fas fa-trash"></i> Hapus
                         </a>
                       <?php } ?>
                     </div>
                   </div>
                 </div>
               <?php }
              } else { ?>
               <div class="callout callout-info m-2">
                 <h5><i class="fas fa-info"></i> Tidak ada permintaan</h5>
               </div>
             <?php } ?>
             <!-- END timeline item -->
           </div>
         </div>
         <!-- /.col -->
       </div>
     </div>
     <!-- /.timeline -->

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->


 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>assets//plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
 </body>

 </html>
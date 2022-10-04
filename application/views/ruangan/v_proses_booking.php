<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>GKI Perumnas | Booking</title>
    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/ruangan/booking/bootstrap.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/ruangan/booking/style.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        .section {
            position: relative;
            height: 200vh;
        }

        .section .section-center {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div id="booking" class="section">
        <?php $this->load->view('templates/message.php'); ?>
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="booking-bg"></div>
                        <form method="post" action="<?php echo base_url() . 'Ruangan/proses_booking' ?>">
                            <div class="form-header">
                                <h2>Make your reservation</h2>
                            </div>

                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Adults</span>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Children</span>
                                        <select class="form-control">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="pilihan">
                                <div class="input-pilihan">
                                    <input type="radio" class="radio" name="pilihan" value="jemaat_gki" id="jemaat"><label for="jemaat" class="label-pilihan">Jemaat GKI</label>
                                    <input type="radio" class="radio" name="pilihan" value="bukan_jemaat_gki" id="orang_luar"><label for="orang_luar" class="label-pilihan">Luar Jemaat GKI</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="form-label">Ruangan</span>
                                <input type="hidden" name="id_ruangan" value="<?php echo $ruangan['id_ruangan']; ?>">
                                <input type="text" class="form-control" value="<?php echo $ruangan['nama_ruangan']; ?>" readonly>
                            </div>
                            <div class="form-group" id="namanama" style="display: none;">
                                <span class="form-label">No. Anggota</span>
                                <input type="number" class="form-control" id="no_anggota" name="no_anggota" placeholder="No. anggota anda">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Nama</span>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama anda">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Email</span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email anda">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Phone</span>
                                <input type="tel" class="form-control" id="nohp" name="nohp" placeholder="No. Handphone anda">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Keperluan</span>
                                <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan">
                            </div>
                            <div class="form-group">
                                <span class="form-label">Tanggal</span>
                                <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" placeholder="dd/mm/YYYY" required>
                            </div>
                            <div class="form-group">
                                <span class="form-label">Jam Mulai</span>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="dd/mm/YYYY" required>
                            </div>
                            <div class="form-group">
                                <span class="form-label">Jam Selesai</span>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="dd/mm/YYYY" required>
                            </div>
                            <!-- ini bisa pas ada internet, jdi dikomen dlu-->
                            <!-- <div class="form-group">
                                <span class="form-label">Tanggal</span>
                                <input type="text" class="form-control" id="tanggal_booking" name="tanggal_booking" placeholder="dd/mm/YYYY" required>
                            </div> -->
                            <div class="form-btn">
                                <button class="submit-btn">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div><br><br>

                <div class="row">
                    <div class="booking-form" style="padding: 10px;">
                        <div class="text-center">
                            <h2>Tanggal yang sudah dibooking</h2>
                        </div>
                        <table id="info_booking" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>jquery-3.4.1.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            const sukses = $('.sukses').data('flashdata');
            if (sukses) {
                Swal.fire({
                    title: 'Booking',
                    text: sukses,
                    icon: 'success'
                });
            }

            $(document).on('change', '.radio', function() {
                if (document.getElementById('jemaat').checked) {
                    $('#namanama').show();
                } else if (document.getElementById('orang_luar').checked) {
                    $('#namanama').hide();
                    $('#no_anggota').val('');
                }
            });
            $('#info_booking').DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": false,
                "searching": false,
                "language": {
                    "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "info": "",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "loadingRecords": "Sedang memuat...",
                    "processing": "Sedang memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "thousands": "'",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
                ajax: {
                    url: "<?php echo base_url() . 'ruangan/informasi_tanggal_booking/' . $id_ruangan ?>",
                    dataSrc: ""
                },
                columns: [{
                        data: null,
                        name: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "data": "tanggal_booking"
                    }
                ]
            });
            /*     $('#tanggal_booking').flatpickr({
                     minDate: "today",
                     enableTime: true,
                     altInput: true,
                     //allowInput: true,
                     altFormat: "d/m/Y H:i", //j F Y
                     dateFormat: "Y-m-d H:i",
                     locale: "id",
                 }); */
        });
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
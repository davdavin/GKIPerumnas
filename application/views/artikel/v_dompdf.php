<!DOCTYPE html>
<html>

<head>
    <title> Artikel </title>
    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">
    <style>
        /*  * {
           margin: 0;
            padding: 0; 
               box-sizing: border-box; 
        } */

        .isi {
            /*  padding-top: 20px;
             padding-bottom: 2px;*/
            line-height: 1.5;
            margin-bottom: 4px;
            margin-top: 4px;
            margin-left: 40px;
            margin-right: 40px;
        }

        /*       .isi p {
            align-items: center;
            margin-left: 40px;
            margin-right: 40px;
        } */

        .isi h4 {
            /*  padding-left: 40px; */
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="isi">
        <?php
        foreach ($artikel as $lihat_artikel) { ?>
            <article>
                <h2 style="text-align: center;"><?php echo $lihat_artikel->judul_artikel ?></h2>
                <h4>
                    <?php echo tanggal_indonesia($lihat_artikel->tanggal_pembuatan);  ?>
                </h4>
                <?php echo $lihat_artikel->isi ?>
            </article>
        <?php } ?>
    </div>
</body>

</html>
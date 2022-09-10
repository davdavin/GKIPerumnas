<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View PDF</title>

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>resources/assets/img/logo.jpg" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/tambahanStyle.css">

</head>

<body>

    <div class="card">
        <div class="row">
            <iframe class="view-document" src="<?php echo base_url() .  'dokumenFormulir/' . $dokumen['dokumen'] ?>" title="test"></iframe>
        </div>
    </div>

</body>

</html>
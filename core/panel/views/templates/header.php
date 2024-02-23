<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel | login</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style_dash.css">
    <link rel="stylesheet" href="../assets/css/alert.css">
    <link rel="stylesheet" href="assets/css/media_dash.css">

    <script src="https://kit.fontawesome.com/3c64ef68a2.js" crossorigin="anonymous"></script>
</head>
<body>

<?php if(isset($_SESSION["error"])): ?>
    <div class="box-alert error-box">
        <p><?= $_SESSION["error"] ?></p>
        <?php unset($_SESSION["error"]); ?>
    </div>
<?php elseif(isset($_SESSION["success"])): ?>
    <div class="box-alert success-box">
        <p><?= $_SESSION["success"] ?></p>
        <?php unset($_SESSION["success"]); ?>
    </div>
<?php endif;?>

    <div class="dashboard_container">

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lucas Santos da Anunciação">
    <meta name="description" content="Website de informações, painel de controle com alteração no site dinamicamente!">
    <meta name="keywords" content="painel,noticias,noticia,panel,sistema web, Desenvolvimento, Web">
    
    <title>Website</title>
    
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/alert.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <script src="https://kit.fontawesome.com/3c64ef68a2.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="container flex">
        <div class="logo">
            <h1><a href="?pag=home">LogoMarca</a></h1>
        </div>
        <nav class="desktop">
            <ul>
                <li><a href="?pag=home">Home</a></li>
                <li><a targetId="#sobre" href="#">Sobre</a></li>
                <li><a targetId="#servicos" href="#">Servicos</a></li>
                <li><a href="?pag=news">Notiçias</a></li>
                <li><a href="?pag=contact">Contato</a></li>
            </ul>
        </nav>
        <nav class="mobile">
            <h2 id="btn_menu"><i class="fa fa-bars"></i></h2>
            <ul id="menu">
                <li><a href="?pag=home">Home</a></li>
                <li><a targetId="#sobre" href="#">Sobre</a></li>
                <li><a targetId="#servicos" href="#">Servicos</a></li>
                <li><a href="?pag=news">Notiçias</a></li>
                <li><a href="?pag=contact">Contato</a></li>
            </ul>
        </nav>
    </div>
</header>

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

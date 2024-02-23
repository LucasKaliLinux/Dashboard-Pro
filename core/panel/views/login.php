<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel | login</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style_login.css">
    <link rel="stylesheet" href="../assets/css/alert.css">
</head>
<body>
    <?php if(isset($_SESSION["error"])): ?>
        <div class="box-alert error-box">
            <p><?= $_SESSION["error"] ?></p>
            <?php unset($_SESSION["error"]); ?>
        </div>
    <?php endif; ?>
    
    <div class="center">
        <div class="box">
            <h1>Efetue o login...</h1>
            
            <form action="?pag=login" method="post">
                <input type="text" name="user" placeholder="Username...">
                <input type="password" name="pass" placeholder="Password...">
                <div class="lembrar_me">
                    <label for="lembra">Lembrar-me</label>
                    <input type="checkbox" name="remember" id="lembra">
                </div>
                <input type="submit" name="send" value="Send">
            </form>
        </div>
    </div>

    <script src="../assets/js/alertBox.js"></script>
</body>
</html>
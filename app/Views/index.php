<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/login_style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css'); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>

<body>

    <div class="container">
        <form action="<?= base_url('autenticar') ?>" method="POST">
            <div class="header-form">
                <img src="public/img/mclab-icon.png" alt="Logo" class="logo-img">
                <h1>Login</h1>
            </div>
            <div class="input-box">
                <input name="usuario" placeholder="Usuário" type="text" readonly onfocus="this.removeAttribute('readonly');"
                    autocomplete="off" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input name="senha" placeholder="Senha" type="password" readonly onfocus="this.removeAttribute('readonly');"
                    autocomplete="off" required>
                <i class="bx bxs-lock-alt"></i>
            </div>

            <button type="submit" class="login">Login</button>

            <div class="register-link">
                <p>Não tem uma conta? <a href="cadastrar">Cadastre-se</a></p>
            </div>
        </form>
    </div>

</body>

</html>
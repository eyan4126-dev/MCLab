<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/login_style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <title>Cadastro</title>
</head>

<body>

    <div class="container">
        <form action="<?= base_url('cadastrar') ?>" method="POST">
            
            <a href="<?= base_url('/') ?>">
                <div class="voltar">
                    <i class="bx bx-arrow-back"></i>
                    <p>Voltar</p>
                </div>
            </a>    
        
            <div class="header-form">
                <img src="public/img/mclab-icon.png" draggable="false" alt="Logo" class="logo-img">
                <h1>Cadastre-se</h1>
            </div>
            <div class="input-box">
                <input name="usuario" placeholder="Usuário" type="text" autocomplete="off" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input name="senha" placeholder="Senha" type="password" autocomplete="off" required>
                <i class="bx bxs-lock-alt"></i>
            </div>

            <button type="submit" class="login">Cadastrar</button>
        </form>
    </div>

</body>

</html>
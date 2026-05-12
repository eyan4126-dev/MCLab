<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/erro_style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css'); ?>">
    <title>Cadastro</title>
</head>

<body>

    <div class="container">
        <div class="header-erro">
            <img src="public/img/mclab-icon.png" draggable="false" alt="Logo" class="logo-img">
            <h1>Erro!</h1>
        </div>
        <div class="box-erro">
            <h4>Login ou senha inválidos.</h4>
        </div>

        <a href="<?= base_url('/') ?>">
            <button type="button" class="voltar">Voltar</button>
        </a>
    </div>

</body>

</html>
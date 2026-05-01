<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/stylelogin.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css'); ?>">
    <title>Cadastro</title>
</head>

<body>

    <div class="fundo" style="background-image: url('public/img/loginpage.png')">
        <div class="form-container">
            <form action="<?= base_url('cadastrar') ?>" method="POST">
                <h2>Cadastre-se</h2>

                <label>Usuário</label>
                <input type="text" name="usuario" required>

                <label>Senha</label>
                <input type="password" name="senha" required>
                
                <button type="submit"><strong>Cadastrar</strong></button>
            </form>
        </div>
    </div>

</body>

</html>
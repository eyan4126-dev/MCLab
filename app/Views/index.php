<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/stylelogin.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css'); ?>">
    <title>Login</title>
</head>

<body>

    <div class="fundo" style="background-image: url('public/img/loginpage.png')">
        <div class="form-container">
            <form action="autenticar" method="POST">
                <h2>Faça seu Login</h2>

                <label>Usuário</label>
                <input type="text" name="usuario" required>

                <label>Senha</label>
                <input type="password" name="senha" required>

                <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
                
                <button type="submit"><strong>Entrar</strong></button>
            </form>
        </div>
    </div>

</body>

</html>
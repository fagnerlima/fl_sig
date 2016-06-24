<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{title}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div id="box">
                <img id="logo" src="<?= base_url('assets/img/logo.png') ?>" alt="">
                <h1 class="text-center">Login</h1>

                <?php if ($error) : ?>
                    <div class="alert alert-danger">
                        {error}
                    </div>
                <?php endif; ?>

                <form method="post">
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <p><a href="#">Esqueci minha senha</a></p>
                        </div>

                        <div class="col-md-6">
                            <input type="submit" value="Entrar" class="form-control btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>
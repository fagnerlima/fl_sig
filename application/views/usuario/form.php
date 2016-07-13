<?php $this->load->view('commons/form-feedback'); ?>

<form method="post">
    <div class="row">
        <div class="col-md-4">

            <!-- Nome -->
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required autofocus
                       value="<?= $error ? set_value('nome') : (isset($usuario->nome) ? $usuario->nome : '') ?>">
            </div>

            <!-- E-mail -->
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control" required
                       value="<?= $error ? set_value('email') : (isset($usuario->email) ? $usuario->email : '') ?> ">
            </div>
        </div> <!--/.col-md-4 -->

        <div class="col-md-4">

            <!-- Senha -->
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" minlength="4" required>
            </div>

            <!-- Confirmação de Senha -->
            <div class="form-group">
                <label for="confirmacao_senha">Confirmação de Senha:</label>
                <input type="password" name="confirmacao_senha" id="confirmacao_senha" class="form-control"
                       minlength="4" required>
            </div>
        </div> <!--/.col-md-4 -->

        <div class="col-md-4">

            <!-- Tipo -->
            <div class="form-group">
                <label>Tipo:</label>
                <div class="form-control">
                    <label>
                        <input type="radio" name="tipo" value="2" required
                            <?= $error && set_value('tipo') == 2 ? 'checked' : @($usuario->tipo == 2 ? 'checked' : '') ?>
                            <?= $this->session->userdata('tipo') == 3 ? 'disabled' : '' ?>>
                        Master
                    </label>
                    <label title="Sem permissão para cadastro, edição ou exclusão de usuários e clientes.">
                        <input type="radio" name="tipo" value="3" required
                            <?= $error && set_value('tipo') == 3 ? 'checked' : @($usuario->tipo == 3 ? 'checked' : '') ?>>
                        Limitado
                    </label>
                </div>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label>Status:</label>
                <div class="form-control">
                    <label>
                        <input type="radio" name="status" value="1" required
                            <?= ($error && set_value('status') == 1) || (isset($usuario->status) && $usuario->status == 1) ? 'checked' : '' ?>>
                        Ativo
                    </label>
                    <label>
                        <input type="radio" name="status" value="0" required
                            <?= ($error && set_value('status') == 0) || (isset($usuario->status) && $usuario->status == 0) ? 'checked' : '' ?>>
                        Inativo
                    </label>
                </div>
            </div>
        </div> <!--/.col-md-4 -->
    </div> <!--/.row -->

    <div class="form-group">
        <!-- Salvar -->
        <button type="submit" class="btn btn-success pull-right">
            <span class="glyphicon glyphicon-ok"></span> Salvar
        </button>

        <!-- Voltar -->
        <a href="<?= base_url('usuario') ?>" class="btn btn-warning">
            <span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
    </div>
</form>
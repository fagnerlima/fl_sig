<?php $this->load->view('commons/header'); ?>

    <div class="container">
        <h1>Cadastrar Usuário</h1>

        <?php if ($error) : ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('success')) : ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="alert alert-success">
                        <p><?= $this->session->flashdata('success') ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required value="<?= $error ? set_value('nome') : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" required value="<?= $error ? set_value('email') : '' ?> ">
                    </div>
                </div> <!--/.col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" minlength="4" required>
                    </div>

                    <div class="form-group">
                        <label for="confirmacao_senha">Confirmação de Senha:</label>
                        <input type="password" name="confirmacao_senha" id="confirmacao_senha" class="form-control" minlength="4" required>
                    </div>
                </div> <!--/.col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tipo:</label>
                        <div class="form-control">
                            <label>
                                <input type="radio" name="tipo" value="2"> Master
                            </label>
                            <label title="Sem permissão para cadastro, edição ou exclusão de usuários e clientes.">
                                <input type="radio" name="tipo" value="3" checked> Limitado
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status:</label>
                        <div class="form-control">
                            <label>
                                <input type="radio" name="status" value="1" checked> Ativo
                            </label>
                            <label>
                                <input type="radio" name="status" value="0"> Inativo
                            </label>
                        </div>
                    </div>
                </div> <!--/.col-md-4 -->
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-ok"></span> Salvar
                </button>
                <a href="<?= base_url('usuario') ?>" class="btn btn-warning">
                    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
            </div>
        </form>
    </div> <!--/.container -->

<?php $this->load->view('commons/footer'); ?>
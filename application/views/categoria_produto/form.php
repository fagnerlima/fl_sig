<?php $this->load->view('commons/form-feedback'); ?>

<form method="post">
    <div class="row">
        <div class="col-md-4">

            <!-- Descrição -->
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" id="descricao" class="form-control" required autofocus
                       value="<?= $error ? set_value('descricao') : (isset($categoria_produto->descricao) ? $categoria_produto->descricao : '') ?>">
            </div> <!--/.form-group -->

            <div class="form-group">
                <!-- Salvar -->
                <button type="submit" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-ok"></span> Salvar
                </button>

                <!-- Voltar -->
                <a href="<?= base_url('categoria_produto') ?>" class="btn btn-warning">
                    <span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
            </div> <!--/.form-group -->

        </div> <!--/.col-md-4 -->
    </div> <!--/.row -->
</form>
<?php $this->load->view('commons/form-feedback'); ?>

<form method="post">
    <div class="row">

        <div class="col-md-3">
            <!-- Categoria -->
            <div class="form-group">
                <label for="categoria_id">Categoria:</label>
                <select id="categoria_id" name="categoria_id" class="form-control" required>
                    <option value="">--
                    <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria->id ?>"><?= $categoria->descricao ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div> <!--/.col-md-4 -->

        <div class="col-md-3">
            <!-- Descrição -->
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="form-control" required>
            </div>
        </div> <!--/.col-md-3 -->

        <div class="col-md-3">
            <!-- Valor -->
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" id="valor" name="valor" class="form-control" required>
            </div>
        </div> <!--/.col-md-3 -->

        <div class="col-md-3">
            <div class="form-group">
                <!-- Observações -->
                <label for="obs">Observações:</label>
                <textarea id="obs" name="obs" rows="4" class="form-control"></textarea>
            </div>
        </div> <!--/.col-md-3 -->
    </div> <!--/.row -->

    <div class="form-group">
        <!-- Salvar -->
        <button type="submit" class="btn btn-success pull-right">
            <span class="glyphicon glyphicon-ok"></span> Salvar
        </button>

        <!-- Voltar -->
        <a href="<?= base_url('produto') ?>" class="btn btn-warning">
            <span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
    </div>
</form>
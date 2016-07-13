<?php $this->load->view('commons/header'); ?>

    <div class="container">
        <h1>Categorias de Produtos</h1>

        <p><a href="<?= base_url('categoria_produto/cadastrar') ?>" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> Cadastrar Categoria de Produto</a></p>

        <?php if ($categorias) : ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($categorias as $categoria) : ?>
                    <tr>
                        <td><?= $categoria->id ?></td>
                        <td><?= $categoria->descricao ?></td>
                        <td>
                            <a href="<?= base_url("categoria_produto/editar/{$categoria->id}") ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                            <a href="<?= base_url("categoria_produto/excluir/{$categoria->id}") ?>" class="btn btn-danger"
                               onclick="return confirm('Tem certeza que deseja excluir o usuário <?= $categoria->id ?>?');">
                                <span class="glyphicon glyphicon-trash"></span> Apagar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="3"><b>Quantidade de categorias:</b> <?= $count_all ?></td>
                </tr>
                </tfoot>
            </table>

            <?= $pagination ?>
        <?php else : ?>
            <p>Não há categorias cadastradas ou você está acessando uma página inexistente.</p>
        <?php endif; ?>
    </div> <!--/.container -->

<?php $this->load->view('commons/footer'); ?>
<?php $this->load->view('commons/header'); ?>

    <div class="container">
        <h1>Produtos</h1>

        <p><a href="<?= base_url('produto/cadastrar') ?>" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> Cadastrar Produto</a></p>

        <?php if ($produtos) : ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Valor Unitário</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <td><?= $produto->id ?></td>
                        <td><?= $produto->categoria ?></td>
                        <td><?= $produto->descricao ?></td>
                        <td><?= 'R$ ' . number_format($produto->valor, 2, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url("produto/editar/{$produto->id}") ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                            <a href="<?= base_url("produto/excluir/{$produto->id}") ?>" class="btn btn-danger"
                               onclick="return confirm('Tem certeza que deseja excluir o usuário <?= $produto->id ?>?');">
                                <span class="glyphicon glyphicon-trash"></span> Apagar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="5"><b>Quantidade de produtos:</b> <?= $count_all ?></td>
                </tr>
                </tfoot>
            </table>

            <?= $pagination ?>
        <?php else : ?>
            <p>Não há produtos cadastradas ou você está acessando uma página inexistente.</p>
        <?php endif; ?>
    </div> <!--/.container -->

<?php $this->load->view('commons/footer'); ?>
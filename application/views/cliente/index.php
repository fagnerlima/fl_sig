<?php $this->load->view('commons/header'); ?>

    <div class="container">
        <h1>Clientes</h1>

        <p><a href="<?= base_url('cliente/cadastrar') ?>" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> Cadastrar Cliente</a></p>

        <?php if ($clientes) : ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>UF</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                        <td><?= $cliente->id ?></td>
                        <td><?= $cliente->nome . ' ' . $cliente->sobrenome ?></td>
                        <td><?= $cliente->end_uf ?></td>
                        <td><?= $cliente->end_cidade ?></td>
                        <td>
                            <a href="<?= base_url("cliente/editar/{$cliente->id}") ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                            <a href="<?= base_url("cliente/excluir/{$cliente->id}") ?>" class="btn btn-danger"
                               onclick="return confirm('Tem certeza que deseja excluir o cliente <?= $cliente->id ?>?');">
                                <span class="glyphicon glyphicon-trash"></span> Apagar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="5"><b>Quantidade de clientes:</b> <?= $num_clientes ?></td>
                </tr>
                </tfoot>
            </table>

            <?= $pagination ?>
        <?php else : ?>
            <p>Não há clientes cadastrados ou você está acessando uma página inexistente.</p>
        <?php endif; ?>
    </div> <!--/.container -->

<?php $this->load->view('commons/footer'); ?>
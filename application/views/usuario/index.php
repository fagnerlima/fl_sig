<?php $this->load->view('commons/header'); ?>

    <div class="container">
        <h1>Usuários</h1>

        <p><a href="<?= base_url('usuario/cadastrar') ?>" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> Cadastrar Usuário</a></p>

        <?php if ($usuarios) : ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?= $usuario->id ?></td>
                            <td><?= $usuario->nome ?></td>
                            <td><?= $usuario->email ?></td>
                            <td><?= $usuario->tipo == 2 ? 'Master' : 'Limitado' ?></td>
                            <td><?= $usuario->status == 1 ? 'Ativo' : 'Inativo' ?></td>
                            <td>
                                <a href="<?= base_url("usuario/editar/{$usuario->id}") ?>" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                <a href="<?= base_url("usuario/excluir/{$usuario->id}") ?>" class="btn btn-danger"
                                   onclick="return confirm('Tem certeza que deseja excluir o usuário <?= $usuario->id ?>?');">
                                    <span class="glyphicon glyphicon-trash"></span> Apagar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="6"><b>Quantidade de usuários:</b> <?= $num_usuarios ?></td>
                </tr>
                </tfoot>
            </table>
            
            <?= $pagination ?>
        <?php else : ?>
            <p>Não há usuários cadastrados ou você está acessando uma página inexistente.</p>
        <?php endif; ?>
    </div> <!--/.container -->

<?php $this->load->view('commons/footer'); ?>
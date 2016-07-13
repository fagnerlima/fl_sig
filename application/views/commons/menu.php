<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url() ?>">FL SIG</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?= base_url() ?>">Home</a></li>

                <!-- Usuário -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Usuário
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('usuario') ?>">Listar Usuários</a></li>
                        <li><a href="<?= base_url('usuario/cadastrar') ?>">Cadastrar Usuário</a></li>
                    </ul>
                </li>

                <!-- Cliente -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Cliente
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('cliente') ?>">Listar Clientes</a></li>
                        <li><a href="<?= base_url('cliente/cadastrar') ?>">Cadastrar Cliente</a></li>
                    </ul>
                </li>

                <!-- Produto -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Produto
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('produto') ?>">Listar Produtos</a></li>
                        <li><a href="<?= base_url('produto/cadastrar') ?>">Cadastrar Produto</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= base_url('categoria_produto') ?>">Listar Categorias</a></li>
                        <li><a href="<?= base_url('categoria_produto/cadastrar') ?>">Cadastrar Categoria</a></li>
                    </ul>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?= $this->session->userdata('email') ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('usuario/editar/' . $this->session->userdata('id')) ?>">Editar Perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= base_url('sair') ?>">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div> <!-- /.navbar-collapse -->
    </div> <!-- /.container-fluid -->
</nav>
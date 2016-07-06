<?php $this->load->view('commons/header'); ?>

    <div class="container">
        <h1>Erro 404 - Página não encontrada</h1>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <h1><img src="<?= base_url('assets/img/erro404.png') ?>" title="Erro 404"></h1>
            </div> <!--/.col-md-6 -->
            <div class="col-md-8">
                <p>Possíveis motivos:</p>
                <ul>
                    <li>O conteúdo não está mais no ar;</li>
                    <li>A página mudou de lugar;</li>
                    <li>Você digitou o endereço errado.</li>
                </ul>
                <p>Se você digitou o endereço (URL) manualmente, por favor verifique novamente a sintaxe do endereço. Se você acredita ter encontrado um problema no servidor, por favor entre em contato com o webmaster.</p>
                <p><a href="/" class="btn btn-primary">&laquo; Voltar à Página Inicial</a></p>
            </div> <!--/.col-md-6 -->
        </div> <!--/.row -->
    </div>

<?php $this->load->view('commons/footer'); ?>
<?php $this->load->view('commons/header'); ?>

    <div class="container">
        <h1>Cadastrar Cliente</h1>

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
                <div class="col-md-3">

                    <!-- Nome -->
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control" required autofocus>
                    </div>

                    <!-- Sobrenome -->
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome:</label>
                        <input type="text" id="sobrenome" name="sobrenome" class="form-control" required>
                    </div>

                    <!-- Sexo -->
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <select id="sexo" name="sexo" class="form-control" required>
                            <option value="">
                            <option value="M">Masculino
                            <option value="F">Feminino
                        </select>
                    </div>

                    <!-- Data de Nascimento -->
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="dd/mm/aaaa">
                    </div>
                </div> <!--/.col-md-3 -->

                <div class="col-md-3">

                    <!-- CEP -->
                    <div class="form-group">
                        <label for="end_cep">CEP:</label>
                        <input type="text" id="end_cep" name="end_cep" class="form-control" placeholder="00000-000" required
                               pattern="[0-9]{5}-[0-9]{3}">
                    </div>

                    <!-- Estado -->
                    <div class="form-group">
                        <label for="end_uf">Estado:</label>
                        <select id="end_uf" name="end_uf" class="form-control" required>
                            <option value="">
                            <option value="AC">Acre
                            <option value="AL">Alagoas
                            <option value="AP">Amapá
                            <option value="AM">Amazonas
                            <option value="BA">Bahia
                            <option value="CE">Ceará
                            <option value="DF">Distrito Federal
                            <option value="GO">Goiás
                            <option value="ES">Espírito Santo
                            <option value="MA">Maranhão
                            <option value="MT">Mato Grosso
                            <option value="MS">Mato Grosso do Sul
                            <option value="MG">Minas Gerais
                            <option value="PA">Pará
                            <option value="PB">Paraíba
                            <option value="PR">Paraná
                            <option value="PE">Pernambuco
                            <option value="PI">Piauí
                            <option value="RJ">Rio de Janeiro
                            <option value="RN">Rio Grande do Norte
                            <option value="RS">Rio Grande do Sul
                            <option value="RO">Rondônia
                            <option value="RR">Roraima
                            <option value="SP">São Paulo
                            <option value="SC">Santa Catarina
                            <option value="SE">Sergipe
                            <option value="TO">Tocantins
                        </select>
                    </div>

                    <!-- Cidade -->
                    <div class="form-group">
                        <label for="end_cidade">Cidade:</label>
                        <input type="text" id="end_cidade" name="end_cidade" class="form-control" required>
                    </div>

                    <!-- Bairro -->
                    <div class="form-group">
                        <label for="end_bairro">Bairro:</label>
                        <input type="text" id="end_bairro" name="end_bairro" class="form-control">
                    </div>
                </div> <!--/.col-md-3 -->

                <div class="col-md-3">
                    <!-- Logradouro -->
                    <div class="form-group">
                        <label for="end_logradouro">Logradouro:</label>
                        <input type="text" id="end_logradouro" name="end_logradouro" class="form-control">
                    </div>

                    <!-- Número -->
                    <div class="form-group">
                        <label for="end_numero">Número:</label>
                        <input type="text" id="end_numero" name="end_numero" class="form-control">
                    </div>

                    <!-- Complemento -->
                    <div class="form-group">
                        <label for="end_complemento">Complemento:</label>
                        <input type="text" id="end_complemento" name="end_complemento" class="form-control">
                    </div>

                    <!-- Referência -->
                    <div class="form-group">
                        <label for="end_referencia">Referência:</label>
                        <input type="text" id="end_referencia" name="end_referencia" class="form-control">
                    </div>
                </div> <!--/.col-md-3 -->

                <div class="col-md-3">

                    <!-- E-mail -->
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <!-- Telefone 1-->
                    <div class="form-group">
                        <label for="telefone1">Telefone 1:</label>
                        <input type="tel" id="telefone1" name="telefone1" class="form-control"
                               placeholder="(00) 00000-0000"
                               pattern="\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}">
                    </div>

                    <!-- Telefone 2 -->
                    <div class="form-group">
                        <label for="telefone2">Telefone 2:</label>
                        <input type="tel" id="telefone2" name="telefone2" class="form-control"
                               placeholder="(00) 00000-0000"
                               pattern="\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}">
                    </div>

                    <!-- Observações -->
                    <div class="form-group">
                        <label for="obs">Observações:</label>
                        <textarea id="obs" name="obs" rows="4" class="form-control"></textarea>
                    </div>
                </div> <!--/.col-md-3 -->
            </div> <!--/.row -->

            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-ok"></span> Salvar
                </button>
                <a href="<?= base_url('cliente') ?>" class="btn btn-warning">
                    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
            </div>
        </form>
    </div> <!--/.container -->

<?php $this->load->view('commons/footer'); ?>
<?php $this->load->view('commons/form-feedback'); ?>

<form method="post">

    <!-- 1ª linha -->
    <div class="row">

        <!-- Nome -->
        <div class="form-group col-md-3">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required autofocus
                   value="<?= $error ? set_value('nome') : (isset($cliente->nome) ? $cliente->nome : '') ?>">
        </div>

        <!-- Sobrenome -->
        <div class="form-group col-md-3">
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" id="sobrenome" name="sobrenome" class="form-control" required
                   value="<?= $error ? set_value('sobrenome') : (isset($cliente->sobrenome) ? $cliente->sobrenome : '') ?>">
        </div>

        <!-- Sexo -->
        <div class="form-group col-md-3">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" class="form-control" required>
                <option value="">
                <option value="M"
                    <?= ($error && set_value('sexo') == 'M') || (isset($cliente->sexo) && $cliente->sexo == 'M') ? 'selected' : '' ?>>
                    Masculino
                <option value="F"
                    <?= ($error && set_value('sexo') == 'F') || (isset($cliente->sexo) && $cliente->sexo == 'F') ? 'selected' : '' ?>>
                    Feminino
            </select>
        </div>

        <!-- Data de Nascimento -->
        <div class="form-group col-md-3">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control"
                   placeholder="dd/mm/aaaa"
                   value="<?= $error ? set_value('data_nascimento') : (isset($cliente->data_nascimento) ? $cliente->data_nascimento : '') ?>">
        </div>

    </div> <!--/.row -->

    <!-- 2ª linha -->
    <div class="row">

        <!-- CEP -->
        <div class="form-group col-md-3">
            <label for="end_cep">CEP:</label>
            <input type="text" id="end_cep" name="end_cep" class="form-control" placeholder="00000-000" required
                   pattern="[0-9]{5}-[0-9]{3}"
                   value="<?= $error ? set_value('end_cep') : (isset($cliente->end_cep) ? $cliente->end_cep : '') ?>">
        </div>

        <!-- Estado -->
        <div class="form-group col-md-3">
            <label for="end_uf">Estado:</label>
            <select id="end_uf" name="end_uf" class="form-control" required>
                <option value="">
                <option value="AC"
                    <?= ($error && set_value('end_uf') == 'AC') || (isset($cliente->end_uf) && $cliente->end_uf == 'AC') ? 'selected' : '' ?>>
                    Acre
                <option value="AL"
                    <?= ($error && set_value('end_uf') == 'AL') || (isset($cliente->end_uf) && $cliente->end_uf == 'AL') ? 'selected' : '' ?>>
                    Alagoas
                <option value="AP"
                    <?= ($error && set_value('end_uf') == 'AP') || (isset($cliente->end_uf) && $cliente->end_uf == 'AP') ? 'selected' : '' ?>>
                    Amapá
                <option value="AM"
                    <?= ($error && set_value('end_uf') == 'AM') || (isset($cliente->end_uf) && $cliente->end_uf == 'AM') ? 'selected' : '' ?>>
                    Amazonas
                <option value="BA"
                    <?= ($error && set_value('end_uf') == 'BA') || (isset($cliente->end_uf) && $cliente->end_uf == 'BA') ? 'selected' : '' ?>>
                    Bahia
                <option value="CE"
                    <?= ($error && set_value('end_uf') == 'CE') || (isset($cliente->end_uf) && $cliente->end_uf == 'CE') ? 'selected' : '' ?>>
                    Ceará
                <option value="DF"
                    <?= ($error && set_value('end_uf') == 'DF') || (isset($cliente->end_uf) && $cliente->end_uf == 'DF') ? 'selected' : '' ?>>
                    Distrito Federal
                <option value="GO"
                    <?= ($error && set_value('end_uf') == 'GO') || (isset($cliente->end_uf) && $cliente->end_uf == 'GO') ? 'selected' : '' ?>>
                    Goiás
                <option value="ES"
                    <?= ($error && set_value('end_uf') == 'ES') || (isset($cliente->end_uf) && $cliente->end_uf == 'ES') ? 'selected' : '' ?>>
                    Espírito Santo
                <option value="MA"
                    <?= ($error && set_value('end_uf') == 'MA') || (isset($cliente->end_uf) && $cliente->end_uf == 'MA') ? 'selected' : '' ?>>
                    Maranhão
                <option value="MT"
                    <?= ($error && set_value('end_uf') == 'MT') || (isset($cliente->end_uf) && $cliente->end_uf == 'MT') ? 'selected' : '' ?>>
                    Mato Grosso
                <option value="MS"
                    <?= ($error && set_value('end_uf') == 'MS') || (isset($cliente->end_uf) && $cliente->end_uf == 'MS') ? 'selected' : '' ?>>
                    Mato Grosso do Sul
                <option value="MG"
                    <?= ($error && set_value('end_uf') == 'MG') || (isset($cliente->end_uf) && $cliente->end_uf == 'MG') ? 'selected' : '' ?>>
                    Minas Gerais
                <option value="PA"
                    <?= ($error && set_value('end_uf') == 'PA') || (isset($cliente->end_uf) && $cliente->end_uf == 'PA') ? 'selected' : '' ?>>
                    Pará
                <option value="PB"
                    <?= ($error && set_value('end_uf') == 'PB') || (isset($cliente->end_uf) && $cliente->end_uf == 'PB') ? 'selected' : '' ?>>
                    Paraíba
                <option value="PR"
                    <?= ($error && set_value('end_uf') == 'PR') || (isset($cliente->end_uf) && $cliente->end_uf == 'PR') ? 'selected' : '' ?>>
                    Paraná
                <option value="PE"
                    <?= ($error && set_value('end_uf') == 'PE') || (isset($cliente->end_uf) && $cliente->end_uf == 'PE') ? 'selected' : '' ?>>
                    Pernambuco
                <option value="PI"
                    <?= ($error && set_value('end_uf') == 'PI') || (isset($cliente->end_uf) && $cliente->end_uf == 'PI') ? 'selected' : '' ?>>
                    Piauí
                <option value="RJ"
                    <?= ($error && set_value('end_uf') == 'RJ') || (isset($cliente->end_uf) && $cliente->end_uf == 'RJ') ? 'selected' : '' ?>>
                    Rio de Janeiro
                <option value="RN"
                    <?= ($error && set_value('end_uf') == 'RN') || (isset($cliente->end_uf) && $cliente->end_uf == 'RN') ? 'selected' : '' ?>>
                    Rio Grande do Norte
                <option value="RS"
                    <?= ($error && set_value('end_uf') == 'RS') || (isset($cliente->end_uf) && $cliente->end_uf == 'RS') ? 'selected' : '' ?>>
                    Rio Grande do Sul
                <option value="RO"
                    <?= ($error && set_value('end_uf') == 'RO') || (isset($cliente->end_uf) && $cliente->end_uf == 'RO') ? 'selected' : '' ?>>
                    Rondônia
                <option value="RR"
                    <?= ($error && set_value('end_uf') == 'RR') || (isset($cliente->end_uf) && $cliente->end_uf == 'RR') ? 'selected' : '' ?>>
                    Roraima
                <option value="SP"
                    <?= ($error && set_value('end_uf') == 'SP') || (isset($cliente->end_uf) && $cliente->end_uf == 'SP') ? 'selected' : '' ?>>
                    São Paulo
                <option value="SC"
                    <?= ($error && set_value('end_uf') == 'SC') || (isset($cliente->end_uf) && $cliente->end_uf == 'SC') ? 'selected' : '' ?>>
                    Santa Catarina
                <option value="SE"
                    <?= ($error && set_value('end_uf') == 'SE') || (isset($cliente->end_uf) && $cliente->end_uf == 'SE') ? 'selected' : '' ?>>
                    Sergipe
                <option value="TO"
                    <?= ($error && set_value('end_uf') == 'TO') || (isset($cliente->end_uf) && $cliente->end_uf == 'TO') ? 'selected' : '' ?>>
                    Tocantins
            </select>
        </div>

        <!-- Cidade -->
        <div class="form-group col-md-3">
            <label for="end_cidade">Cidade:</label>
            <input type="text" id="end_cidade" name="end_cidade" class="form-control" required
                   value="<?= $error ? set_value('end_cidade') : (isset($cliente->end_cidade) ? $cliente->end_cidade : '') ?>">
        </div>

        <!-- Bairro -->
        <div class="form-group col-md-3">
            <label for="end_bairro">Bairro:</label>
            <input type="text" id="end_bairro" name="end_bairro" class="form-control"
                   value="<?= $error ? set_value('end_bairro') : (isset($cliente->end_bairro) ? $cliente->end_bairro : '') ?>">
        </div>

    </div> <!--/.row -->

    <!-- 3ª linha -->
    <div class="row">

        <!-- Logradouro -->
        <div class="form-group col-md-3">
            <label for="end_logradouro">Logradouro:</label>
            <input type="text" id="end_logradouro" name="end_logradouro" class="form-control"
                   value="<?= $error ? set_value('end_logradouro') : (isset($cliente->end_logradouro) ? $cliente->end_logradouro : '') ?>">
        </div>

        <!-- Número -->
        <div class="form-group col-md-3">
            <label for="end_numero">Número:</label>
            <input type="text" id="end_numero" name="end_numero" class="form-control"
                   value="<?= $error ? set_value('end_numero') : (isset($cliente->end_numero) ? $cliente->end_numero : '') ?>">
        </div>

        <!-- Complemento -->
        <div class="form-group col-md-3">
            <label for="end_complemento">Complemento:</label>
            <input type="text" id="end_complemento" name="end_complemento" class="form-control"
                   value="<?= $error ? set_value('end_complemento') : (isset($cliente->end_complemento) ? $cliente->end_complemento : '') ?>">
        </div>

        <!-- Referência -->
        <div class="form-group col-md-3">
            <label for="end_referencia">Referência:</label>
            <input type="text" id="end_referencia" name="end_referencia" class="form-control"
                   value="<?= $error ? set_value('end_referencia') : (isset($cliente->end_referencia) ? $cliente->end_referencia : '') ?>">
        </div>

    </div> <!--/.row -->

    <!-- 4ª linha -->
    <div class="row">

        <!-- E-mail -->
        <div class="form-group col-md-3">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control"
                   value="<?= $error ? set_value('email') : (isset($cliente->email) ? $cliente->email : '') ?>">
        </div>

        <!-- Telefone 1 -->
        <div class="form-group col-md-3">
            <label for="telefone1">Telefone 1:</label>
            <input type="tel" id="telefone1" name="telefone1" class="form-control"
                   placeholder="(00) 00000-0000"
                   pattern="\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}"
                   value="<?= $error ? set_value('telefone1') : (isset($cliente->telefone1) ? $cliente->telefone1 : '') ?>">
        </div>

        <!-- Telefone 2 -->
        <div class="form-group col-md-3">
            <label for="telefone2">Telefone 2:</label>
            <input type="tel" id="telefone2" name="telefone2" class="form-control"
                   placeholder="(00) 00000-0000"
                   pattern="\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}"
                   value="<?= $error ? set_value('telefone2') : (isset($cliente->telefone2) ? $cliente->telefone2 : '') ?>">
        </div>

        <!-- Observações -->
        <div class="form-group col-md-3">
            <label for="obs">Observações:</label>
                <textarea id="obs" name="obs" rows="4"
                          class="form-control"><?= $error ? set_value('obs') : (isset($cliente->obs) ? $cliente->obs : '') ?></textarea>
        </div>

    </div> <!--/.row -->

    <div class="form-group">
        <!-- Salvar -->
        <button type="submit" class="btn btn-success pull-right">
            <span class="glyphicon glyphicon-ok"></span> Salvar
        </button>

        <!-- Voltar -->
        <a href="<?= base_url('cliente') ?>" class="btn btn-warning">
            <span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
    </div>
</form>
<?php $this->load->view('commons/header'); ?>

<div class="container">
    <h1>Dashboard</h1>

    <p><b>Usuário:</b> <?= $this->session->userdata('email') ?></p>
</div>

<?php $this->load->view('commons/footer'); ?>
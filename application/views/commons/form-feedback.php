<?php if ($error) : ?>
    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        </div>
    </div>
<?php elseif ($this->session->flashdata('success')) : ?>
    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-success">
                <p><?= $this->session->flashdata('success') ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>Login</h1>

<?php if (session()->getFlashdata('error')): ?>
    <p class="error"><?= esc(session()->getFlashdata('error')) ?></p>
<?php endif; ?>

<form action="<?= site_url('login') ?>" method="post">
    <?= csrf_field() ?>

    <p>
        <label>Username</label><br>
        <input type="text" name="username" value="<?= esc(old('username')) ?>">
        <?php if (isset($validation) && $validation->hasError('username')): ?>
            <br><span class="error"><?= $validation->getError('username') ?></span>
        <?php endif; ?>
    </p>

    <p>
        <label>Password</label><br>
        <input type="password" name="password">
        <?php if (isset($validation) && $validation->hasError('password')): ?>
            <br><span class="error"><?= $validation->getError('password') ?></span>
        <?php endif; ?>
    </p>

    <button type="submit">Login</button>
</form>

<?= $this->endSection() ?>
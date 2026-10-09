<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Profile</h1>
<?php if (session()->get('isLoggedIn')): ?>
    <p>Logged in as <strong><?= esc($username) ?></strong>.</p>
<?php else: ?>
    <p>You are not logged in. <a href="<?= site_url('login') ?>">Log in</a> to manage your tasks.</p>
<?php endif; ?>
<?= $this->endSection() ?>
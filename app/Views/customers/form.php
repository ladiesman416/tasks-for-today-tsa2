<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<form action="<?= $action ?>" method="post">
    <?= csrf_field() ?>

    <label>Full Name</label>
    <input type="text" name="full_name"
           value="<?= esc(set_value('full_name', $customer['full_name'] ?? '')) ?>">
    <?php if (isset($validation) && $validation->hasError('full_name')): ?>
        <p class="error"><?= $validation->getError('full_name') ?></p>
    <?php endif; ?>

    <label>Email</label>
    <input type="text" name="email"
           value="<?= esc(set_value('email', $customer['email'] ?? '')) ?>">
    <?php if (isset($validation) && $validation->hasError('email')): ?>
        <p class="error"><?= $validation->getError('email') ?></p>
    <?php endif; ?>

    <button type="submit">Save</button>
    <a href="<?= site_url('customers') ?>">Cancel</a>
</form>

<?= $this->endSection() ?>
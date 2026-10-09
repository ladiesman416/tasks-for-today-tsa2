<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<form action="<?= $action ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <p>
        <label>Username</label><br>
        <input type="text" name="username"
               value="<?= esc(set_value('username', $user['username'] ?? '')) ?>">
        <?php if (isset($validation) && $validation->hasError('username')): ?>
            <br><span class="error"><?= $validation->getError('username') ?></span>
        <?php endif; ?>
    </p>

    <p>
        <label>Full Name</label><br>
        <input type="text" name="full_name"
               value="<?= esc(set_value('full_name', $user['full_name'] ?? '')) ?>">
        <?php if (isset($validation) && $validation->hasError('full_name')): ?>
            <br><span class="error"><?= $validation->getError('full_name') ?></span>
        <?php endif; ?>
    </p>

    <?php if ($user): ?>
        <p>
            <label>Profile Picture (JPG/PNG, max 2MB)</label><br>
            <input type="file" name="avatar" accept=".jpg,.jpeg,.png">
            <?php if (isset($validation) && $validation->hasError('avatar')): ?>
                <br><span class="error"><?= $validation->getError('avatar') ?></span>
            <?php endif; ?>
        </p>
    <?php endif; ?>
        <p>
            <label>Password<?= $user ? ' (leave blank to keep current)' : '' ?></label><br>
            <input type="password" name="password">
            <?php if (isset($validation) && $validation->hasError('password')): ?>
                <br><span class="error"><?= $validation->getError('password') ?></span>
            <?php endif; ?>
        </p>
    <button type="submit">Save</button>
    <a href="<?= site_url('users') ?>">Cancel</a>
</form>

<?= $this->endSection() ?>
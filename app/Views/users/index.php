<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>User Accounts</h1>

<a href="<?= site_url('users/new') ?>">Add New User</a>

<table border="1" cellpadding="6">
    <tr>
        <th>Username</th>
        <th>Full Name</th>
        <th>Avatar</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>
            <td>
                <?php if (! empty($user['avatar'])): ?>
                    <img src="<?= base_url('uploads/avatars/thumb_' . $user['avatar']) ?>" width="50" height="50" alt="avatar">
                <?php else: ?>
                    <img src="<?= base_url('images/placeholder.png') ?>" width="50" height="50" alt="no avatar">
                <?php endif; ?>
            </td>
            <td><a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection() ?>
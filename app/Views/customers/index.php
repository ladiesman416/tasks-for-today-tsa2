<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Customer Accounts</h1>
<a href="<?= site_url('customers/new') ?>">Add New Customer</a>

<table border="1" cellpadding="6">
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= esc($customer['full_name']) ?></td>
            <td><?= esc($customer['email']) ?></td>
            <td><?= esc($customer['phone']) ?></td>
           <td><a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection() ?>
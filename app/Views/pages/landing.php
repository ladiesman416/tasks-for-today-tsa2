<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Welcome to Tasks for Today</h1>
<p>IT0049 Web System Technologies &middot; Tasks for Today</p>

<h2>Today's Tasks</h2>
<?php if (empty($tasks)): ?>
    <p>No tasks yet.</p>
<?php else: ?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li><?= esc($task['title']) ?> (<?= esc($task['task_date']) ?>)</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?= $this->endSection() ?>
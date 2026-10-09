<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?php $loggedIn = session()->get('isLoggedIn'); ?>
<?php $today = date('Y-m-d'); ?>

<div class="task-page-head">
    <div>
        <h1>Task List</h1>
        <p class="task-sub"><?= count($tasks) ?> active <?= count($tasks) === 1 ? 'task' : 'tasks' ?></p>
    </div>
    <?php if ($loggedIn): ?>
        <a class="task-btn task-btn-primary" href="<?= site_url('tasks/new') ?>">+ New Task</a>
    <?php endif; ?>
</div>

<?php if (empty($tasks)): ?>
    <div class="task-empty">
        <p>No tasks yet.</p>
        <?php if ($loggedIn): ?>
            <a class="task-btn task-btn-primary" href="<?= site_url('tasks/new') ?>">Add your first task</a>
        <?php else: ?>
            <p><a href="<?= site_url('login') ?>">Log in</a> to add tasks.</p>
        <?php endif; ?>
    </div>
<?php else: ?>
    <div class="task-grid">
        <?php foreach ($tasks as $task): ?>
            <?php
                if ($task['task_date'] === $today) {
                    $badgeClass = 'task-badge-today';
                    $badgeText  = 'Today';
                } elseif ($task['task_date'] < $today) {
                    $badgeClass = 'task-badge-late';
                    $badgeText  = 'Overdue';
                } else {
                    $badgeClass = 'task-badge-soon';
                    $badgeText  = 'Upcoming';
                }
            ?>
            <article class="task-item">
                <div class="task-item-top">
                    <h2><?= esc($task['title']) ?></h2>
                    <span class="task-badge <?= $badgeClass ?>"><?= $badgeText ?></span>
                </div>

                <p class="task-date"><?= esc(date('M d, Y', strtotime($task['task_date']))) ?></p>

                <?php if (! empty($task['description'])): ?>
                    <p class="task-desc"><?= esc($task['description']) ?></p>
                <?php endif; ?>

                <?php if ($loggedIn): ?>
                    <div class="task-item-actions">
                        <a class="task-btn task-btn-secondary task-btn-sm"
                           href="<?= site_url('tasks/edit/' . $task['id']) ?>">Edit</a>

                        <form class="task-inline-form"
                              action="<?= site_url('tasks/archive/' . $task['id']) ?>" method="post">
                            <?= csrf_field() ?>
                            <button type="submit" class="task-btn task-btn-danger task-btn-sm"
                                    onclick="return confirm('Delete this task?')">Delete</button>
                        </form>
                    </div>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
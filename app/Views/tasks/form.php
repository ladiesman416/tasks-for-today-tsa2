<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="task-card">
    <h1><?= esc($title) ?></h1>
    <p class="task-sub">
        <?= $task ? 'Update the details below.' : 'Add something you want to get done.' ?>
    </p>

    <form action="<?= $action ?>" method="post">
        <?= csrf_field() ?>

        <div class="task-field <?= (isset($validation) && $validation->hasError('title')) ? 'has-error' : '' ?>">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="e.g. Finish TSA2"
                   value="<?= esc(set_value('title', $task['title'] ?? '')) ?>">
            <?php if (isset($validation) && $validation->hasError('title')): ?>
                <p class="error"><?= $validation->getError('title') ?></p>
            <?php endif; ?>
        </div>

        <div class="task-field">
            <label for="description">Description <span class="task-optional">(optional)</span></label>
            <textarea id="description" name="description" rows="4"
                      placeholder="Add some details..."><?= esc(set_value('description', $task['description'] ?? '')) ?></textarea>
        </div>

        <div class="task-field <?= (isset($validation) && $validation->hasError('task_date')) ? 'has-error' : '' ?>">
            <label for="task_date">Task Date</label>
            <input type="date" id="task_date" name="task_date"
                   value="<?= esc(set_value('task_date', $task['task_date'] ?? date('Y-m-d'))) ?>">
            <?php if (isset($validation) && $validation->hasError('task_date')): ?>
                <p class="error"><?= $validation->getError('task_date') ?></p>
            <?php endif; ?>
        </div>

        <div class="task-actions">
            <a class="task-btn task-btn-secondary" href="<?= site_url('tasks') ?>">Cancel</a>
            <button type="submit" class="task-btn task-btn-primary">Save Task</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
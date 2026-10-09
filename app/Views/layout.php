<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<nav class="navbar">
    <div class="nav-inner">
        <a class="brand" href="<?= site_url('/') ?>">POS System</a>

           <input type="checkbox" id="nav-toggle" class="nav-toggle">
           <label for="nav-toggle" class="nav-burger">&#9776;</label>

        <div class="nav-links">
           <a href="<?= site_url('/') ?>">Home</a>
  <a href="<?= site_url('tasks') ?>">Tasks</a>
  <a href="<?= site_url('profile') ?>">Profile</a>
  <a href="<?= site_url('about') ?>">About</a>
  <?php if (session()->get('isLoggedIn')): ?>
      <a href="<?= site_url('tasks/new') ?>">New Task</a>
  <?php endif; ?>
        </div>

        <div class="nav-auth">
            <?php if (session()->get('isLoggedIn')): ?>
                <span class="nav-user"><?= esc(session()->get('username')) ?></span>
                <a class="btn btn-light" href="<?= site_url('logout') ?>">Logout</a>
            <?php else: ?>
                <a class="btn btn-light" href="<?= site_url('login') ?>">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<main class="container">
    <?= $this->renderSection('content') ?>
</main>

<footer class="footer">
    IT0049 Web System Technologies &middot; Tasks for Today
</footer>

</body>
</html>
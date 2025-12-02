<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="mainpage.css">
    <link rel="stylesheet" href="../includes/allstyles.css">

</head>
<body>

<?php
include "../includes/header.php";
?>
<main class="homepage">
    <section class="intro">
        <h2>Plan your day easily</h2>
        <p>
            Welcome to <strong>My To-Do</strong> — a simple and elegant task manager
            where you can organize your daily goals, track progress,
            and stay productive. Add tasks, mark them as done, and keep your life in order.
        </p>


        <a href="../registrpage/registration.php" class="button">Start Your To-Do List</a>
    </section>

    <section class="preview">
        <img src="fotofor.png" alt="Preview of To-Do app">
    </section>
</main>
<section class="features">
    <div class="feature">
        <h3>✅ Easy to Use</h3>
        <p>Add, edit, and delete tasks in seconds.</p>
    </div>
    <div class="feature">
        <h3>🕒 Stay Organized</h3>
        <p>Keep your daily schedule neat and focused.</p>
    </div>
    <div class="feature">
        <h3>💾 Saved Automatically</h3>
        <p>Your tasks are safely stored and synced.</p>

    </div>

</section>


<?php
include "../includes/footer.php";
?>


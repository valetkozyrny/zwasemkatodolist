<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="todopage.css">

</head>
<body>


<header class="site-header">
    <h1 class="logo">📝 My To-Do</h1>
    <nav class="nav-links">
        <a href="../mainpage/mainpage.php">Home</a>
        <a href="../todoopage/todopage.php" class="active">Tasks</a>
        <a href="profile.html">Profile</a>
    </nav>
</header>

<main class="todomain">
    <div class="todopage">
        <h2>To-Do List</h2>
        <label for="todofield">Write a task</label>
        <input class="todofield" required id="todofield" name="todofield" placeholder="New Task">
        <button type="button" id="todobutton">Create</button>
        <ol class="todolist"></ol>
    </div>
</main>
<script src="todopage.js" defer></script>



</body>
</html>

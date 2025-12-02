<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="todopage.css">
    <script src="todopage.js" defer></script>

</head>
<body>

<?php
include "../includes/header.php";
?>

<main class="todomain">
    <div class="todopage">
        <h2>To-Do List</h2>
        <label for="todofield">Write a task</label>
        <input class="todofield" required id="todofield" name="todofield" placeholder="New Task">
        <button type="button" id="todobutton">Create</button>
        <ol class="todolist"></ol>
        <div class="pagination"></div>
    </div>
</main>




<?php
include "../includes/footer.php";
?>

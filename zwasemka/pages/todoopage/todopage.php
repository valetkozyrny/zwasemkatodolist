<?php
include_once "../../includes/header.php";
session_start();
if (isset($_SESSION['agreement'])) {

}
?>

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


<?php
include_once "../../includes/footer.php";
?>
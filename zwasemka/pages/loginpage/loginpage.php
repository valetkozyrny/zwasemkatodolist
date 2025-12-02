<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../includes/allstyles.css">
    <title>Login</title>
</head>

<body>

<div class="login-container">
    <form class="auth-card" action="loginapi.php" method="POST" novalidate>
        <h2>Login</h2>
        <label for="email"> Email</label>
        <input type="email" name="email" id="email" class="email" required>

        <label for="password" > Password </label>
        <input name="password" id="password" type="password" class="password" required
               minlength="8"
               maxlength="16"
               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}"
               aria-errormessage="password-errors">
        <p class="link">
            <a href="../registrpage/registration.php">Or sign up</a>
        </p>
        <button type="submit"> Sent login</button>

    </form>
</div>
<?php
include "../includes/footer.php";

?>

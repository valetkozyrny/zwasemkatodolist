<?php
if (session_status() !== PHP_SESSION_NONE) {
    session_start();
}

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    die("Request method must be POST");
}
$email = trim($_POST["email"]);
$password = $_POST["password"];
$about = trim($_POST["about"]);
$gender = $_POST["gender"];
$agreement = $_POST["agreement"];

$old = [];
$errors = [];
// script bez AJAXu hehehe
if(empty($email)|| filter_var($email, FILTER_VALIDATE_EMAIL) === false || strlen($email)>18 || strlen($email)<3) {
    $errors['email'] = "Invalid email. Email must cannot be empty. Email length must be more than 3 and less than 12.";
}
$pswPattern ='/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/';
if(!preg_match($pswPattern, $password)){
    $errors = 'Invalid password. Password length must be more than 8 and less than 16. Include one uppercase letter, one lowercase letter and one digit';
}

<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Erorr, info must be send in method POST";
    exit;
}

$email = trim($_POST['email']) ?? null;
$password = $_POST['password'];
$about = $_POST['about'];
$gender = $_POST['gender'];
$agreement = $_POST['agreement'] ?? null;

$errors = array();
if (strlen($email) <= 3) {
    $errors[] = "Email is too short";

}
if (strlen($password) < 8) {
    $errors[] = "Password is too short";

}
if (!$gender) {
    $errors[] = 'Please select a gender';
}

if (!$agreement) {
    $errors[] = 'You must agre with smth';
}
if (!empty($errors)) {
    echo "<h3>Errors of registration</h3>";
    foreach($errors as $error) {
        echo "<p style = 'color:red'>$error</p>";

    }
    exit();
}
$hashOfPassword = password_hash($password,PASSWORD_DEFAULT);

$data = $email . "|" . $hashOfPassword . "|" . $about . "|" . $gender . "|" . $agreement . "\n";
file_put_contents('./usersdata.txt', $data, FILE_APPEND);




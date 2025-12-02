<?php
include '../registrpage/usersdata.txt';
session_start();

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    echo "Invalid request method";
    exit;
}
$email = $_POST["email"] ?? null;
$password = $_POST["password"] ?? null;

if(!$email || !$password){
    echo "Please fill all the required fields";
    exit;
}
$path = __DIR__ . "/../registrpage/usersdata.txt";
$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if(!$lines){
    echo "There was an error while trying to fetch user data";
    exit;
}

$userFound = null;
foreach($lines as $line) {
    list($fileEmail, $fileHash, $about, $gender, $agreement) = explode("|", $line);
    if (trim($fileEmail) === trim($email)) {
        $userFound = [
            "email" => $fileEmail,
            "hash" => $fileHash,
            'about' => $about,
            'gender' => $gender,
            'agreement' => $agreement
        ];
        break;
    }
}
if($userFound === false){
    echo "Somthing went wrong. User not found";
    exit;
}
if(!password_verify($password, $userFound["hash"])){
    echo "password not correct";
}

$_SESSION['user'] = [
    'email' => $userFound['email'],
    'gender' => $userFound['gender'],
    'about' => $userFound['about'],
    ];

header('Location: /pages/todoopage/todopage.php');


?>

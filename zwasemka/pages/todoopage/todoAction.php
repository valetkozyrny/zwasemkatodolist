<?php
session_start();

$user = $_SESSION['user']['email'];
$path = __DIR__ . "/todos_" . $user . ".txt";

$action = $_POST['action'] ?? null;

// защищаемся если файла нет
if (!file_exists($path)) {
    file_put_contents($path, "");
}



// --------------------------------------------------
// 1️⃣ ДОБАВЛЕНИЕ ЗАДАЧИ
// --------------------------------------------------
if ($action === "add") {

    $text = trim($_POST['text'] ?? "");

    if ($text === "") {
        echo json_encode(["status" => "error", "message" => "Empty text"]);
        exit;
    }

    // формат: text|notdone
    file_put_contents($path, $text . "|notdone\n", FILE_APPEND);

    echo json_encode(["status" => "success"]);
    exit;
}



// --------------------------------------------------
// 2️⃣ УДАЛЕНИЕ ЗАДАЧИ ПО ИНДЕКСУ
// --------------------------------------------------
if ($action === "delete") {

    $index = (int)$_POST['index'];

    $lines = file($path, FILE_IGNORE_NEW_LINES);

    if (!isset($lines[$index])) {
        echo json_encode(["status" => "error", "message" => "Task not found"]);
        exit;
    }

    unset($lines[$index]);

    file_put_contents($path, implode("\n", $lines) . "\n");

    echo json_encode(["status" => "success"]);
    exit;
}



// --------------------------------------------------
// 3️⃣ ОБНОВЛЕНИЕ ТЕКСТА
// --------------------------------------------------
if ($action === "update") {

    $index = (int)$_POST['index'];
    $newText = trim($_POST['text']);

    $lines = file($path, FILE_IGNORE_NEW_LINES);

    if (!isset($lines[$index])) {
        echo json_encode(["status" => "error", "message" => "Task not found"]);
        exit;
    }

    // статус остаётся прежний
    list($_oldText, $status) = explode("|", $lines[$index]);

    $lines[$index] = $newText . "|" . $status;

    file_put_contents($path, implode("\n", $lines) . "\n");

    echo json_encode(["status" => "success"]);
    exit;
}


echo json_encode(["status" => "error", "message" => "Invalid action"]);
exit;


<?php
header('Content-Type: application/json');

$path = __DIR__ . "/tasks.json";

if (!file_exists($path)) {
    file_put_contents($path, json_encode([]));
}

$tasks = json_decode(file_get_contents($path), true);
if (!is_array($tasks)) $tasks = [];


$action = $_POST["action"] ?? "";


// --------------------------------------
// ADD
// --------------------------------------
if ($action === "add") {
    $text = trim($_POST["text"] ?? "");
    if ($text === "") {
        echo json_encode(["ok" => false, "message" => "Empty text"]);
        exit;
    }

    $tasks[] = [
        "text" => $text
    ];

    file_put_contents($path, json_encode($tasks));
    echo json_encode(["ok" => true]);
    exit;
}


// --------------------------------------
// DELETE
// --------------------------------------
if ($action === "delete") {
    $index = intval($_POST["index"]);

    if (!isset($tasks[$index])) {
        echo json_encode(["ok" => false, "message" => "Not found"]);
        exit;
    }

    array_splice($tasks, $index, 1);

    file_put_contents($path, json_encode($tasks));
    echo json_encode(["ok" => true]);
    exit;
}


// --------------------------------------
// UPDATE
// --------------------------------------
if ($action === "update") {
    $index = intval($_POST["index"]);
    $text = trim($_POST["text"] ?? "");

    if (!isset($tasks[$index])) {
        echo json_encode(["ok" => false, "message" => "Not found"]);
        exit;
    }

    if ($text === "") {
        echo json_encode(["ok" => false, "message" => "Empty text"]);
        exit;
    }

    $tasks[$index]["text"] = $text;

    file_put_contents($path, json_encode($tasks));
    echo json_encode(["ok" => true]);
    exit;
}


echo json_encode(["ok" => false, "message" => "Invalid action"]);
exit;

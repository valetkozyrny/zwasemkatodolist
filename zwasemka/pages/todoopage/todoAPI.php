<?php
session_start();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if($page <1) $page = 1;

$userEmail = $_SESSION['user']['email'];
$filePath = __DIR__ . "/todo_" . $userEmail . ".txt";

if (file_exists($filePath)) {
    file_put_contents($filePath, "");
}

$lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$tasksForPag = 5;
$totaltasks = count($lines);

$totalpages = (max(1,ceil($totaltasks / $tasksForPag)));

$startindex = ($page - 1) * $tasksForPag;

$currentTasks = array_slice($lines, $startindex, $tasksForPag);



$tasks = [];
foreach ($currentTasks as $task) {
    list($text, $status) = explode(" | ", $task);
    $tasks[] = [
        'text' => $text,
        'status' => $status
    ];
}
header('Content-type: application/json');
echo json_encode([
    "page" => $page,
    "totalPages" => $totalpages,
    "tasks" => $tasks
]);

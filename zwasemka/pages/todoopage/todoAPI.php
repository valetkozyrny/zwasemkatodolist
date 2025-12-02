<?php
header('Content-Type: application/json');

$path = __DIR__ . "/tasks.json";

if (!file_exists($path)) {
    file_put_contents($path, json_encode([]));
}

$tasks = json_decode(file_get_contents($path), true);
if (!is_array($tasks)) $tasks = [];

// ---
$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$page = max(1, $page);

$perPage = 5;
$total = count($tasks);
$totalPages = max(1, ceil($total / $perPage));

$start = ($page - 1) * $perPage;
$tasksPage = array_slice($tasks, $start, $perPage);

// добавляем реальный индекс, чтобы не путаться
foreach ($tasksPage as $i => $t) {
    $tasksPage[$i]["realIndex"] = $start + $i;
}

echo json_encode([
    "ok" => true,
    "page" => $page,
    "totalPages" => $totalPages,
    "tasks" => $tasksPage
]);
exit;

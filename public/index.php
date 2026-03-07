<?php

$pages = [
    'list' => 'list.php',
    'view' => 'view.php',
    'form' => 'form.php'
];

$page = $_GET['page'] ?? 'list';

if (isset($pages[$page])) {
    $notes = ['Note 1', 'Note 2'];
    include __DIR__ . '/../views/' . $pages[$page];
} else {
    // include('views/404.php') TODO: add a 404 view
    http_response_code(404);
    echo "Page not found.";
}

?>
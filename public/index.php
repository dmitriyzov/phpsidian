<?php
declare(strict_types=1);

require_once __DIR__ . '/router.php';
require_once __DIR__ . '/../app/Note.php';

$pages = [
    'list' => 'list.php',
    'view' => 'view.php',
    'form' => 'form.php'
];

$page = $_GET['page'] ?? 'list';

if (isset($pages[$page])) {
    $notes = [
        new Note('Note 1', 'Content 1'),
        new Note('Note 2', 'Content 2')
    ];
    render($pages[$page], ['notes' => $notes]);
} else {
    // include('views/404.php') TODO: add a 404 view
    http_response_code(404);
    echo "Page not found.";
}

?>
<?php
declare(strict_types=1);

require_once __DIR__ . '/Note.php';

# TODO: have it implement a ControllerInterface
readonly class NotesController
{
    public function __construct() {}

    # TODO: implement pagination and limit
    public function list()
    {
        $notes = [
            new Note('Note 1', 'Content 1'),
            new Note('Note 2', 'Content 2')
        ];

        return $this->renderView('list.php', ['notes' => $notes]);

    }

    public function renderView(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../views/' . $view;
    }
}

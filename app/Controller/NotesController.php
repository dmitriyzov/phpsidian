<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Note;

# TODO: have it implement a ControllerInterface
class NotesController extends AbstractController
{
    # TODO: implement pagination and limit
    public function list() : void
    {
        $notes = [
            new Note('Note 1', 'Content 1'),
            new Note('Note 2', 'Content 2')
        ];

        $this->renderView('list.php', ['notes' => $notes]);

    }

    public function view() : void
    {
        $notes = [
            new Note('Note 1', 'Content 1'),
            new Note('Note 2', 'Content 2')
        ];

        $id = $_GET['id'] ?? 1;
        
        $note = $notes[intval($id)-1];
        $this->renderView('view.php', ['note' => $note]);

    }

    private function renderView(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../../views/' . $view;
    }
}

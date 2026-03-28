<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Note;
use App\Repository\NoteRepository;

# TODO: have it implement a ControllerInterface
class NotesController extends AbstractController
{
    public function __construct(private NoteRepository $repository) {}

    # TODO: implement pagination and limit
    public function list() : void
    {
        $notes = $this->repository->findAll();
        $this->renderView('list.php', ['notes' => $notes]);
    }

    public function view() : void
    {
        $id = $_GET['id'] ?? 1;
        $note = $this->repository->findById(intval($id));
        $this->renderView('view.php', ['note' => $note]);
    }

    private function renderView(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../../views/' . $view;
    }
}

<?php
declare(strict_types=1);

namespace App\Repository;

use PDO;
use App\Entity\Note;

class NoteRepository
{
    public function __construct(private PDO $pdo) {}

    public function findAll() : array
    {
        $stmt = $this->pdo->query('SELECT * FROM notes');

        return array_map(
            fn($row) => new Note($row['title'], $row['content']),
            $stmt->fetchAll(PDO::FETCH_ASSOC)
        );
    }

    public function findById(int $id) : ?Note
    {
        $stmt = $this->pdo->prepare('SELECT * FROM notes WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Note($row['title'], $row['content']);
    }

    public function create(Note $note) : int
    {
        // TODO: add tag support
        $stmt = $this->pdo->prepare(
            'INSERT INTO notes (title, content, date_created, date_updated)
            VALUES (:title, :content, :date_created, :date_updated)');
        
        // TODO: move date format into some sort of project config
        $now = (new \DateTimeImmutable())->format('Y-m-d H:i:s');

        $stmt->execute([
            'title' => $note->title,
            'content' => $note->content,
            'date_created' => $now,
            'date_updated' => $now
        ]);

        return intval($this->pdo->lastInsertId());
    }
}

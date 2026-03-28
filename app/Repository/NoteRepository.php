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
}

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
}

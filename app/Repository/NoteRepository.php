<?php
declare(strict_types=1);

namespace App\Repository;

use PDO;

class NoteRepository
{
    public function __construct(private PDO $pdo) {}

    public function findAll() : array
    {
        $stmt = $this->pdo->query('SELECT * FROM notes');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

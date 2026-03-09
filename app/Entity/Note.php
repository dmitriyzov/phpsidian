<?php
declare(strict_types=1);

namespace App\Entity;

readonly class Note
{
    public function __construct(
        public string $title,
        public string $content
    ) {}
}

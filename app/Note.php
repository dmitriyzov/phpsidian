<?php
declare(strict_types=1);

readonly class Note
{
    public function __construct(
        public string $title,
        public string $content
    ) {}
}

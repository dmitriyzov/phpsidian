<?php
declare(strict_types=1);

function render(string $view, array $data = []): void
{
    extract($data);
    require __DIR__ . '/../views/' . $view;
}

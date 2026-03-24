<?php
declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
    public const ALLOWED_ACTIONS = ['list' => true, 'view' => true];
}
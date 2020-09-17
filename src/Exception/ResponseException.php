<?php

namespace MakeItCreative\Exception;

use Cake\Http\Exception\NotFoundException;

class ResponseException extends NotFoundException
{
    public function __construct(?string $message, ?int $code, ?\Throwable $previous)
    {
        die('IMAGE INTROUVABLE');
    }
}

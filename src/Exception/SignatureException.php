<?php

namespace MakeItCreative\Exception;

use Cake\Http\Exception\ForbiddenException;

class SignatureException extends ForbiddenException
{
    public function __construct(?string $message, ?int $code, ?\Throwable $previous)
    {
        die('ERREUR SIGNATURE IMAGE');
    }
}

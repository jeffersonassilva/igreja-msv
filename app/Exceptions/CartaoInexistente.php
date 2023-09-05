<?php

namespace App\Exceptions;

use Exception, Throwable;

class CartaoInexistente extends Exception
{
    public function __construct(string $message, int $code = 406, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

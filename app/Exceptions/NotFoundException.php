<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function __construct($message = '')
    {
        parent::__construct($message);
    }

    public function render($request)
    {
        return response()->json([
            'error' => $this->message,
        ], 404);
    }
}

<?php

namespace App\Exceptions;

use Exception;

class InvalidStationsOrderException extends Exception
{
    public function __construct($message = 'Invalid Stations Order')
    {
        parent::__construct($message);
    }

    public function render($request)
    {
        return response()->json([
            'error' => $this->message,
        ], 400);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if($e instanceof ModelNotFoundException && request()->wantsJson()){
            return response()->json([
                'data' => 'Resource not found'
            ], 404);
        }

        return parent::render($request, $e);
    }
}

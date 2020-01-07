<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function sendSuccessResponse($data, $message = 'Successful operation', $meta = [])
    {
        return response()->json(
            [
            'flag' => true,
            'message' => $message,
            'data' => $data,
            'meta' => $meta
            ], 200,[], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT
        );
    }
}

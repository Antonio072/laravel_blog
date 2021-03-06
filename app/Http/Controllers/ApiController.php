<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    protected function sendErrorResponse($message = 'Unexpected error. Try again.', $code=501)
    {
        return response()->json(
            [
            'flag'=>false,
            'message'=>$message],
            $code
        );
    }

    protected function getAuthenticatedUser(){
        $user= null;
        try{
            $user = Auth::user();
        }
        catch (Exceptions\JWTException $e){
            $this->sendErrorResponse('Sessión invalida here', 403);
        }
        return $user;
    }

    protected function sendSuccessLoginResponse($data, $message = 'Successful operation', $meta = []){
        $token = $data['token'];
        unset($data['token']);
        return response()->json([
                'flag' => true,
                'message' => $message,
                'data' => $data,
                'meta' => $meta], 
                200,[], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT)
            ->header( 
            'Content-type', 'text/json')->cookie('token', $token, 60);
    }
}

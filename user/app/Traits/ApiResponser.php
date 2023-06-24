<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser{
    // build success responser
    // success reponser
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data, 'Microservice' => "User"], $code);
    }
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'Microservice' => "User", "code" => $code], $code);
    }
}

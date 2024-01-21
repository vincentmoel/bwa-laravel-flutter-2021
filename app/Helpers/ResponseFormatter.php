<?php

namespace App\Helpers;

class ResponseFormatter
{
    public static function success($code, $message, $data)
    {
        return response()->json([
            "code"      => $code,
            "message"   => $message,
            "data"      => $data,
        ], $code);
    }

    public static function error($code, $message, $errors = null)
    {
        $response = [
            "code"      => $code,
            "message"   => $message,
        ];
        
        if($errors)
        {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }
}

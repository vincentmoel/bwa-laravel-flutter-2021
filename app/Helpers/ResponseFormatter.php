<?php

namespace App\Helpers;

class ResponseFormatter
{
    public static function success($code, $message, $data = null)
    {
        $response = [
            "code"      => $code,
            "message"   => $message,
        ];
        
        if($data)
        {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
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

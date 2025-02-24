<?php

namespace App\Http\Helpers;

class Helper {
    public static function successOnly(){
       return response()->json([
            'success' => "Completed successfully"
        ]);
    }

    public static function successWithData($data, $key = 'data', $message = 'Completed Successfully', $status_code = 200 ){
        return response()->json([
            'message' => $message,
            $key => $data
        ], $status_code);
    }
}
<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    private function responseSuccess(array $response) : JsonResponse {
        return response()->json(['success' => true,'data' => ($response["data"] ?? ""),'message' => $response["message"] ?? ""], 200);
    }                 

    private function responseError(array $response) : JsonResponse {
        return response()->json(['success' => false,'data' => ($response["data"] ?? ""),'message' => $response["message"] ?? ""], 400);
    }   

    public function responseData(array $response) : JsonResponse {
        if ($response["success"] === true){
            return $this->responseSuccess($response);
        }
        return $this->responseError($response);
    }
}

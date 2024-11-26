<?php
namespace App\Http\Traits;

trait GeneralTrait{
    public function apiResponse($data = null, bool $status = true, $error = null, $statusCode = 200)
    {
        $array = [
            'data' => $data,
            'status' => $status,
            'error' => $error,
            'statusCode' => $statusCode
        ];
        return response($array, $statusCode);
    }


    public function ValidationError($data = null, $validator)
    {
        return $this->apiResponse(null, false, $validator->errors()->first(), 400);
    }

    public function unAuthorizeResponse()
    {
        return $this->apiResponse(null, false, 'Unauthorize', 401);
    }

    public function SuccessResponse($data = NULL, $statusCode = 200)
    {
        return $this->apiResponse($data, True, NULL, $statusCode);
    }

    public function forbiddenResponse()
    {
        return $this->apiResponse(null, false, 'Forbidden', 403);
    }

    public function requiredField($message)
    {
      
        return $this->apiResponse(null, false, $message, 400);
    }

}
?>
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\GeneralTrait;
class UserResource extends JsonResource
{
    use GeneralTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email' => $this->email,
            'phone' => $this->phone,
             'city'=>$this->city,  
             'image'=>$this->image,  
             ];
    }

    public function successResponse()
    {
        return $this->apiResponse(['customer' => $this], true, null, 200);
    }

    public function successResponseWithToken($token)
    {
        return $this->apiResponse(['researcher' => $this, 'token' => $token], true, null, 200);
    }

















}

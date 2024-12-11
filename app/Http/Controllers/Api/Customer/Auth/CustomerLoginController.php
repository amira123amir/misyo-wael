<?php

namespace App\Http\Controllers\Api\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Traits\GeneralTrait;
class CustomerLoginController extends Controller
{
    use GeneralTrait;
    public function login(Request $request){
        $rules=[
            'email' => ['required','string','email','exists:users,email'],
            'password' => ['required','string','min:8','max:255'],
        ];  

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $firstError = $validator->errors()->first();
            if (strpos($firstError, 'required') !== false) {
                return $this->requiredField('this field must be required');
            }
            if (strpos($firstError, 'at least 8') !== false) {
                return $this->requiredField('The password field must be at least 8 characters.');
            }

            return $this->apiResponse(null, false, 'your email or password is not vaild', 400);
        }

         $customer=User::where('email',$request->email)->first();

          if(!Hash::check($request->password, $customer->password)){

            return $this->apiResponse(null, false, 'your email or password is not vaild', 400);
          }              
          
    
        $token = $customer->createToken('auth_token')->plainTextToken;

        return (new UserResource($customer))->successResponseWithToken($token);

    }


    public function logout()
    {
        $customer = auth()->guard('sanctum')->user();

        if ($customer && $customer->currentAccessToken()) {
            $customer->currentAccessToken()->delete();
        }
        return response()->json(['message' => 'Logged out successfully']);
    }



















}

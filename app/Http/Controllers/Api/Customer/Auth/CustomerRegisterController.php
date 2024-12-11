<?php

namespace App\Http\Controllers\Api\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\GeneralTrait;
use App\Http\Resources\UserResource;
use App\Models\User;
class CustomerRegisterController extends Controller
{
    use GeneralTrait;
    public function store(Request $request){
        
           $rules=[
               'name'=>['required','string','regex:/^[A-Za-z]+$/','max:255'],
               'email' => ['required','string','email','unique:users,email'],
               'phone' => ['required','regex:/^09\d{8}$/','size:10','unique:users,phone'],
               'city'=>['required','in:Homs,Hama,Aleppo,Daraa,Tartous,Lattakia,Damascus'],
               'password' => ['required','string','min:8','max:255'],
           ];  

           $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){ 
           return $this->ValidationError(null,$validator);
            }

             $customer=User::create([
                       'name'=>$request->name,
                        'email'=>$request->email, 
                        'phone'=>$request->phone,
                        'password' => $request->password,
                        'city'=>$request->city,
                        'role'=>'customer',                       
             ]); 
                  
             return (new UserResource($customer))->successResponse();


    }
}

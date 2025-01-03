<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\City;
use App\Models\Area;
use App\Models\WorkTime;
use App\Http\Resources\OrderResource;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|array',
            'title.*.product_uuid' => 'required|exists:products,uuid',
            'title.*.quantity' => 'required|integer|min:1',
            'title.*.price' => 'required|integer|min:1',
            'user_uuid' => 'required|exists:users,uuid',
            'area_uuid' => 'required|exists:areas,uuid',
            'area_address' => 'nullable|string',
            'total_price' => 'required|integer|min:1', 
        ]);
    
        if ($validator->fails()) {
            return $this->ValidationError(null,$validator);
        }

        $user_id = User::where('uuid', $request->user_uuid)->where('role','customer')->first();
        $area_id = Area::where('uuid', $request->area_uuid)->first();

        $order = Order::create([
            'title' => $request->title, 
            'user_id' => $user_id->id,
            'status' => 'wait',
            'area_id' => $area_id->id,
            'area_address'=>$request->area_address,
            'total_price' => $request->total_price,
        ]);
        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

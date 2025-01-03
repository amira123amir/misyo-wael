<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\GeneralTrait;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\Area;
use App\Models\City;
class OrderResource extends JsonResource
{
    use GeneralTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'title' => $this->title, 
            'user_uuid' => $this->user->uuid,
            'status' => $this->status,
            'area_uuid' => $this->area->uuid,
            'area_address' => $this->area_address,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}

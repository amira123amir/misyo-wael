<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\GeneralTrait;
class ProductResource extends JsonResource
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
            'title'=>$this->title,
            'quantity' => $this->quantity,
            'size' => $this->size,
             'color'=>$this->color,    
             'material'=>$this->material, 
             'type'=>$this->type, 
             'price'=>$this->price,
             'discount'=>$this->discount,
             'image'=>env('PATH_IMAGE').$this->image,
             'category_id'=>$this->category_id
             ];
    }

    public function successResponse()
    {
        return $this->apiResponse(['categories' => $this], true, null, 200);
    }










}

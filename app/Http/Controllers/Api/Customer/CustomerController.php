<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = Product::query();
         if ($request->filled('category')) {
            $query->where('category_id', $request->category);
                }
            if ($request->filled('size')) 
            $query->where('size',  'LIKE', '%' . $request->size . '%');
          
            if ($request->filled('color')) 
            $query->where('color',  'LIKE', '%' . $request->color . '%');
  
            if ($request->filled('material')) 
            $query->where('material',  'LIKE', '%' . $request->material. '%');
  
            if ($request->filled('price')) 
            $query->where('price',  'LIKE', '%' . $request->price . '%');
        
            $products= ProductResource::collection($query->get());
               if(count($query->get())==0){
                return $this->successResponse(['products'=>$products,'message'=>'products are not found']);
               }else{
                return $this->successResponse(['products'=>$products,'message'=>null]);
               }

            // return $this->successResponse(['products'=>$products]);
              
            
    }

    public function search(Request $request)
    {
        
        $rules=[
            'product'=>['nullable','string','max:8'],
 
        ];  
       
        $validator = Validator::make($request->all(), $rules);

         if($validator->fails()){ 
           
        return $this->ValidationError(null,$validator);
         }

        $searchTerm = $request->input('product');
  

             if(is_null($searchTerm)){
                
                return $this->successResponse(['products'=>[],'message'=>'products are not found']);
    }else{
        $products = Product::query()
        ->where('title', 'like', '%' . $searchTerm . '%') 
        ->orWhere('color', 'like', '%' . $searchTerm . '%')
        ->orWhere('size', 'like', '%' . $searchTerm . '%')
        ->orWhere('material', 'like', '%' . $searchTerm . '%')
        ->orWhere('price', 'like', '%' . $searchTerm . '%')
        ->get(); 

        if(count($products)==0){
         return $this->successResponse(['products'=>$products,'message'=>'products are not found']);
        }else{
            $p= ProductResource::collection($products);
         return $this->successResponse(['products'=>$p,'message'=>null]);
        }






    }

}














    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

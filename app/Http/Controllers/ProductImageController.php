<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index(Product $product)
    {


        $imagescount = count($product->load('images')->images);
       $img = [];
       if($imagescount>0){
        $images =  $product->load('images')->images;
        foreach ($images as $image) {
            array_push($img,base64($image->image_path));
       }
       }else{
        array_push($img,'');
       }
        return response()->json(['img'=>$img,'product'=>$product], 200);
    }

    public function store(Request $request, Product $product)
    {
        $imagesCount =  count($request->all());
        if ($product->images()->exists()) {
            $product->images()->delete();
        }
        if ($imagesCount>0) {
            $images =  $request->all();
            foreach ($images as $image) {
                $imageCount =  count(explode(';', $image));
                if ($imageCount > 1) {
                    $productImage  = new ProductImage();
                    $filePath =   fileupload($image, "uploaded/category/image/");
                    $productImage ->image_path = $filePath;
                    $product->images()->save($productImage );
                }
            }
        }

        return response()->json($product->load('images'), 201);
    }

    public function destroy(Product $product, ProductImage $image)
    {
        $image->delete();
        return response()->json(null, 204);
    }
}

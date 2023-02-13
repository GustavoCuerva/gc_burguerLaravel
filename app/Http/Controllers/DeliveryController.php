<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function cart(){

         $id_user = auth()->user()->id;
         $products = Saved::where('user_id', $id_user)
         ->join('products', 'products.id', '=', 'saveds.product_id');

        $testeCat = $products;

        $products = $products->get();

        /* Getting all the categories that the user has saved. */
        $categories = $testeCat->groupBy('category_id')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->orderBy('category_id')->get();

        return view('delivery.cart', ['categories' => $categories, 'products' => $products]);
    }

    public function buy(){

        $id_user = auth()->user()->id;
        $products = Saved::where('user_id', $id_user)
        ->join('products', 'products.id', '=', 'saveds.product_id');

       $testeCat = $products;

       $products = $products->get();

       /* Getting all the categories that the user has saved. */
       $categories = $testeCat->groupBy('category_id')
                   ->join('categories', 'categories.id', '=', 'products.category_id')
                   ->orderBy('category_id')->get();

       return view('delivery.buy', ['categories' => $categories, 'products' => $products]);
   }
}

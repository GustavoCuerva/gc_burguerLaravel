<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function list(){
        return view('products.menu');
    }

    public function show($id){
        return view('products.show');
    }

    // Favoritos
    public function favorites_list(){
        return view('products.favorites');
    }
}

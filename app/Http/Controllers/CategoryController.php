<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){

        $categories = Category::all();
        return view('category.create', ['categories' => $categories]);
    }

    public function store(Request $request){

        $category = new Category;
        
        $category_ver = Category::where('category', $request->category);

        if ($category_ver->count() > 0) {
            return redirect('/dashboard/category')->with('msg', 'Categoria já existe')->with('class', 'danger');
        }

        // Upload da imagem
        if($request->hasFile('img') && $request->file('img')->isValid()){

            $requestImage = $request->img;

            $extension = $requestImage->extension();

            if ($extension != 'webp' && $extension != 'jpg' && $extension != 'png') {
                return redirect('/dashboard/category')->with('msg', 'Não são perminitos arquivos do tipo .'.$extension.', envie apenas imagens ')->with('class', 'danger');;
            }

            $imgName = $request->category."_".md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/category'), $imgName);

        }

        $category->category = $request->category;

        $category->path_image = '/img/category/'.$imgName;
        $category->save();

        return redirect('/dashboard/category')->with('msg', 'Categoria criada com sucesso')->with('class', 'success');;
    }
}

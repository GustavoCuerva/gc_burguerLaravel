<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Saved;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class ProductController extends Controller
{
    public function index(){

        /* Inicio dos favoritos
        $favoritos = Saved::groupBy('product_id')
                    ->join('contacts', 'users.id', '=', 'contacts.user_id')
                    ->orderBy(count('product_id'), 'desc');*/
        return view('welcome');
    }

    // Menu de lanches
    public function list($id){
        $cats = Category::all();
        if ($id != 'tudo') {
            $categories = Category::where('id', $id)->get();
            $products = Product::where('category_id', $id)->get();
        }else{
            $categories = Category::all();
            $products = Product::all();
        }

        return view('products.menu', ['cats' => $cats, 'categories' => $categories, 'products' => $products, 'id' => $id]);
    }

    public function show($id){
        return view('products.show');
    }

    // Favoritos
    public function favorites_list(){
        return view('products.favorites');
    }

    public function listProducts($id){

        $categories = Category::all();
        
        if ($id != 'tudo') {
            $products = Product::where('category_id', $id)->get();   
        }else{
            $products = Product::all();
        }

        return view('products.listAdmin', ['categories' => $categories, 'products' => $products, 'id' => $id]);
    }

    public function create($id){

        $categories = Category::all();

        return view('products.create', ['id' => $id, 'categories' => $categories]);
    }

    public function store(Request $resquest){

        // Verificando se já existe
        $product_ver = Product::where('name', $resquest->name);

        if ($product_ver->count() > 0) {
            // Já existe produto com o mesmo nome
            return back()->with('msg', 'Produdo com mesmo nome já foi cadastrado')->with('class', 'danger');
        }

        // Upload da imagem
        if ($resquest->hasFile('image') && $resquest->file('image')->isValid()) {
            
            $image    = $resquest->image;
            $extension = $image->extension();
            
            if ($extension != 'webp' && $extension != 'jpg' && $extension != 'png') {
                return back()->with('msg', 'Extensão '.$extension.' inválida, envie apenas imagens')->with('class', 'danger');
            }

            $imgName = $resquest->name."_".md5($image->getClientOriginalName() . strtotime('now')).".".$extension;

            $image->move(public_path('img/products/'), $imgName);

            $path_image = "/img/products/".$imgName;

        }else{
            return back()->with('msg', 'Envie uma imagem')->with('class', 'danger');
        }
        
        $products = new Product;

        $products->name        = $resquest->name;
        $products->description = $resquest->description;
        $products->value       = $resquest->value;
        $products->path_image  = $path_image;
        $products->category_id = $resquest->category;
        
        $products->save();

        return redirect('dashboard/products/'.$resquest->category)->with('msg', 'Produto cadastrado com sucesso')->with('class', 'success');
    }

    public function edit($id){

        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.create', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request){

        $product_ver = Product::where('name', $request->name)->where('id', '!=', $request->id);

        if ($product_ver->count()>0) {
            return back()->with('msg', 'Produto com mesmo nome já existe')->with('class', 'danger');
        }

        $product = Product::findOrFail($request->id);

        $path_image = $product->path_image;

        // Alteração da imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Houve o envio de imagem

            $image = $request->image;
            $extension = $image->extension();

            if ($extension != 'webp' && $extension != 'jpg' && $extension != 'png') {
                // Extensão incorreta
                return back()->with('msg', 'Extensão '.$extension.' inválida, envie apenas imagens')->with('class', 'danger');
            }

            $imgName = $request->name.'_'.md5($image->getClientOriginalName() . strtotime('now')).".".$extension;

            $image->move(public_path('img/products/'), $imgName);

            // Excluindo arquivo anterior
            if(file_exists(public_path($path_image))){
                unlink(public_path($path_image));
            }

            $path_image = "/img/products/".$imgName;
        }

        $update = Product::findOrFail($request->id)
        ->update([
            'name'        => $request->name,
            'description' => $request->description,
            'value'       => $request->value,
            'path_image'  => $path_image,
            'category_id' => $request->category
        ]);

        return redirect('dashboard/products/'.$request->category)->with('msg', 'Produto editado com sucesso')->with('class', 'success');

    }

    public function destroy(Request $request){

        $id = $request->id;

        $product = Product::findOrFail($id);

        $path_image = $product->path_image;

        // Excluindo arquivo de imagem
        if(file_exists(public_path($path_image))){
            unlink(public_path($path_image));
        }

        Product::findOrFail($id)->delete();

        return redirect('dashboard/products/tudo')->with('msg', 'Produto excluido com sucesso')->with('class', 'secondary');
    }
}

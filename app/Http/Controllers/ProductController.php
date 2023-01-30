<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Category;
use App\Models\Information;
use App\Models\Product;
use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Catch_;

class ProductController extends Controller
{
    public function index(){

        $products = Product::limit(4)->get();

        //  favoritos
        $favoritos = Saved::groupBy('product_id')
                    ->join('products', 'products.id', '=', 'saveds.product_id')
                    ->selectRaw('*,count(saveds.product_id) AS `count`')
                    ->orderBy('count', 'desc')
                    ->limit(4)
                    ->get();

        // Melhores preços
        $baratos = Product::orderBy('value')->limit(4)->get();

        // Informações
        $info = Information::findOrFail(1);

        // News
        $news = Product::orderBy('created_at')->limit(2)->get();

        // Avaliações
        $assessments = Assessment::join('users', 'users.id', '=', 'assessments.user_id')->get();
        if (Auth::check()) {
            $my_assessment = Assessment::where('user_id', auth()->user()->id)->limit(1)->get();
        }else{
            $my_assessment = Assessment::where('user_id', null)->limit(1)->get();;
        }
        

        return view('welcome', [
            'favoritos'     => $favoritos, 
            'products'      => $products,
            'baratos'       => $baratos,
            'info'          => $info,
            'news'          => $news,
            'assessments'   => $assessments,
            'my_assessment' => $my_assessment,
        ]);
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

    // Produto individual
    public function show($id){

        $product = Product::findOrFail($id);
        $suggestions = Product::where('category_id', $product->category_id)
                        ->where('id', '!=', $id)
                        ->limit(4)->get();

        $saved = Saved::where('product_id', $id)->where('user_id', auth()->user()->id)->get();
        $count = $saved->count();

        return view('products.show', ['product' => $product, 'suggestions' => $suggestions, 'count' => $count]);
    }

    // Salvando produto
    public function saved(Request $request){
        $saved = Saved::where('product_id', $request->id)->where('user_id', auth()->user()->id);
        $count = $saved->count();
        
        if ($count == 0) {
            // Adicionar
            $save = new Saved;

            $save->product_id = $request->id;
            $save->user_id = auth()->user()->id;

            $save->save();

            return back()->with('msg', 'Produto adicionado aos favoritos')->with('class', 'success');
        }else if ($count > 0) {

            $saved->delete();
            return back()->with('msg', 'Produto removido dos favoritos')->with('class', 'secondary');
        }
        return back();
    }

    // Favoritos
    public function favorites_list($id){

        $cats = Category::all();
        $id_user =  auth()->user()->id;

        if ($id != 'tudo') {
            $categories = Category::where('id', $id)->get();
            $products = Saved::where('user_id', $id_user)
                        ->join('products', 'products.id', '=', 'saveds.product_id')
                        ->where('products.category_id', $id)
                        ->get();
        }else{
            $categories = Category::all();
            $products = Saved::where('user_id', $id_user)
                        ->join('products', 'products.id', '=', 'saveds.product_id')->get();
        }

        return view('products.favorites', ['products' => $products, 'categories' => $categories, 'cats' => $cats, 'id' => $id]);
    }

    // Menu Admin
    public function listProducts($id){
        
        if (auth()->user()->permission != 1) {
            // Usuario
            return redirect('/');
        }

        $categories = Category::all();
        
        if ($id != 'tudo') {
            $products = Product::where('category_id', $id)->get();   
        }else{
            $products = Product::all();
        }

        return view('products.listAdmin', ['categories' => $categories, 'products' => $products, 'id' => $id]);
    }

    // Formulario de criacao do produto
    public function create($id){
        
        if (auth()->user()->permission != 1) {
            // Usuario
            return redirect('/');
        }

        $categories = Category::all();

        return view('products.create', ['id' => $id, 'categories' => $categories]);
    }

    // Salvar o produto no banco
    public function store(Request $resquest){

        if (auth()->user()->permission != 1) {
            // Usuario
            return redirect('/');
        }

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

    // Edição do produto
    public function edit($id){

        if (auth()->user()->permission != 1) {
            // Usuario
            return redirect('/');
        }

        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.create', ['product' => $product, 'categories' => $categories]);
    }

    // Update para o banco
    public function update(Request $request){

        if (auth()->user()->permission != 1) {
            // Usuario
            return redirect('/');
        }

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

    // Excluir produto
    public function destroy(Request $request){

        if (auth()->user()->permission != 1) {
            // Usuario
            return redirect('/');
        }

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

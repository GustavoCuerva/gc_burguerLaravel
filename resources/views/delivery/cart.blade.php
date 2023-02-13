@extends('layouts.main')

@section('title', 'Carrinho')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/carrinho.css')}}">
@endsection

@section('content')

<div class="accordion" id="accordioncategoryExample">
<div style="min-height: 70vh;" class="container">
  <h2 style="text-align: center; font-size: 30px; color: #787878; font-weight: 900; margin: 30px 0">MEU CARRINHO</h2>

  <div class="box">
    {{-- Listagem dos produtos --}}
    <div class="list-products-cart">
        @forelse ($categories as $category)
        <div class="accordion" id="acordionCategory">
            <div class="accordion-item" style="margin:20px; border:none;">
              <h2 class="accordion-header" id="panelsStay{{$loop->index}}-heading{{$loop->index}}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#category-collapse{{$loop->index}}" aria-expanded="true" aria-controls="category-collapse{{$loop->index}}">
                  <h2>{{$category->category}}</h2>
                </button>
              </h2>
              <div id="category-collapse{{$loop->index}}" class="accordion-collapse collapse show" aria-labelledby="category-heading{{$loop->index}}">
                <div class="accordion-body">
          
                  @foreach ($products as $product)
                    @if ($product->category_id == $category->id)
                      <div class="product-cart">
                        <input type="checkbox" name="check-{{$product->id}}" class="check-product" checked>
                        <img src="{{asset($product->path_image)}}" style="margin-right: 5%;">
                        <a href="{{route('product', ['id' => $product->id])}}" class="link-product-cart item-product-cart"><h3>{{$product->name}}</h3></a>
                        <p class="item-product-cart" style="text-align: center;">R$ {{$product->value}}</p>
                        <input type="number" name="quant{{$loop->index}}" class="quantidade">
                        <div class="item-product-cart group-btn">
                          <a style="margin:0;"><i class="bi bi-trash3" style="color:red"></i></a>
                        </div>
                      </div>
                    @endif
                @endforeach

                </div>
              </div>
            </div>
          </div>
        @empty
            <div style="margin: 10px 50px; text-align: center; display: flex; height: 50vh; flex-direction: column; justify-content: center;">
                <div class="alert alert-secondary container" role="alert" style="font-size: 20px;">
                    Seu carrinho está vazio
                </div>
            </div>
        @endforelse
    </div>

    {{-- Card para prosseguir --}}
    <div class="card" style="height: min-content; min-width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Total: R$ 56,99</h5>
        <h6 class="card-subtitle mb-2 text-muted">Sem o frete</h6>
        <form action="" style="display:flex; margin: 1\5px 0; margin-bottom:10px;">
          <input type="text" placeholder="CEP" name="cep" class="form-control" id="cep">
          <input type="submit" value="Ok" class="btn btn-outline-primary">
        </form>
        <a href="{{route('buy')}}" class="btn btn-primary">Finalizar a compra</a>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <script src="{{ asset('/js/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.min.js') }}"></script>

    <script>
        var w = document.querySelector(".list-products-cart").clientWidth;
        console.log(w);
        $('#cep').mask('00000-000')
    </script>
@endsection
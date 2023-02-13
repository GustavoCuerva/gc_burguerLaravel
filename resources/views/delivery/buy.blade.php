@extends('layouts.main')

@section('title', 'Dados do Pedido')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/carrinho.css')}}">
@endsection

@section('content')
<div class="container" style="min-height: 70vh">

    <div class="info-buy">
        <div class="images">
            <img src="{{asset('/img/products/Abacaxi_32ecc892a765367b80c447b79b9c9802.jpg')}}" style="">
            <img src="{{asset('/img/products/Bacon_d3493ecd9f27db34ff3899e6fef11db2.jpg')}}" style="margin-left: 10px; margin-top: 5px;">
            <img src="{{asset('/img/products/Cerveja_df97a8576d32b85ac15e96c031c74d1b.jpg')}}" style="margin-left: 20px; margin-top: 10px;">
            <img src="{{asset('/img/products/Choop_cdbeffdd26daaa0fa7ed179a85c8fccc.jpg')}}"style="margin-left: 30px; margin-top: 15px;">
        </div>

        <div class="info-details" style="flex:4;">
            <ul>
                <li>2x Buguer</li>
                <li>2x Buguer</li>
                <li>2x Buguer</li>
                <li>2x Buguer</li>
                <li>2x Buguer</li>
                <li>2x Buguer</li>
            </ul>
        </div>

        <div class="value" style="flex: 1;">
            <p class="price">R$ 58,90</p>
            <p class="price-products"><strong>Produtos:</strong> R$ 50,00</p>
            <p class="price-frete"><strong>Frete:</strong> R$ 8,90</p>
            <p class="price-frete"><strong>Entrega:</strong> 30 min</p>
        </div>
    </div>

    <br>
    <form action="" method="post" class="form-compra">

        {{-- Form dados pessoais --}}
        <div class="bloco-form data-form">
            <h2>Seus dados</h2>
            <div class="d-flex">
                <div class="col-md6">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" name="name" id="name" placeholder="Nome" class="form-control" value="{{auth()->user()->name}}">
                </div>
                
                <div class="col-md6">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control">
                </div>
            </div>
        </div>

        {{-- Form do endereço --}}
        <div class="bloco-form address-form">
            <h2>Seu endereço</h2>
            <div class="d-flex">
                <div class="col-md6" style="flex:10;">
                    <label for="address" class="form-label">Rua:</label>
                    <input type="text" name="address" id="address" placeholder="Rua" class="form-control">
                </div>
                <div class="col-md6">
                    <label for="number" class="form-label">Numero:</label>
                    <input type="text" name="number" id="number" class="form-control">
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md6">
                    <label for="neighborhood" class="form-label">Bairro:</label>
                    <input type="text" name="neighborhood" id="neighborhood" placeholder="Bairro" class="form-control">
                </div>
                <div class="col-md6">
                    <label for="city" class="form-label">Cidade:</label>
                    <input type="text" name="city" id="city" placeholder="Cidade" class="form-control">
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md6">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" name="cep" id="cep" placeholder="CEP" class="form-control" onchange="consultaEndereco(this.value)">
                </div>
                <div></div>
            </div>
        </div>

        {{-- Pagamento --}}
        <div class="bloco-form address-form">
            <label>Forma de Pagamento</label>
            <div class="d-flex">
                <div class="col-md6">
                    <select name="pag" id="pag" class="form-select">
                        <option value="pix">Pix</option>
                    </select>
                </div>
            </div>
        </div>

        
        <div class="d-flex">
            <div style="flex: 1;">
                <a href="{{route('cart')}}" class="btn btn-danger">Cancelar</a>
            </div>
            <div class="col-md6"  style="flex: 1;">
                <input type="submit" value="Finalizar pedido" class="btn btn-primary form-control finalizarPedido">
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <script src="{{ asset('/js/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.min.js') }}"></script>

    <script>
        $('#cep').mask('00000-000')
        $('#cpf').mask('000.000.000-00')

        // Consulta do cep
        function consultaEndereco(cep) {
            cep = cep.replace("-", "")
            
            if (cep.length == 8) {
                let url = `https://viacep.com.br/ws/${cep}/json/`

                fetch(url).then(function(response){
                    response.json().then(function(data){
                        if (data.erro) {
                            alert("CEP inválido") 
                            
                            $('#address').val('')
                            $('#neighborhood').val('')
                            $('#city').val('')

                            document.getElementById('address').disabled = false;
                            document.getElementById('neighborhood').disabled = false;
                            document.getElementById('city').disabled = false;
                        }else{
                            $('#address').val(data.logradouro)
                            $('#neighborhood').val(data.bairro)
                            $('#city').val(data.localidade)
                            document.getElementById('address').disabled = true;
                            document.getElementById('neighborhood').disabled = true;
                            document.getElementById('city').disabled = true;
                        }
                    })
                })
            }else{
                alert('Cep inválido')

                document.getElementById('address').disabled = false;
                document.getElementById('neighborhood').disabled = false;
                document.getElementById('city').disabled = false;
            }
        }

    </script>
@endsection
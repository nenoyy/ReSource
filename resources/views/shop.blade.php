@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Магазин') }}</div>
                <div class ="cards">
                    @foreach($products as $product)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name_bonus }}</h5>
                                <p>Цена - {{$product->price}}</p>
                                <a href="{{ route('pay', ['id' =>$product->id_bonus]) }}" class="btn btn-primary">Купить бонус</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

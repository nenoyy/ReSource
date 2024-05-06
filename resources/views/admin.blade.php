@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Админ панель') }}</div>

                <h2>Категории</h2>

                <form action="{{ route('addCategory') }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="name_category" class="form-label">Название категории</label>
                        <input type="text" class="form-control" id="name_category" name="name_category" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
                <h2  class="card-title">Кадровый учет</h2></div>
                <a class="nav-link" href="{{ route('admin2') }}">{{ __('Кадровый учет') }}</a>


            </div>
                    <H2>Заказы</H2>
                    <div class="col-12">

                @foreach($orders as $order)
                    <div class="card">

                        <form action="{{ route('admins') }}" method="POST" class="row g-3">
                            @csrf
                        <div class="card-body">
                            <h5 class="card-title">{{ $order->address }} </h5>
                            <p class="card-text">{{ $order->date }}  {{ $order->time }} </p>
                            <p class="card-text">вес товара - {{ $order->weight }} </p>
                            <p class="card-text">адрес доставки - {{ $order->address }} </p>
                            <input type="hidden" name="id_order"  value="{{$order->id_order}}">
                            <input type="hidden" name="id_user"  value="{{$order->id_user}}">
                            <input type="hidden" name="weight"  value="{{$order->weight}}">
                            <input type="hidden" name="id_category"  value="{{$order->id_category}}">
                            <div class="col-md-4">
                                <label for="id_driver" class="form-label">Выберите водителя</label>
                                <select id="id_driver" class="form-select" name="id_driver" required>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id_worker }}">{{ $driver->surname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Одобрить заказ</button>

                        </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

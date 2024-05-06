@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <h2>Выберите материал</h2>
        <hr>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($categories as $category)
                <div class="scale">
                    <div class="col">
                        <div class="card h-100">
                            <a class="card-block stretched-link text-decoration-none link-dark" href="{{route('map',['id_category'=>$category->id_category])}}">
                                <img src="{{$category->picture}}" class="card-img-top" alt="material" height="260px">
                                <div class="card-body">
                                    <h5 class="card-title">{{$category->name_category}}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection

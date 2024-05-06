@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Админ панель') }}</div>


                <h2  class="card-title">Кадровый учет</h2></div>
            <div>
            @foreach($workers as $worker2)
                <div>
                    <h5 class="card-title"> {{ $worker2->surname }} {{ $worker2->name }} {{ $worker2->patronymic }} - {{ $worker2->name_role }}</h5>
                </div>
            @endforeach


            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <h2>Оформление заявки</h2>
        <hr>
        <div class="form">
            <div id="map" style="width: 700px; height: 700px;"></div>
            <div style="width: 500px;background-color: white; border-radius: 30px; padding: 20px;">
                <form method="POST" action="{{ route('address') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Адрес:</label>
                        <textarea class="form-control" id="demo" rows="2" name="demo" style="resize: none; font-size: 23px;"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Примерный вес:</label>
                        <input type="number" class="form-control" id="weight" name="weight" style="font-size: 23px;">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Дата:</label>
                        <input type="date" class="form-control" id="date" name="date" style="font-size: 23px;">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Время:</label>
                        <input type="time" class="form-control" id="time" name="time" style="font-size: 23px;">
                    </div>

                    <input type="hidden" class="form-control" id="id_category" name="id_category"  value="{{$id_category}}">

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Оформить') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>


    </div>
</div>

@endsection

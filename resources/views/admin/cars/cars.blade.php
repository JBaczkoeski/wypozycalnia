@extends('layout.admin')
@section('content')
    @include('includes.admin_cars_sidebar')
    <div class="container col-10 mt-3">
        <div class="row">
            @foreach($cars as $car)
                <div class="container col-3 row border border-3 rounded py-3 m-3 shadow-lg">
                    <div class="container">
                        <img class="img-fluid rounded shadow-lg" src="{{ asset('/images/cars/Audi7.jpg') }}"
                             alt="car">
                    </div>
                    <div class="container text-center h5 my-3">
                        {{$car['brand_name']}} {{$car['model']}}
                    </div>
                    <div class="container row">
                        <div class="container col-12 d-flex justify-content-start">
                            <div class="container col-3">
                                <i class="fa-solid fa-road fa-lg"></i>
                            </div>
                            <div class="container col-12">
                                <p class="h6">{{$car['power']}} KM</p>
                            </div>
                        </div>
                        <div class="container col-12 d-flex justify-content-end">
                            <div class="container col-3">
                                <i class="fa-solid fa-gas-pump fa-lg" style="color: #000000;"></i>
                            </div>
                            <div class="container col-9">
                                <p class="h6">{{$car['fuel']}}</p>
                            </div>
                        </div>
                        <div class="container col-12 d-flex justify-content-center">
                            <div class="container col-3">
                                <i class="fa-solid fa-car fa-lg"></i>
                            </div>
                            <div class="container col-9">
                                <p class="h6">{{$car['transmission']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container row mt-3">
                        <div class="container col-7 ms-1">
                            <p class="h5 text-danger">{{$car['price_per_day']}} zł/dzień</p>
                        </div>
                        <div class="container col-12">
                            <a class="btn btn-warning">Edytuj</a>
                            <a class="btn btn-danger">Usuń</a>
                            @if ($car['availability'] == 1)
                                <a href="/admin/samochody/zawies/{{$car['id']}}" class="btn btn-info">Zawieś</a>
                            @else
                                <a href="/admin/samochody/zawies/{{$car['id']}}" class="btn btn-info">Wznów</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach()
        </div>
    </div>
@endsection

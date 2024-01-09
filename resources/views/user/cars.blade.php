@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container col-2">
                <div class="row">
                    <div class="container h3 text-center mt-4">
                        Filtry
                    </div>
                    <div class="container text-center mt-4">
                        <form method="get" action="{{ route('cars.filtr') }}">
                            @csrf
                            <div class="form-group">
                                <select class="form-control" name="brand">
                                    <option disabled selected>Marka samochodu</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand['id']}}">{{$brand['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <select class="form-control" name="transmission">
                                    <option disabled selected>Skrzynia biegów</option>
                                    <option value="automatyczna">Automatyczna</option>
                                    <option value="manualna">Manualna</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <select class="form-control" name="type">
                                    <option disabled selected>Rodzaj samochodów</option>
                                    <option value="SUV">SUV</option>
                                    <option value="sedan">Sedan</option>
                                    <option value="sportowy">Sportowy</option>
                                    <option value="dostawczy">Dostawczy</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <select class="form-control" name="fuel">
                                    <option disabled selected>Rodzaj paliwa</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="benzyna">Benzyna</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <h5>Cena</h5>
                                <input type="number" name="price_min" class="form-control" placeholder="Min">
                                <input type="number" name="price_max" class="form-control mt-2" placeholder="Max">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success">Filtruj</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container col-10 mt-3">
                <div class="row">
                    @foreach($cars as $car)

                        <div class="container col-3 row border border-3 rounded py-3 m-3 shadow-lg">
                            <div class="container">
                                <img class="img-fluid rounded shadow-lg" src="{{ Storage::url($car['img']) }}"
                                     alt="car">
                            </div>
                            <div class="container text-center h5 my-3">
                                    {{$car['brand_name']}} {{$car['model']}}
                            </div>
                            <div class="container row">
                                <div class="container col-12 d-flex justify-content-start">
                                    <div class="container col-3">
                                        <i class="fa-solid fa-bolt fa-lg" style="color: #000000;"></i>
                                    </div>
                                    <div class="container col-12">
                                        <p class="h6">{{$car['power']}}KM</p>
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
                                <div class="container col-3">
                                    <a href="/samochod/{{$car['id']}}" class="btn btn-success" style="margin-left: -25px">Wynajmij</a>
                                </div>
                            </div>
                        </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
@endsection

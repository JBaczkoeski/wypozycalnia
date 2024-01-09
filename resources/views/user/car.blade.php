@extends('layout.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="container col-6 d-flex justify-content-center">
            <img class="img w-75 rounded-4 rounded" alt="zdjęcie samochodu" src="{{ Storage::url($car['img']) }}">
        </div>
        <div class="container col-6">
            <div class="row">
                <div class="container col-12 h3 fw-bold">
                    {{$brand['name']}} {{$car['model']}}
                </div>
                <div class="container col-12 mb-5 h5">
                    Dostępność: @if($car['availability'] === 1) Dostępny @else Niedostępny @endif
                </div>
                <div class="container col-6 mb-3">
                    <i class="fa-solid fa-bolt fa-2xl" style="color: #000000;"></i> {{$car['power']}} KM
                </div>
                <div class="container col-6 mb-3">
                    <i class="fa-solid fa-gas-pump fa-2xl" style="color: #000000;"></i> {{$car['fuel']}}
                </div>
                <div class="container col-6 mb-3">
                    <i class="fa-solid fa-car fa-2xl"></i> {{$car['transmission']}}
                </div>
                <div class="container col-6 mb-3">
                    <i class="fa-solid fa-chalkboard fa-2xl" style="color: #000000;"></i> {{$car['registration_number']}}
                </div>
                <div class="container col-6 mb-5 h2 text-danger mt-5">
                    Cena: {{$car['price_per_day']}} Zł /Dzień
                </div>
                <div class="container col-6 mb-5 h2 text-danger mt-5">
                    @if($car['availability'] === 1)
                    <button class="btn btn-success btn-lg">Zarezerwuj</button>
                    @else
                        Samochód niedostępny
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

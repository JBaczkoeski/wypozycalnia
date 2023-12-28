@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container col-2">
                FILTRY
            </div>
            <div class="container col-10 mt-3">
                <div class="row">
                    @for($i = 0; $i <= 5; $i++)

                        <div class="container col-3 row border border-3 rounded py-3 m-3 shadow-lg">
                            <div class="container">
                                <img class="img-fluid rounded shadow-lg" src="{{ asset('/images/cars/Audi7.jpg') }}"
                                     alt="car">
                            </div>
                            <div class="container text-center h5 my-3">
                                Audi RS 7
                            </div>
                            <div class="container row">
                                <div class="container col-12 d-flex justify-content-start">
                                    <div class="container col-3">
                                        <i class="fa-solid fa-road fa-lg"></i>
                                    </div>
                                    <div class="container col-12">
                                        <p class="h6">259 KM</p>
                                    </div>
                                </div>
                                <div class="container col-12 d-flex justify-content-end">
                                    <div class="container col-3">
                                        <i class="fa-solid fa-gas-pump fa-lg" style="color: #000000;"></i>
                                    </div>
                                    <div class="container col-9">
                                        <p class="h6">Diesel</p>
                                    </div>
                                </div>
                                <div class="container col-12 d-flex justify-content-center">
                                    <div class="container col-3">
                                        <i class="fa-solid fa-car fa-lg"></i>
                                    </div>
                                    <div class="container col-9">
                                        <p class="h6">Automatyczna</p>
                                    </div>
                                </div>
                            </div>
                            <div class="container row mt-3">
                                <div class="container col-7 ms-1">
                                    <p class="h5 text-danger">899 zł/dzień</p>
                                </div>
                                <div class="container col-3">
                                    <button class="btn btn-success" style="margin-left: -25px">Wynajmij</button>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
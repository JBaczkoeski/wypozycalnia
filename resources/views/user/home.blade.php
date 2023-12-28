@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container col-7 text-center">
                <img class="img-fluid rounded rounded-pill shadow-lg" src="{{ asset('/images/banner-image.webp') }}" alt="banner">
            </div>
            <div class="container col-5 pt-5 pe-5">
                <p class="h3">Najlepszy wybór samochodów w najniższych cenach</p>
                <p class="h5 mt-5">
                    Oferujemy największy wybór doskonale utrzymanych samochodów, spełniających różnorodne potrzeby
                    podróżujących. U nas znajdziesz idealne rozwiązanie dla każdej podróży - od ekonomicznych aut po
                    luksusowe modele - wszystko to w najbardziej konkurencyjnych cenach. Podróżuj komfortowo i
                    oszczędnie z naszą wypożyczalnią samochodów
                </p>
            </div>
        </div>
    </div>
@endsection

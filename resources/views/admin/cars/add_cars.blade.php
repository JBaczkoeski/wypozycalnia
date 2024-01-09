@extends('layout.admin')
@section('content')
    @include('includes.admin_cars_sidebar')
    <div class="container col-6 border border-3 mt-5 p-3">
        <div class="row">
            <form method="post" action=" {{route('admin.car.store.brand')}}" class="row d-flex justify-content-center" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h2 class="text-center">Dodaj samochód</h2>
                </div>
                <div class="form-group col-5 mt-5">
                    <select name="brand_id" class="form-control">
                        <option selected disabled>Marka</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->first('brand'))
                        <p class="text-danger">{{ $errors->first('brand') }}</p>
                    @endif
                    <input name="model" type="text" class="form-control mt-3" placeholder="Model">
                    @if($errors->first('model'))
                        <p class="text-danger">{{ $errors->first('model') }}</p>
                    @endif
                    <input name="img" type="file" class="form-control mt-3">
                    @if($errors->first('img'))
                        <p class="text-danger">{{ $errors->first('img') }}</p>
                    @endif
                    <input name="year" type="date" class="form-control mt-3" placeholder="Data">
                    <label class="form-label" for="date">Data produkcji</label>
                    @if($errors->first('year'))
                        <p class="text-danger">{{ $errors->first('year') }}</p>
                    @endif
                    <input name="registration_number" type="text" class="form-control mt-3" placeholder="Rejestracja">
                    @if($errors->first('registration_number'))
                        <p class="text-danger">{{ $errors->first('registration_number') }}</p>
                    @endif
                    <input name="price_per_day" type="number" class="form-control mt-3" placeholder="Cena za dzień">
                    @if($errors->first('price_per_day'))
                        <p class="text-danger">{{ $errors->first('price_per_day') }}</p>
                    @endif
                    <input name="power" type="number" class="form-control mt-3" placeholder="Moc">
                @if($errors->first('power'))
                        <p class="text-danger">{{ $errors->first('power') }}</p>
                    @endif
                    <select name="type" class="form-control mt-3">
                        <option selected disabled>Typ</option>
                        <option value="SUV">Suv</option>
                        <option value="sedan">Sedan</option>
                        <option value="sportowy">Sportowy</option>
                        <option value="dostawczy">Dostawczy</option>
                    </select>
                    <select name="fuel" class="form-control mt-3">
                        <option selected disabled>Paliwo</option>
                        <option value="diesel">Diesel</option>
                        <option value="benzyna">Benzyna</option>
                    </select>
                    <select name="transmission" class="form-control mt-3">
                        <option selected disabled>Skrzynia biegów</option>
                        <option value="manualna">Manualna</option>
                        <option value="automatyczna">Automatyczna</option>
                    </select>
                </div>
                <div class="form-group text-center mt-3">
                    <button class="btn btn-primary btn-lg" type="submit">Dodaj</button>
                </div>
            </form>
        </div>
    </div>
@endsection

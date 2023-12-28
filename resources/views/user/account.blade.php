@extends('layout.app')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="container col-8 border border-3 rounded rounded-pill p-4 shadow mt-5">
                <form action="{{ route('account.update') }}" method="post" class="row d-flex justify-content-center mt-3">
                    @csrf
                    <div class="container text-center mt-3 mb-4">
                        <p class="h3">Dane urzytkownika</p>
                    </div>
                    <div class="form-group col-5 mb-2">
                        <input name="first_name" type="text" class="form-control" id="first_name" value="{{$user->first_name}}">
                        <label class="form-label" for="first_name">Imię</label>
                        @if($errors->first('first_name'))
                            <p class="text-danger">{{ $errors->first('first_name') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-5 mb-2">
                        <input name="second_name" type="text" class="form-control" id="second_name" value="{{$user->second_name}}">
                        <label class="form-label" for="second_name">Nazwisko</label>
                        @if($errors->first('second_name'))
                            <p class="text-danger">{{ $errors->first('second_name') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-5 mb-2 mt-3">
                        <input name="address" type="text" class="form-control" id="address" value="{{$user->address ?? 'Proszę uzupełnić'}}">
                        <label class="form-label" for="address">Adres</label>
                        @if($errors->first('address'))
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-5 mb-2 mt-3">
                        <input name="phone_number" type="text" class="form-control" id="phone_number" value="{{$user->phone_number ?? 'Proszę uzupełnić'}}">
                        <label class="form-label" for="phone_number">Numer telefonu</label>
                        @if($errors->first('phone_number'))
                            <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-5 mb-2 mt-3">
                        <input name="email" type="text" class="form-control" id="email" value="{{$user->email}}">
                        <label class="form-label" for="email">Email</label>
                        @if($errors->first('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-12 mb-2 text-center">
                        <button type="submit" class="btn btn-success">Zmień Dane</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

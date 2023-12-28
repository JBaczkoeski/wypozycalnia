@extends('layout.app')
@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="text-black border-0 rounded rounded-0">
                <div class="p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Zarejestruj się</p>
                            <form action="{{ route('register') }}" method="post" class="mx-1 mx-md-4">
                                @csrf
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="first_name" type="text" id="first_name" class="form-control" value="{{ old('first_name') }}"/>
                                        <label class="form-label" for="first_name">Imię</label>
                                        @if($errors->first('first_name'))
                                            <p class="text-danger">{{ $errors->first('first_name') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="second_name" type="text" id="second_name" class="form-control" value="{{ old('second_name') }}"/>
                                        <label class="form-label" for="second_name">Nazwisko</label>
                                        @if($errors->first('second_name'))
                                            <p class="text-danger">{{ $errors->first('second_name') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="email" type="email" id="email" class="form-control" value="{{ old('email') }}"/>
                                        <label class="form-label" for="email">E-mail</label>
                                        @if($errors->first('email'))
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="password" type="password" id="password" class="form-control" value="{{ old('password') }}"/>
                                        <label class="form-label" for="password">Hasło</label>
                                        @if($errors->first('password'))
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"/>
                                        <label class="form-label" for="password_confirmation">Powtórz hasło</label>
                                    </div>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input name="terms" class="form-check-input me-2" type="checkbox"
                                           id="terms"/>
                                    <label class="form-check-label" for="terms">
                                        Akceptuję <a href="#!">regulamin</a>&nbsp;
                                    </label>
                                    <label>
                                        @if($errors->first('password'))
                                            <p class="text-danger">{{ $errors->first('terms') }}</p>
                                        @endif
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Rejestracja</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img class="img-fluid rounded rounded-pill" src="{{ asset('/images/register-image.webp') }}" alt="register image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

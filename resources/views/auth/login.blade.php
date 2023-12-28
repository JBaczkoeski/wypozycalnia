@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container col-6 login-wrap rounded rounded-pill">
            </div>
            <div class="container col-5">
                <form action="{{ route('login') }}" method="get" class="text-center col-10 mt-5 pt-5 ms-5">
                    <div class="form-group mb-5 mt-5">
                       <h3>Logowanie</h3>
                    </div>
                    <div class="form-group mb-3">
                        @if(!empty($warning))
                            <p class="h5 text-danger mb-4">{{$warning}}</p>
                        @endif
                        <input name="email" type="text" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Hasło">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Zaloguj się
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

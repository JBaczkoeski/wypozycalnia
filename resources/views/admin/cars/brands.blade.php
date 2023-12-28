@extends('layout.admin')
@section('content')
    @include('includes.admin_cars_sidebar')
    <div class="container text-center">
        <div class="row">
            <div class="container col-6 mt-5 p-3 border border-2 shadow">
                <ul class="list-group list-group-flush">
                    @foreach($brands as $brand)
                        <li class="list-group-item">{{$brand}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="container col-6 mt-5 p-3">
                <div class="row">
                    <form method="post" action="{{ route('admin.store.brand') }}" class="container col-6">
                        @csrf
                        <input name="name" type="text" class="form-control" placeholder="Nazwa marki">
                        <button type="submit" class="btn btn-success mt-3">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

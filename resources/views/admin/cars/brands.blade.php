@extends('layout.admin')
@section('content')
    @include('includes.admin_cars_sidebar')
    <div class="container text-center">
        <div class="row">
            <div class="container col-6 mt-5 p-3 border border-2 shadow">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    @foreach($brands as $brand)
                        <tbody>
                        <tr>
                            <th>{{$brand->name}}</th>
                            <td>
                                <form method="post" action="{{route('admin.delete.brand', ['id' => $brand->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">
                                        <i class="fa-regular fa-trash-can fa-2xl" style="color: #920707;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="container col-6 mt-5 p-3">
                <div class="row">
                    <form method="post" action="{{ route('admin.store.brand') }}" class="container col-6 mt-5">
                        @csrf
                        <div class="ms-5 p-3 shadow">
                            <h2 class="mb-3">Dodaj nazwę</h2>
                            <input name="name" type="text" class="form-control" placeholder="Nazwa marki">
                            <button type="submit" class="btn btn-success mt-3 btn-lg">Dodaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

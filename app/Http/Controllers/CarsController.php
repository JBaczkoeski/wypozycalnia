<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::select('id', 'brand_id', 'model', 'year', 'registration_number', 'img','power','price_per_day','fuel', 'transmission', 'type', 'availability', 'created_at', 'updated_at')
            ->with('brand:id,name')
            ->get()
            ->map(function ($car) {
                return [
                    'id' => $car->id,
                    'brand_name' => $car->brand ? $car->brand->name : null,
                    'model' => $car->model,
                    'year' => $car->year,
                    'registration_number' => $car->registration_number,
                    'price_per_day' => $car->price_per_day,
                    'power' => $car->power,
                    'type' => $car->type,
                    'img' => $car->img,
                    'transmission'=>$car->transmission,
                    'fuel' => $car->fuel,
                    'availability' => $car->availability,
                    'created_at' => $car->created_at,
                    'updated_at' => $car->updated_at,
                ];
            });
        $brands = Brand::all();

        $user = Auth::user();

        if ($user && $user->role == 'admin') {
            return view('admin.cars.cars', ['cars' => $cars]);
        } else {
            return view('user.cars', ['cars' => $cars,'brands' => $brands]);
        }
    }

    public function filterProducts(Request $request)
    {
        $query = Car::query();

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->input('brand'));
        }

        if ($request->filled('transmission')) {
            $query->where('transmission', $request->input('transmission'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('fuel')) {
            $query->where('fuel', $request->input('fuel'));
        }

        if ($request->filled('price_min')) {
            $query->where('price_per_day', '>=', $request->input('price_min'));
        }

        if ($request->filled('price_max')) {
            $query->where('price_per_day', '<=', $request->input('price_max'));
        }

        $cars = $query->get();

        $brands = Brand::all();

        return view('user.cars', ['cars' => $cars,'brands'=>$brands]);
    }

    public function show($id){
        $car = Car::find($id);

        $brand = Brand::find($car['brand_id']);

        return view('user.car',['car'=>$car, 'brand'=>$brand]);
    }

    public function create()
    {
        $brands = Brand::all();

        return view('admin.cars.add_cars')->with('brands', $brands);
    }

    public function brands()
    {
        $brands = Brand::all();

        return view('admin.cars.brands')->with('brands', $brands);
    }

    public function storeBrand(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|String',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/samochody/marki')
                ->withErrors($validator)
                ->withInput();
        } else {
            $brand = new Brand();
            $brand->name = $request->input('name');
            $brand->save();
            return redirect('/admin/samochody/marki')->with(200, 'Dodano poprawnie');
        }
    }

    public function carAvability($id){
        $car = Car::find($id);
        if($car){
            if($car->availability == 0) {
                $car->availability = 1;
            }else{
                $car->availability = 0;
            }
            $car->save();
        }
        return redirect()->back();
    }

    public function carDelete($id){
        $car = Car::find($id);
        if($car){
            $car->delete();
        }
        return redirect()->back();
    }

    public function deleteBrand($id)
    {
        $brand = brand::find($id);

        $brand->delete();
        return redirect('/admin/samochody/marki')->with(200, 'Usunięto poprawnie');
    }

    public function storeCar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_id' => 'required|integer',
            'model' => 'required|string',
            'registration_number' => 'required|string|max:7|min:5',
            'price_per_day' => 'required|numeric',
            'power' => 'required|numeric',
            'type' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/samochody/dodawanie')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('img')) {
                $imagePath = $request->file('img')->store('public/cars');

                $car = new Car();
                $car->brand_id = $request->input('brand_id');
                $car->model = $request->input('model');
                $car->year = $request->input('year');
                $car->img = $imagePath;
                $car->registration_number = $request->input('registration_number');
                $car->price_per_day = $request->input('price_per_day');
                $car->power = $request->input('power');
                $car->type = $request->input('type');
                $car->fuel = $request->input('fuel');
                $car->transmission = $request->input('transmission');
                $car->availability = 1;
                $car->save();

                return redirect('/admin/samochody/dodawanie')->with('success', 'Dodano poprawnie');
            }

            return redirect('/admin/samochody/dodawanie')->with('error', 'Nie udało się zapisać obrazu');
        }
    }
}

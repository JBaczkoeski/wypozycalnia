<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::select('id', 'brand_id', 'model', 'year', 'registration_number', 'power','price_per_day','fuel', 'transmission', 'type', 'availability', 'created_at', 'updated_at')
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
                    'transmission'=>$car->transmission,
                    'fuel' => $car->fuel,
                    'availability' => $car->availability,
                    'created_at' => $car->created_at,
                    'updated_at' => $car->updated_at,
                ];
            });
        $user = User::get()->only('role');

        if ($user == 'user') {
            return view('user.cars', ['cars' => $cars]);
        }else{
            return view('admin.cars.cars', ['cars' => $cars]);
        }
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

    public function deleteBrand($id)
    {
        $brand = brand::find($id);

        $brand->delete();
        return redirect('/admin/samochody/marki')->with(200, 'Usunięto poprawnie');
    }

    public function storeCar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_id' => 'integer',
            'model' => 'string',
            'registration_number' => 'string|max:7|min:5',
            'price_per_day' => 'numeric',
            'power' => 'numeric',
            'type' => 'string',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/samochody/dodawanie')
                ->withErrors($validator)
                ->withInput();
        } else {
            $car = new Car();
            $car->brand_id = $request->input('brand_id');
            $car->model = $request->input('model');
            $car->year = $request->input('year');
            $car->registration_number = $request->input('registration_number');
            $car->price_per_day = $request->input('price_per_day');
            $car->power = $request->input('power');
            $car->type = $request->input('type');
            $car->fuel = $request->input('fuel');
            $car->transmission = $request->input('transmission');
            $car->availability = 1;
            $car->save();
            return redirect('/admin/samochody/dodawanie')->with(200, 'Dodano poprawnie');
        }
    }
}

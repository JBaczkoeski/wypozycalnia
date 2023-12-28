<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function index()
    {
        return view('user.cars');
    }

    public function carsList(){
        return view('admin.cars.cars');
    }

    public function create(){
        return view('admin.cars.add_cars');
    }

    public function brands(){
        $brands = Brand::pluck('name');

        return view('admin.cars.brands')->with('brands', $brands);
    }

    public function storeBrand(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|String',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/samochody/marki')
                ->withErrors($validator)
                ->withInput();
        }else {
            $brand = new Brand();
            $brand->name = $request->input('name');
            $brand->save();
            return redirect('/admin/samochody/marki')->with(200, 'Dodano poprawnie');
        }
    }
}

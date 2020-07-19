<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
public function allcars(){
    $cars = Car::all();
    return view('allcars',['cars' => $cars]);

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function particularCar($id){
        $car=  Car::find($id);
        return view('specificcar')->with('cars', $car);

    }
    public function newCars(){


        return view('newcar');

    }
    public function store(Request $request){
        $this->validate($request,[
            'model'=>'required',
            'make'=>'required',

            'produced_on'=>'required|date_format:Y-m-d'

        ]);

        $car=new Car();
        $car->make = $request->input('make');
        $car->model = $request->input('model');

        $car->produced_on = $request->input('produced_on');

        $car->save();
        return redirect('/car')->with('success', 'New car posted!');
    }
    public function show($id)
    {

    }
}

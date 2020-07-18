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
    public function particularCar(){

    }
    public function newCars(){

    }
}

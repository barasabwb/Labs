<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Car $car){
        $this->validate(request(), ['body'=>'required|min:5']);




        $car->addComment(request('body'));
        return back();

    }
}

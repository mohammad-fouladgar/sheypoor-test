<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Motor;
use App\Search\MotorSearch\MotorSearch;

class MotorSearchController extends Controller
{
    public function index()
    {
        $motors = Motor::paginate();

        return view('lists', compact('motors'));
    }

    public function search(Request $filters)
    {
        // \DB::connection()->enableQueryLog();
        $motors = MotorSearch::filter($filters);
        // dd(\DB::getQueryLog());

        return view('lists', compact('motors'));
    }

    public function show(Request $request, Motor $motorBike)
    {
        return view('show', compact('motorBike'));
    }
}

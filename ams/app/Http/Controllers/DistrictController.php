<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    public function create()
    {
        $districts = District::all(); // assuming you have a District model
        return view('register', compact('districts'));
    }

    public function getDistricts(Request $request, $stateId)
    {
        $districts = District::where('state_id', $stateId)->get()->map(function ($districts) {
            return [
                'id' => $districts->id,
                'name' => $districts->name,
            ];
        });
        return response()->json($districts);
    }
}

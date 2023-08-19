<?php

namespace App\Http\Controllers\Auth;
use App\Models\Hospital;
use App\Models\Districts;
use App\Models\Divisions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index()
    {
        $data['divisions'] = Divisions::get(["name", "id"]);
        return view('dropdown', $data);
    }

    public function fetchDistricts(Request $request)
    {
        $data['districts'] = Districts::where("division_id", $request->division_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchHospitals(Request $request)
    {
        $data['hospitals'] = Hospital::where("district_id", $request->district_id)->get(["name", "id"]);
        return response()->json($data);
    }
}

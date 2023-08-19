<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Hospital;
use App\Models\Districts;
use App\Models\Divisions;
use App\Models\VaccineRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReqVaccineController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data['divisions'] = Divisions::get(["name", "id"]);
        return view('auth.requestVaccine', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Add validation rules for each input field
            'division_id' => 'required',
            'district_id' => 'required',
            'hospital_id'=> 'required',
            'description'=> 'required'
        ]);

        // Create the vaccine request
        $vaccineRequest = new VaccineRequest($validatedData);
        $vaccineRequest->user_id = $request->user()->id;
        $vaccineRequest->save();

        return redirect()->route('dashboard')->with('success', 'Request submitted successfully.');
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

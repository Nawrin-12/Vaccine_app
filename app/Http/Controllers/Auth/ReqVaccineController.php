<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Hospital;
use App\Models\Districts;
use App\Models\Divisions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReqVaccineController extends Controller
{
    public function index()
    {
        return view('auth.requestVaccine');
    }

    public function store(Request $request)
    {
        // dd($request->only('email','password'));
        $this->validate($request, [
            'divisions' => 'required',
            'districts' => 'required',
            'hospital'=> 'required',
        ]);

        
        




        // auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }
}

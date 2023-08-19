<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccines = Vaccine::all();
        return view('vaccines.index', compact('vaccines'));
    }

    public function create()
    {
        return view('vaccines.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'ageRangeStart' => 'required|integer',
            'ageRangeEnd' => 'required|integer',
        ]);

        Vaccine::create($validatedData);

        return redirect()->route('vaccines.index')->with('success', 'Vaccine created successfully.');
    }

    public function allVaccines()
    {
        $vaccines = Vaccine::all();
        return view('vaccines.all', compact('vaccines'));
    }

    public function show($vaccineId)
    {
        try {
            $vaccine = Vaccine::findOrFail($vaccineId);
            return view('vaccines.show', compact('vaccine'));
        } catch (ModelNotFoundException $e) {
            return view('vaccines.notfound');
        }

    }
}

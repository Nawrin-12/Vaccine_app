<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Districts;
use App\Models\Divisions;
use App\Models\Hospital;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    public function showRequestForm()
    {
        $vaccines = Vaccine::all();
        $divisions = Divisions::all();
        return view('appointment.requestForm', compact('vaccines', 'divisions'));
    }

    public function success()
    {
        return view('appointment.success');
    }

    public function getHospitals(Vaccine $vaccine, Districts $district)
    {
        $hospitals = $vaccine->hospitals()
                     ->whereHas('district', function ($query) use ($district) {
                         $query->where('id', $district->id);
                     })
                     ->select('hospitals.id', 'hospitals.name')
                     ->get();

        return response()->json(['hospitals' => $hospitals]);
    }

    public function store(Request $request)
    {
        $vaccine = Vaccine::findOrFail($request->vaccine_id);

        $validatedData = $request->validate([
            'vaccine_id' => 'required|exists:vaccines,id',
            // ... other inputs ...
            'age' => [
                'required',
                'integer',
                'numeric',
                'min:' . $vaccine->ageRangeStart,
                'max:' . $vaccine->ageRangeEnd,
            ],
        ]);

        $hospital = Hospital::findOrFail($request->hospital_id);
        $appointmentCount = $hospital->appointments()->whereDate('appointment_date', $request->appointment_date)->count();

        if ($appointmentCount >= 30) {
            return back()->with('error', 'Hospital is fully booked for this day.');
        }

        $appointment = new Appointment([
            'vaccine_id' => $request->vaccine_id,
            'user_id' => auth()->user()->id,
            'appointment_date' => $request->appointment_date,
            'hospital_id' => $request->hospital_id, 
            'age' => $request->age,
            // ... other fields ...
        ]);
        $appointment->save();

        return redirect()->route('appointment.success')->with('success', 'Appointment requested successfully.');
    }
}

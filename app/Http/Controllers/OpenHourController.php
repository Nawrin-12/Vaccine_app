<?php

namespace App\Http\Controllers;
use App\Http\Requests\OpenHoursRequest;
use App\Models\OpenHour;
use Illuminate\Http\Request;

class OpenHourController extends Controller
{
    public function index()
    {
        $openHours = OpenHour::all();
        return view('appointments.Open_hours', compact('openHours'));
    }

    public function update(OpenHoursRequest $request)
    {

        openHour::query()->upsert($request->validated()['data'],['day']);

       return back();
    }
}

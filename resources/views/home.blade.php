@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg container">
      <!-- <img src="{{ asset('images/vaccine.jpeg') }}" alt="">  -->
      <h1 style="text-align:center;margin-bottom:24px;">Welcom to Lifey</h1>
      <div class="row">
        <div class="col">
          <a href="{{ route('vaccines.all') }}" class="card-link">
            <h2>Vaccines</h2>
            <p>Click here to see list of vaccines</p>
          </a>
        </div>
        <div class="col">
          <a href="{{ route('requestvaccine.index') }}" class="card-link">
            <h2>Requst vaccine</h2>
            <p>Click here to request a vaccine</p>
          </a>
        </div>
        <div class="col">
          <a href="{{ route('appointment.request') }}" class="card-link">
            <h2>Appointment</h2>
            <p>Click here to make an appointment for a vaccine</p>
          </a>
        </div>
        <!-- Add more similar blocks for additional links -->
      </div>
    </div>
  </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="flex justify-center">
   <div class="w-8/12 bg-white p-6 rounded-lg">
      <h1 style="font-size:24px; font-weight:700;">Dashboard</h1>

      <p>User Name: <strong>{{ auth()->user()->username }}</strong></p>
      <p>User email: <strong>{{ auth()->user()->email }}</strong></p>
   </div>
</div>



@endsection
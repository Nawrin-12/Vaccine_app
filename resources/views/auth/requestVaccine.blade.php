@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
    <form>

<div class="form-group mb-3">

    <select  id="division-dropdown" class="form-control">

        <option value="">-- Select Cdivision --</option>

        @foreach ($division as $data)

        <option value="{{$data->id}}">

            {{$data->name}}

        </option>

        @endforeach

    </select>

</div>

<div class="form-group mb-3">

    <select id="district-dropdown" class="form-control">

    </select>

</div>

<div class="form-group">

    <select id="hospital-dropdown" class="form-control">

    </select>

</div>

</form>
        




       <!-- <form action="{{ route('requestVaccine') }}" method="post">
        white px-4 py-3 rounded font-medium w-full">Request</button> 
       </form>  -->
    </div>
</div>


@endsection
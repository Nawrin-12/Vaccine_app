@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h2 style="font-weight:900;">Vaccine Description</h2>

            <h3>{{ $vaccine->name }}</h3>
            <p>Description: {{ $vaccine->description }}</p>
            <p>Price: ${{ $vaccine->price }}</p>
            <p>Age Range: {{ $vaccine->ageRangeStart }} - {{ $vaccine->ageRangeEnd }}</p>

            <a href="{{ route('vaccines.all') }}"><- Back to All Vaccines</a>
        </div>
    </div>

@endsection
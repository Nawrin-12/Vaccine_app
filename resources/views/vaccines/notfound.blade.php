@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h2>Vaccine Not Found</h2>
            <p>No vaccine was found with the provided ID.</p>
            <a href="{{ route('vaccines.all') }}"><- Back to All Vaccines</a>
        </div>
    </div>
@endsection
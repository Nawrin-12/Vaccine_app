@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h2 style="font-weight:900;">List of Vaccines</h2>

            @if ($vaccines->isEmpty())
                <p>No active vaccines</p>
            @else
                <ul>
                    @foreach ($vaccines as $vaccine)
                        <li>
                            <a href="{{ route('vaccines.show', $vaccine->id) }}">{{ $vaccine->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
@endsection
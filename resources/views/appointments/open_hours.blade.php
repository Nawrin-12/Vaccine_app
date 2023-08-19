@extends('layouts')

@section('content')
<div class="container">
    <h1 class="center">
        Open Hours
    </h1>
</div>

<div class="row center"> 
<form action="{{route ('open_hours') }}" method="post">
            @csrf
            @foreach($open_hours as $openHour)
                        <div class="col s3">
                <h4>
                    {{$openHour->day}}
                </h4>
            </div>
            <input type="hidden" name="data[{{$openHour->day}}][day]" value="{{$openHour->day}}">
            <div class="input-field col s3">
                <input type="text" class="timepicker" value="{{$openHour->from}}" name="data[{{$openHour->day}}][from]" placeholder="From">
            </div>

            <div class="input-field col s2">
                <input type="text" class="timepicker" value="{{$openHour->to}}" name="data[{{$openHour->day}}][to]" placeholder="To">
            </div>
            <div class="input-field col s1">
                <input type="number" name="data[{{$openHour->day}}][step]" value="{{$openHour->step}}" placeholder="Step">
            </div>

            <div class="input-field col s3">
                <p>
                    <label>
                        <input value="true" name="data[{{$openHour->day}}][off]" class="filled-in" type="checkbox" @checked($openHour->off) />
                        <span>OFF</span>
                    </label>
                </p>
            </div>

            @endforeach



            <div class="col s12">

                <button class="waves-effect waves-light btn info darken-2" type="submit">
                    save
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems, {
            twelveHour:false
        });
    });
</script> 
@endsection
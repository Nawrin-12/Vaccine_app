@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
    <h2 style="font-weight:900;">Vaccine Appointment Request</h2>

    <form method="POST" action="{{ route('appointment.store') }}">
        @csrf

        <!-- Vaccine Dropdown -->
        <div class="form-group mb-3">
            <label for="vaccine-dropdown">Select Vaccine:</label>
            <select name="vaccine_id" id="vaccine-dropdown">
                @foreach ($vaccines as $vaccine)
                    <option value="{{ $vaccine->id }}" data-age-range-start="{{ $vaccine->ageRangeStart }}"
                        data-age-range-end="{{ $vaccine->ageRangeEnd }}">{{ $vaccine->name }}</option>
                @endforeach
            </select>
        </div>
        <div id="age-range-info" class="form-group mb-3">
            Age Range: <span id="age-range-start"></span> - <span id="age-range-end"></span> years
        </div>

        <!-- Divisions Dropdown -->
        <div class="form-group mb-3">

            <select  id="division-dropdown" class="form-control">

                <option value="">-- Select division --</option>

                @foreach ($divisions as $data)

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

        <div class="form-group mb-3">

            <select id="hospital-dropdown" name="hospital_id" class="form-control">

            </select>

        </div>

        <!-- Age Input -->
        <div class="form-group mb-3">
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>

        <!-- Appointment Date Input -->
        <div class="form-group mb-3">
            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
        </div>

        <button type="submit">Submit</button>
    </form>

    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('#vaccine-dropdown').on('change', function () {
            var selectedVaccineId = $(this).val();
            console.log(selectedVaccineId);
            $(this).data('selected-vaccine', selectedVaccineId);

            var selectedOption = $(this).find(":selected");
            var ageRangeStart = selectedOption.data("age-range-start");
            var ageRangeEnd = selectedOption.data("age-range-end");

            $("#age-range-start").text(ageRangeStart);
            $("#age-range-end").text(ageRangeEnd);
        });

        $('#division-dropdown').on('change', function () {
            var idDivision = this.value;
            $("#district-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-districts')}}",
                type: "POST",
                data: {
                    division_id: idDivision,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#district-dropdown').html('<option value="">-- Select District --</option>');
                    $.each(result.districts, function (key, value) {
                        $("#district-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#hospital-dropdown').html('<option value="">-- Select Hospital --</option>');
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#district-dropdown').on('change', function () {
            var idDistrict = this.value;
            var selectedVaccineId = $('#vaccine-dropdown').data('selected-vaccine') ?? 1;
            console.log(selectedVaccineId)
            $("#hospital-dropdown").html('');
            $.ajax({
                url: "{{ url('api/vaccine') }}/" + selectedVaccineId + "/fetch-hospitals/" + idDistrict,
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    $('#hospital-dropdown').html('<option value="">-- Select Hospital --</option>');
                    $.each(res.hospitals, function (key, value) {
                        $("#hospital-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>
@endsection
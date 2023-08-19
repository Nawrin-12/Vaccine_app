@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{ route('requestvaccine.store') }}" method="post" class="mb-4">
            @csrf
            <div class="form-group mb-3">

                <select  id="division-dropdown" name="division_id" class="form-control">

                    <option value="">-- Select division --</option>

                    @foreach ($divisions as $data)

                    <option value="{{$data->id}}">

                        {{$data->name}}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mb-3">

                <select id="district-dropdown" name="district_id" class="form-control">

                </select>

            </div>

            <div class="form-group">

                <select id="hospital-dropdown" name="hospital_id" class="form-control">

                </select>

            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" class="border border-secondary"></textarea>
            </div>

            <button type="submit" class="btn btn-success" >Submit Request</button>

        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
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
            $("#hospital-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-hospitals')}}",
                type: "POST",
                data: {
                    district_id: idDistrict,
                    _token: '{{csrf_token()}}'
                },
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
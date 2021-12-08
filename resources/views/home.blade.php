<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    @include('head')
</head>
<body>
    @include('navbar')
    <div class="container">
        <h2>Partner matches ({{count($data)??0}})</h2>
        <div class="row">
            @foreach($data as $data)
            @if($data->id!=Session::get('user')->id)
            <div class="col-sm-12">
                <div class="shadow p-4 bg-white mb-2 rounded-xl">
                    <div class="row mb-4">
                        <div class="col-sm-3">
                            <h6>Name</h6>
                            <strong>{{$data->first_name}}</strong>
                        </div>
                        <div class="col-sm-3">
                            <h6>Email</h6>
                            <strong>{{$data->email}}</strong>
                        </div>
                        <div class="col-sm-3">
                            <h6>Date or birth</h6>
                            <strong>{{$data->dob}}</strong>
                        </div>
                        <div class="col-sm-3">
                            <h6>Gender</h6>
                            <strong>{{$data->gender}}</strong>
                        </div>
                        <div class="col-sm-3">
                            <h6>Annual income</h6>
                            <strong>Rs. {{$data->annual_income}}</strong>
                        </div>
                        <div class="col-sm-3">
                            <h6>Occupation</h6>
                            <strong>{{$data->occupation}}</strong>
                        </div>
                        <div class="col-sm-3">
                            <h6>Family type</h6>
                            <strong>{{$data->family_type}}</strong>
                        </div>
                        <div class="col-sm-3">
                            <h6>Manglik</h6>
                            <strong>{{$data->manglik}}</strong>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</body>
</html>
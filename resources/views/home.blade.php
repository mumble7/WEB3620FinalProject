@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>These are the submissions</h1>
            <div class="row">
            @foreach($submissions as $submission)
                <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">{{ $submission->demo_name }} Submission</div>
                <div class="card-body">
                    {{ $submission->phone_number }} <br>
                    {{ $submission->email_address }} <br>
                    {{ \Illuminate\Support\Carbon::parse($submission->created_at)->format('D, M d Y') }} <br>
                </div>
            </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

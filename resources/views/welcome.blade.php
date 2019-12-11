@extends('layouts.app')

@section('content')
    {{-- This is my demo form --}}
    <div class="container">
        <form method="post" action="/home">
            {{--    This csrf token is required for users  - Hidden Token - https://laravel.com/docs/5.8/csrf  --}}
            @csrf
            <h1>Calldrip Demo API Form</h1>

            @if(session()->has('formSubmitted') && session('formSubmitted'))
                <div class="alert alert-success">
                    Success!
                </div>
            @endif

            <div class="form-group">
                <label for="demo_name">Demo Name</label>
                <input value="{{ old("demo_name") }}" name="demo_name" type="text"
                       class="form-control {{ $errors->has("demo_name") ? "is-invalid":"" }}" id="demo_name"
                       aria-describedby="fname"
                       placeholder="Enter your First Name">
                @if($errors->has("demo_name"))
                    <span class="invalid-feedback">{{ $errors->first("demo_name") }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="demo_email">Email address</label>
                <input value="{{ old("demo_email") }}" name="email_address" type="email" class="form-control {{ $errors->has("email_address") ? "is-invalid":"" }}"
                       id="demoEmailAddress" aria-describedby="email"
                       placeholder="Enter your email">
                @if($errors->has("email_address"))
                    <span class="invalid-feedback">{{ $errors->first("email_address") }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input value="{{ old("phone_number") }}" name="phone_number" type="text" class="form-control {{ $errors->has("phone_number") ? "is-invalid":"" }}"
                       id="phone_number" placeholder="Phone Number">
                @if($errors->has("phone_number"))
                    <span class="invalid-feedback">{{ $errors->first("phone_number") }}</span>
                @endif
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

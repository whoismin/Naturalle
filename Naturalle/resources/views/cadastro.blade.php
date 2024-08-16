<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home - Naturalle')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
@endsection

@section('content')
@if ($errors->any())
    <div class="message">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
        @endforeach
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
@endif

@if (session('success'))
    <div class="message success">
        <span>{{ session('success') }}</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
@endif

<section class="form-container">
    <form action="{{ url('/register') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <h3>Register</h3>
        <input type="text" name="name" class="box" placeholder="Enter your name" value="{{ old('name') }}" required>
        <input type="email" name="email" class="box" placeholder="Enter your email" value="{{ old('email') }}" required>
        <input type="password" name="password" class="box" placeholder="Enter your password" required>
        <input type="password" name="password_confirmation" class="box" placeholder="Confirm your password" required>
        <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png">
        <input type="submit" value="Register" class="btn">
        <p>Already have an account? <a href="{{ url('login') }}">Login</a></p>
    </form>
</section>

 @endsection

@extends('layouts.form')

@section('content')
    <form action="/auth/login" class="form" method="POST">
        @csrf
        <h1 class="company-text">
            <a href="/">Learn <span>Laravel</span></a>
        </h1>
        <label for="email" class="inputfield @error('email') invalid @enderror">
            <input type="email" placeholder="Email" name="email" id="email" autocomplete="off" autofocus>
            <span class="error-message">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
            <div class="icon-list">
                <span class="error-icon material-symbols-outlined">error</span>
            </div>
        </label>
        <label for="password" class="inputfield @error('password') invalid @enderror">
            <input type="password" placeholder="Password" name="password" id="password" autocomplete="off">
            <span class="error-message">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            <div class="icon-list">
                <span class="error-icon material-symbols-outlined">error</span>
            </div>
        </label>
        <a href="/auth/forgetpassword" class="hyperlink forgot">Forget Password?</a>
        <button type="submit" class="btn btn-fill default">
            Login
            <span class="material-symbols-outlined">
                arrow_forward
            </span>
        </button>
        <p class="foot">Don't have an account? <a href="/auth/register" class="hyperlink">Register</a></p>
    </form>
@endsection
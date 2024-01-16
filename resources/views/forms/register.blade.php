@extends('layouts.form')

@section('content')
    <form action="/auth/register" class="form register" method="POST">
        @csrf
        <h1 class="company-text">
            <a href="/">Learn <span>Laravel</span></a>
        </h1>

        <label for="full-name" class="inputfield @error('name') invalid @enderror">
            <input type="text" placeholder="Full Name" name="name" value="{{ old('name') }}" id="full-name" autocomplete="off" required autofocus>
            <span class="error-message">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <div class="icon-list">
                <span class="error-icon material-symbols-outlined">error</span>
            </div>
        </label>

        <label for="username" class="inputfield @error('username') invalid @enderror">
            <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" id="username" autocomplete="off" required>
            <span class="error-message">
                @error('username')
                    {{ $message }}
                @enderror
            </span>
            <div class="icon-list">
                <span class="error-icon material-symbols-outlined">error</span>
            </div>
        </label>

        <label for="email" class="inputfield @error('email') invalid @enderror">
            <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" id="email" autocomplete="off" required>
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
            <input type="password" placeholder="Password" name="password" id="password" autocomplete="off" required>
            <span class="error-message">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            <div class="icon-list">
                <span class="error-icon material-symbols-outlined">error</span>
            </div>
        </label>

        <label for="password-confirmation" class="inputfield @error('password_confirmation') invalid @enderror">
            <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password-confirmation" autocomplete="off" required>
            <span class="error-message">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </span>
            <div class="icon-list">
                <span class="error-icon material-symbols-outlined">error</span>
            </div>
        </label>

        <button type="submit" class="btn btn-fill default">
            Register
            <span class="material-symbols-outlined">
                arrow_forward
            </span>
        </button>
        <p class="foot">Have an account? <a href="/auth/login" class="hyperlink">Login</a></p>
    </form>
@endsection
@extends('dashboard.layouts.main')

@section('container')
    <div class="header-content">
        <h1>Welcome back, {{ Auth::user()->name }}</h1>
    </div>
@endsection
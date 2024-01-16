@extends('layouts.main')

@section('content')
    <h1 class="title-page">Post Categories</h1>
    <ul class="categories">
        @foreach ($categories as $category)
            <li>
                <a href="/blog?category={{ $category->slug }}">
                    <img src="/img/maik-jonietz-_yMciiStJyY-unsplash.jpg" alt="{{ $category->name }}">
                    <h2>{{ $category->name }}</h2>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
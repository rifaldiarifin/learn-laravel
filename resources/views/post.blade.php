@extends('layouts.main')

@section('content')
    @if ($post)
        <div class="post">
            @if ($post->image)
                <div class="post-image">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="front-img">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="bg-img">
                </div>
            @else    
                <div class="post-image">
                    <img src="/img/maik-jonietz-_yMciiStJyY-unsplash.jpg" alt="{{ $post->title }}" class="front-img">
                    <img src="/img/maik-jonietz-_yMciiStJyY-unsplash.jpg" alt="{{ $post->title }}" class="bg-img">
                </div>
            @endif
            <h1>{{ $post->title }}</h1>
            <h5><a class="hyperlink" href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
            <h6>by: <a class="hyperlink" href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a></h6>
            <div class="body">{!! $post->body !!}</div>
            <a href="/blog" class="btn btn-back"><span><</span>Back</a>
        </div>
    @else
        Can't find your post looking for...
    @endif
@endsection
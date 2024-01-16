@extends('dashboard.layouts.main')

@section('container')
    {{-- <div class="header-content"> --}}
        {{-- <h1>My Posts</h1> --}}
    {{-- </div> --}}
    <div class="body-content">
        <div class="post pad-b-30">
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
            <div class="body">{!! $post->body !!}</div>
            <div class="dsp-flex align-itms-center gap-10 mrgn-t-30">
                <a href="/dashboard/posts" class="btn btn-fill info" style="--h-btn: 36px">
                    <span class="material-symbols-outlined">arrow_back</span>Back to my posts
                </a>
                /
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-fill warning" style="--h-btn: 36px">
                    <span class="material-symbols-outlined">edit</span>Edit
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-fill danger" onclick="return confirm('Are you sure?')" style="--h-btn: 36px">
                        <span class="material-symbols-outlined">delete</span>Remove
                    </button>
                </form>
            </div>
            {{-- <a href="/blog" class="btn btn-back"><span><</span>Back</a> --}}
        </div>
    </div>
@endsection
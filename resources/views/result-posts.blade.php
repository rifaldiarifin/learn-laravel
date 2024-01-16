@extends('layouts.main')

@section('content')
    <h1 class="title-page">{{ $title_page }}</h1>
    <form action="/blog" class="search-bar">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <label class="search-group">
            <input type="search" placeholder="Search something..." value="{{ request('search') }}" name="search" id="search">
            <button class="btn btn-fill default" type="submit">></button>
        </label>
    </form>
    <span class="result-text">Result: {{ count($posts) }}</span>
    @if ($posts)
        <div class="articles">
            @foreach ($posts as $post)
                <article>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="front-img">
                    @else
                        <img src="/img/maik-jonietz-_yMciiStJyY-unsplash.jpg" alt={{ $post->title }}>
                    @endif
                    <div class="content-article">
                        <h2>{{ $post->title }}</h2>
                        <h5><a class="hyperlink" href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a></h5>
                        {{-- <h6><a class="hyperlink" href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></h6> --}}
                        <div>
                            <h6><a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></h6>
                            <span class="created-at">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        {!! Str::limit(strip_tags($post->body), 180, '...') !!}
                        <a href="/blog/{{ $post->slug }}" class="btn btn-fill default">Read More</a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        Nothing posts available yet...
    @endif

    {{ $posts->onEachSide(3)->links() }}
@endsection
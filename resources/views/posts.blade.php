@extends('layouts.main')

@section('content')
<h1 class="title-page">{{ $title_page }}</h1>
<form action="/blog" class="search-bar">
    <label for="search" class="search-group">
        <input type="search" placeholder="Search something..." value="{{ request('search') }}" name="search" id="search">
        <button class="btn btn-fill default" type="submit">></button>
    </label>
    </form>
    @if ($posts)
        <div class="new-posts-group">
            @for ($i = 0; $i < count($posts); $i++)
                @if ($i <= 2)
                <div class="post-article">
                    @if ($posts[$i]->image)
                        <img src="{{ asset('storage/' . $posts[$i]->image) }}" alt="{{ $posts[$i]->title }}" class="front-img">
                    @else
                        <img src="/img/maik-jonietz-_yMciiStJyY-unsplash.jpg" alt={{ $posts[$i]->title }}>
                    @endif
                    <div class="content-article">
                        <h2>{{ $posts[$i]->title }}</h2>
                        <h5><a class="hyperlink" href="/blog?author={{ $posts[$i]->author->username }}">{{ $posts[$i]->author->name }}</a></h5>
                        <div class="category-label">
                            <h6><a class="hyperlink" href="/blog?category={{ $posts[$i]->category->slug }}">{{ $posts[$i]->category->name }}</a></h6>
                        </div>
                        @if ($i === 0)
                        <p>{!! Str::limit(strip_tags($posts[$i]->body), 550, '...') !!}</p>
                        @else 
                        <p>{!! Str::limit(strip_tags($posts[$i]->body), 100, '...') !!}</p>
                        @endif
                        <a href="/blog/{{ $posts[$i]->slug }}" class="btn btn-fill default">Read More</a>
                    </div>
                </div> 
                @endif
            @endfor
        </div>
        <div class="articles">
            @foreach ($posts->skip(3) as $post)
                <article>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="front-img">
                    @else
                        <img src="/img/maik-jonietz-_yMciiStJyY-unsplash.jpg" alt={{ $post->title }}>
                    @endif
                    <div class="content-article">
                        <h2>{{ $post->title }}</h2>
                        <h5><a class="hyperlink" href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a></h5>
                        <div>
                            <h6><a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></h6>
                            <span class="created-at">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <p>{!! Str::limit(strip_tags($post->body), 180, '...') !!}</p>
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
@extends('dashboard.layouts.main')

@section('container')
    <div class="header-content">
        <h1>My Posts</h1>
    </div>
    <div class="body-content">
        <a href="/dashboard/posts/create" class="btn btn-fill default mrgn-y-10">
            Create new post
        </a>
        @if (count($posts) > 0)
        <div class="table" style="width: 100%">
            <table>
                <thead>
                    <tr>
                        <th style="width: 20px">#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="t-row">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td style="display: flex; align-items: center; gap: 8px">
                                <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-fill icon transparent" style="--h-btn: 36px">
                                    <span class="material-symbols-outlined">visibility</span>
                                </a>
                                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-fill icon transparent" style="--h-btn: 36px">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-fill icon transparent" onclick="return confirm('Are you sure?')" style="--h-btn: 36px">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p class="disabled-text-1">You haven't posted anything yet.</p>
        @endif
    </div>
@endsection
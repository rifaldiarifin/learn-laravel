@extends('dashboard.layouts.main')

@section('container')
    <div class="header-content">
        <h1>Post Categories</h1>
    </div>
    <div class="body-content">
        <a href="/dashboard/categories/create" class="btn btn-fill default mrgn-y-10">
            Create new category
        </a>
        @if (count($categories) > 0)
        <div class="table" style="width: 100%">
            <table>
                <thead>
                    <tr>
                        <th style="width: 20px">#</th>
                        <th>Category Name</th>
                        <th style="width: 100px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="t-row">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td style="display: flex; align-items: center; gap: 8px">
                                <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-fill icon transparent" style="--h-btn: 36px">
                                    <span class="material-symbols-outlined">visibility</span>
                                </a>
                                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-fill icon transparent" style="--h-btn: 36px">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <form action="/dashboard/categories/{{ $category->slug }}" method="post">
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
            <p class="disabled-text-1">You haven't category anything yet.</p>
        @endif
    </div>
@endsection
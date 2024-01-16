@extends('dashboard.layouts.main')

@section('linkscript')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection

@section('container')
    <div class="header-content">
        <h1>Edit Post, {{ $post->title }}</h1>
    </div>
    <div class="body-content">
        <form action="/dashboard/posts/{{ $post->slug_uuid . '-' . $post->slug }}" method="post" class="form pad-b-30" enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="slug_uuid" value="{{ $post->slug_uuid }}">
            <label for="title" class="inputfield @error('title') invalid @enderror">
                <input type="text" placeholder="Title" name="title" id="title" autocomplete="off" value="{{ old('title', $post->title) }}">
                <span class="error-message">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
                <div class="icon-list">
                    <span class="error-icon material-symbols-outlined">error</span>
                </div>
            </label>
            <label for="slug" class="inputfield @error('slug') invalid @enderror">
                <input type="text" placeholder="Slug" name="slug" id="slug" autocomplete="off" readonly value="{{ old('slug', $post->slug) }}">
                <span class="error-message">
                    @error('slug')
                        {{ $message }}
                    @enderror
                </span>
                <div class="icon-list">
                    <span class="error-icon material-symbols-outlined">error</span>
                </div>
            </label>
            <div class="combobox">
                <label for="category">Category</label>
                <select name="category_id" id="category">
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" id="previewImage" class="active">
            @else
            <img src="#" alt="empty" id="previewImage">
            @endif
            <div class="inputfile @error('image') invalid @enderror">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
                <span class="error-message">
                    @error('image')
                        {{ $message }}
                    @enderror
                </span>
                <div class="icon-list">
                    <span class="error-icon material-symbols-outlined">error</span>
                </div>
            </div>
            <div class="texteditor @error('body') invalid @enderror">
                <label for="body">Body</label>
                <span class="error-message">
                    @error('body')
                        {{ $message }}
                    @enderror
                </span>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-fill default">Save New Post</button>
        </form>
    </div>
    @endsection
    
@section('script')
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>
    <script>
        document.addEventListener('trix-file-accept', function(event) {
            event.preventDefault();
        });

        const image = document.getElementById('image');
        function previewImage() {
            const prvImage = document.getElementById('previewImage');
            
            const read = new FileReader();
            read.readAsDataURL(image.files[0]);
            
            read.onload = function(event) {
                prvImage.src = event.target.result;
                prvImage.classList.add('active');
            }
        }
        image.addEventListener('change', previewImage) 
    </script>
    <script src="/js/slugForm.js"></script>
@endsection
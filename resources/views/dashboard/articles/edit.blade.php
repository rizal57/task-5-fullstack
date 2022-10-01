@extends('layouts.app-dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Article</h1>
</div>
<div class="mb-3">
    <a href="{{ route('dashboard.article.index') }}" class="btn btn-primary">Back</a>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('dashboard.article.update', $article) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('title')
                    is-invalid
                @enderror" id="title" name="title" placeholder="Title" value="{{ old('title', $article->title) }}">
                <label for="title">Title</label>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="category_id" name="category_id" aria-label="Floating label select example">
                    <option selected>Choose Category</option>
                    @foreach ($categories as $category)
                    @if (old('category_id', $article->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
                <label for="category_id">Category</label>
            </div>

            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="image">
            </div>

            <div class="form-floating mb-3">
                <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
                <trix-editor input="content"></trix-editor>
                @error('content')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

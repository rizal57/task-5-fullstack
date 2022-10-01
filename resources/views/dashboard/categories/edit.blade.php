@extends('layouts.app-dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
</div>
<div class="mb-3">
    <a href="{{ route('dashboard.category.index') }}" class="btn btn-primary">Back</a>
</div>

<div class="row">
    <div class="col-md-8">
        @if (session()->has('filed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Filed!!!</strong> {{ session('filed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('dashboard.category.update', $category) }}" method="post">
            @csrf
            @method('put')
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name')
                    is-invalid
                @enderror" id="name" name="name" placeholder="name" value="{{ old('name', $category->name) }}">
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
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

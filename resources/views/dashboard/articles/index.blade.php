@extends('layouts.app-dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Article</h1>
</div>
<div>
    <a href="{{ route('dashboard.article.create') }}" class="btn btn-primary mb-3">Add Article</a>
</div>
<div class="row">
    <div class="col">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!!!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Excerpt</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($articles as $article)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $article->title }}</td>
          <td>{!! $article->excerpt !!}</td>
          <td>
            <div class="d-flex gap-1">
                <a href="{{ route('dashboard.article.edit', $article) }}" class="btn btn-info">Edit</a>
                <form action="{{ route('dashboard.article.destroy', $article) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure...?')">Delete</button>
                </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-md-6">
            <div class="card mb-3">
                <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" class="card-img-top" alt="{{ $article->slug }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{!! $article->excerpt !!}</p>
                    <p class="card-text"><small class="text-muted">{{ $article->created_at->diffForHumans() }}</small></p>
                    <div class="text-end">
                        <a href="{{ route('article.show', $article) }}" class="card-link text-decoration-none">Read more...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

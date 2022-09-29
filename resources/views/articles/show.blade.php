@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="back mb-2 d-flex">
                    <a class="text-decoration-none text-dark" href="{{ route('article.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                        </svg>
                    </a>
                </div>
                <div class="card mb-3">
                    <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{!! $article->content !!}</p>
                        <p class="card-text"><small class="text-muted">{{ $article->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

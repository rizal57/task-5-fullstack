@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach ($articles as $article)
                        <div class="carousel-item {{ $articles->first() ? 'active' : '' }}" data-bs-interval="10000">
                        <img src="https://source.unsplash.com/1200x400" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h4 class="bg-dark p-2 rounded bg-opacity-50"><strong>{{ $article->title }}</strong></h4>
                            <p class="bg-dark bg-opacity-50 p-2 rounded">{!! $article->excerpt !!}</p>
                        </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        @foreach ($articlecontents as $article)
            <div class="col-md-6">
                <div class="card mb-3">
                    <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{!! $article->excerpt !!}</p>
                    <p class="card-text"><small class="text-muted">{{ $article->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

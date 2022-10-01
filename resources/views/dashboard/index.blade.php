@extends('layouts.app-dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">Article</div>
            <div class="card-body">
                <h5 class="card-title">{{ count($articles) }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <h5 class="card-title">{{ count($categories) }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection

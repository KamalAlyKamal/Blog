@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-3">
                <div class="card border-info mb-3 mb-3">
                    <h5 class="card-header text-center">
                        PUBLISHED POSTS
                    </h5>
                    <div class="card-body text-info">
                        <h1 class="text-center">{{$posts_count}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card border-danger mb-3">
                    <h5 class="card-header text-center">
                        TRASHED POSTS
                    </h5>
                    <div class="card-body text-danger">
                        <h1 class="text-center">{{$trashed_count}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card border-success mb-3">
                    <h5 class="card-header text-center">
                        USERS
                    </h5>
                    <div class="card-body text-success">
                        <h1 class="text-center">{{$users_count}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card border-primary mb-3">
                    <h5 class="card-header text-center">
                        CATEGORIES
                    </h5>
                    <div class="card-body text-primary">
                        <h1 class="text-center">{{$categories_count}}</h1>
                    </div>
                </div>
            </div>
        </div>
@endsection

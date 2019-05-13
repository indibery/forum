@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="page-header">
                <h1>
                    {{ $profileUser->name }}
                    <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
                </h1>
            </div>

            @foreach ($threads as $thread)
            <div class="card mb-2">
                <div class="card-body">
                    <article>
                        <div class="level">
                            <h4 class="flex">
                                <a href="{{ $thread->path() }}">
                                    {{ $thread->title }}
                                </a>
                            </h4>
                            <span>{{ $thread->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="body">{{ $thread->body }}</div>
                    </article>
                </div>
            </div>
            @endforeach
            {{ $threads->links() }}
        </div>
    </div>
</div>

@endsection

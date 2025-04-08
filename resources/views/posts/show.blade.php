@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between mb-4">
                <h2>Post Details</h2>
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $post->title }}</h3>
            <div class="text-muted mb-3">
                <small>Created: {{ $post->created_at->format('M d, Y') }}</small>
                @if($post->created_at != $post->updated_at)
                    <small> | Updated: {{ $post->updated_at->format('M d, Y') }}</small>
                @endif
            </div>
            <div class="card-text">
                {{ $post->body }}
            </div>
            <div class="mt-4">
                <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
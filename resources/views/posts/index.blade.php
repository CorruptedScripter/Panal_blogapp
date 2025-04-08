@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>Post List</h2>
        </div>
    </div>

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card my-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ Str::limit($post->body, 150) }}</p>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Created: {{ $post->created_at->format('M d, Y') }}</small>
                        <div>
                            <a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">View</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center my-4">
            {{ $posts->links() }}
        </div>
    @else
        <div class="alert alert-info my-4">
            No posts found. <a href="{{ route('posts.create') }}">Create a new post</a>.
        </div>
    @endif
@endsection
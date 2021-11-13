@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Added {{ $post->created_at->diffForHumans() }}</p>

    @if (now()->diffInMinutes($post->created_ad) < 5)
        <div class="alert alert-info">New Post !</div>
    @endif
    
@endsection
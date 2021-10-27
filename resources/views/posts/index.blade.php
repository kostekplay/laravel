@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')

    {{--  @foreach ($posts as $key=>$post)
        @include('posts.partials.post')
    @endforeach  --}}

    @each('posts.partials.post', $post, 'post')

@endsection
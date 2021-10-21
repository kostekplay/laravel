@extends('layouts.app')

@section('title', $post['title'])

@section('content')

    @if ($post['is_new'])
        <div>This post is new!</div>
    @else (!$post['is_new'])
        <div>This post is old!</div>
    @endif

    @unless ($post['is_new'])
        <div>This post is old!</div>
    @endunless

    @isset($post['has_comment'])
        <div>This post has comments!</div>
    @endisset

    <h1>{{ $post['title'] }}</h1>
    
@endsection
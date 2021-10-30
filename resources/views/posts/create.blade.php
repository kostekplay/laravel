@extends('layouts.app')

@section('title','Create the post.')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf  {{-- dodajemy ten wers --}}
        <div><input type="text" name="title"></div>
        <div><textarea name="content"></textarea></div>
        <div><input type="submit" value="Create"></div>
    </form>
@endsection
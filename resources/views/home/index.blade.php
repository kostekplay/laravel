@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h1>Home Page</h1>

    @for ($i = 0; $i < 10 ; $i++ )
        <div>The current value ids {{ $i }}</div>
    @endfor

    <div>
        @php $done = false @endphp
        @while (!$done)
            <div>I'm not done</div>
            @php
                if (random_int(0,1)===1) $done = true
            @endphp
        @endwhile
    </div>

@endsection
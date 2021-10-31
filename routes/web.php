<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostsController::class)
->only(['index','show','create','store','edit','update']);

$posts = [
    1 => [
        'title'         => 'Intro Laravel',
        'content'       => 'Content Laravel',
        'is_new'        => true,
        'has_comment'   => true
    ],
    2 => [
        'title'     => 'Intro PHP',
        'content'   => 'Content PHP',
        'is_new'    => false
    ],
    3 => [
        'title'         => 'Intro Unity',
        'content'       => 'Content Unity',
        'is_new'        => true,
        'has_comment'   => true
    ]
];   

Route::prefix('/fun')->name('fun.')->group(function() use($posts){
    Route::get('responses', function() use($posts){
        return response($posts, 201)
        ->header('Content-Type','application/json')
        ->cookie('MY_COOKIE', 'Jacek Kostowski', 3600);
    })->name('response');

    Route::get('redirect', function(){
        return redirect(('/contact'));
    })->name('redirect');

    Route::get('back', function(){
        return back(); // powraca do ostatniej strony
    })->name('back');

    Route::get('named-route', function(){
        return redirect()->route('posts.show', ['id'=> 1]);
    });

    Route::get('away', function(){
        return redirect()->away('https://www.google.pl');
    })->name('away');

    Route::get('json', function() use($posts){
        return response()->json($posts);
    })->name('json');

    Route::get('download', function() use($posts){
        return response()->download(public_path('/foto_jacek.jpg'), 'jacek.jpg');
    })->name('download');
});
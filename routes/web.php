<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home.index');
//     // return '<h1>Welcome</h1>'; // zwracam do widoku czysty html
// })->name('home.index'); // php artisan route:list

// Route::get('/contact', function () {
//     // return 'contact';
//     return view('home.contact');
// })->name('home.contact'); // php artisan route:list

Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');

// Route::get('/posts/{id}', function ($id) {
//     return 'Blog post '.$id;
// })
// // ->where([
// //     'id' => '[0-9]+'
// // ]) // walidacja lokalna 
// ->name('posts.show');

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
        'title'         => 'Intro LUnity',
        'content'       => 'Content Unity',
        'is_new'        => true,
        'has_comment'   => true
    ]
];   

Route::get('/posts', function() use ($posts)
{
    return view('posts.index', ['posts' => $posts]);
});

Route::get('/posts/{id}', function($id) use ($posts)
    {   
        abort_if(!isset($posts[$id]), 404); // wywala 404 jeeli nie id poza zakresem
        return view('posts.show', ['post' => $posts[$id]]); 
    }
);

Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 7) {
    return 'Blog post from'.$daysAgo;
})->name('posts.recent.index');

Route::get('/fun/responses', function() use($posts){
    return response($posts, 201)
    ->header('Content-Type','application/json')
    ->cookie('MY_COOKIE', 'Jacek Kostowski', 3600);
});

Route::get('/fun/redirect', function(){
    return redirect(('/contact'));
});

Route::get('/fun/back', function(){
    return back(); // powraca do ostatniej strony
});

Route::get('/fun/named-route', function(){
    return redirect()->route('posts.show', ['id'=> 1]);
});

Route::get('/fun/away', function(){
    return redirect()->away('https://www.google.pl');
});

Route::get('/fun/json', function() use($posts){
    return response()->json($posts);
});

Route::get('/fun/download', function() use($posts){
    return response()->download(public_path('/foto_jacek.jpg'), 'jacek.jpg');
});
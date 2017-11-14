<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::middleware('auth:api')->group(function () {
        // Comments
        Route::resource('comments', 'CommentsController', ['only' => 'destroy']);
        Route::resource('posts.comments', 'PostCommentsController', ['only' => 'store']);

        // Posts
        Route::resource('posts', 'PostsController', ['only' => ['update', 'store', 'destroy']]);
        Route::delete('/posts/{post}/thumbnail', 'PostsThumbnailController@destroy')->name('posts.thumbnail.destroy');

        // Users
        Route::resource('users', 'UsersController', ['only' => 'update']);
    });

    // Medias
    Route::get('medias', 'MediasController@index');
    Route::post('medias', 'MediasController@store');
    Route::delete('medias/{id}', 'MediasController@destroy');

    Route::post('/authenticate', 'Auth\AuthenticateController@authenticate')->name('authenticate');

    // Comments
    Route::resource('posts.comments', 'PostCommentsController', ['only' => 'index']);
    Route::resource('users.comments', 'UserCommentsController', ['only' => 'index']);
    Route::resource('comments', 'CommentsController', ['only' => ['index', 'show']]);

    //Post's Tag
    Route::resource('posts.tags', 'PostTagController', ['only' => 'index']);

    // Posts
    Route::resource('posts', 'PostsController', ['only' => ['index', 'show']]);
    Route::resource('popular-posts', 'PopularPostController', ['only' => ['index']]);
    Route::resource('users.posts', 'UserPostsController', ['only' => 'index']);
    Route::get('latest-posts', 'PostsController@latest')->name('posts.latest');

    // Users
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);

    //Categories
    Route::resource('categories', 'CategoryController', ['only' => 'index']);
    //Tag
    Route::resource('tags', 'TagController', ['only' => 'index']);
});

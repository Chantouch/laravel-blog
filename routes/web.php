<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/verify/email/{token}', 'Auth\RegisterController@verify')->name('email-verification.check');

Route::prefix('auth')->group(function () {
    Route::get('{provider}', 'Auth\AuthController@redirectToProvider')->name('auth.provider');
    Route::get('{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->namespace('Admin')->as('admin.')->group(function () {
    Route::get('dashboard', 'ShowDashboard')->name('dashboard');
    Route::resource('posts', 'PostsController');
    Route::delete('/posts/{post}/thumbnail', 'PostsThumbnailController@destroy')->name('posts_thumbnail.destroy');
    Route::resource('users', 'UsersController', ['only' => ['index', 'edit', 'update', 'create', 'store']]);
    Route::resource('comments', 'CommentsController', ['only' => ['index', 'edit', 'update', 'destroy']]);
    Route::delete('/medias', 'MediaController@destroy')->name('medias.destroy');
    Route::resource('medias', 'MediaController', ['only' => ['index', 'store']]);
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('roles', 'RoleController', ['only' => 'index']);
});

Route::middleware(['auth', 'isVerified'])->group(function () {
    Route::prefix('settings')->group(function () {
        Route::get('account', 'UsersController@edit')->name('users.edit');
        Route::match(['put', 'patch'], 'account', 'UsersController@update')->name('users.update');

        Route::get('password', 'UserPasswordsController@edit')->name('users.password');
        Route::match(['put', 'patch'], 'password', 'UserPasswordsController@update')->name('users.password.update');

        Route::get('token', 'UserTokensController@edit')->name('users.token');
        Route::match(['put', 'patch'], 'token', 'UserTokensController@update')->name('users.token.update');
    });

    Route::resource('newsletter-subscriptions', 'NewsletterSubscriptionsController', ['only' => 'store']);
});

Route::middleware(['isVerified'])->group(function () {
    Route::get('/', 'PostsController@index')->name('home');
    Route::resource('media', 'MediaController', ['only' => 'show']);
    Route::get('/posts/feed', 'PostsFeedController@index')->name('posts.feed');
    Route::resource('posts', 'PostsController', ['only' => 'show']);
    Route::resource('users', 'UsersController', ['only' => 'show']);
    Route::resource('tags', 'TagsController', ['only' => ['show', 'index']]);
    Route::resource('categories', 'CategoriesController', ['only' => ['show', 'index']]);

    Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionsController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');

    //Sitemap
    Route::get('/sitemap.html', 'SitemapController@index')->name('sitemap.html');
    Route::get('/sitemap/posts', 'SitemapController@posts')->name('sitemap.posts');
    Route::get('/sitemap/categories', 'SitemapController@categories')->name('sitemap.categories');

    //Page*
    Route::get('/about-us', 'ContactusController@about')->name('page.about');
    Route::resource('/feedback', 'ContactusController', ['only' => ['index', 'store']]);
});
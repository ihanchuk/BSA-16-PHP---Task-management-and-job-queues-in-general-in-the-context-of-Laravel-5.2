<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get("/gitlogin","GithubAuthController@redirectToProvider");
Route::get("/auth/github/callback","GithubAuthController@handleProviderCallback");

Route::auth();
Route::get('/home', 'HomeController@index');

Route::get("/editor/revoke/{id}","EditorController@revokeBook");
Route::post("/editor/setuser/{id}","EditorController@setNewUser");

Route::resource("/users","BookUsersController");
Route::resource("/books","BooksController");


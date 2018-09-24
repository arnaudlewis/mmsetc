<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Preview route
|--------------------------------------------------------------------------
|
| Route for prismic.io preview functionality
|
*/

Route::get('/preview', function (Request $request) {
    $token = $request->input('token');
    if (!isset($token)) {
        return abort(400, 'Bad Request');
    }
    $url = $request->attributes->get('api')->previewSession($token, $request->attributes->get('linkResolver'), '/');

    setcookie(Prismic\PREVIEW_COOKIE, $token, time() + 1800, '/', null, false, false);
    return response(null, 302)->header('Location', $url);
});

/*
|--------------------------------------------------------------------------
| Index route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/post/create');
});

/*
|--------------------------------------------------------------------------
| Tutorial route
|--------------------------------------------------------------------------
*/

Route::get('/tutorial', function () {
    return view('tutorial');
});

/*
|--------------------------------------------------------------------------
| Validation Test Routes
|--------------------------------------------------------------------------
*/

Route::get('post/create', 'PostController@create');

Route::post('post', 'PostController@store');
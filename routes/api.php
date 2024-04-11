<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Title;
use App\Models\stars;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', function (Request $request) {
    $res = User::all();
    return response()->json($res);
});

Route::get('/user/{id}', function ($id) {
    $res = User::all()->find($id);
    return response()->json($res);
});

Route::post('/user_create', function (Request $request) {
    $user = new User();
    $user->login = $request->input('login');
    $user->email = $request->input('email');
    $user->password = $request->input('password');

    $user->save();

    return response()->json($user);
});

Route::delete('/user_delete/{id}', function ($id) {
    $user = new User();
    $user->find($id)->delete();

    return response()->json(User::all());
});

Route::get('/titles', function (Request $request) {
    $res = Title::all();
    return response()->json($res);
});

Route::get('/title/{id}', function ($id) {
    $res = Title::all()->find($id);
    return response()->json($res);
});

Route::get('/title_delete/{id}', function ($id) {
    $res = Title::all()->find($id)->delete();
    return response()->json($res);
});

Route::get('/star_foruser/{id}', function ($id) {
    $res = stars::all()->where('author_id',$id);
    return response()->json($res);
});

Route::get('/star_fortitle/{id}', function ($id) {
    $res = stars::all()->where('title_id',$id);
    return response()->json($res);
});

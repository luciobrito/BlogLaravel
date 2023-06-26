<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ControleUsuario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route :: get('/home', function(){
    $posts = Post::all();
    return view('home',['posts'=> $posts]);
});
Route :: post ('/registrar', [ControleUsuario::class, 'registro']);
Route :: post('/logout', [ControleUsuario::class,'logout']);
Route :: post('/login', [ControleUsuario::class,'login']);

//Rotas dos posts
Route::post('/create-post',[PostController::class,'createPost']);
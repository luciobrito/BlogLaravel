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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function(){
    $posts = [];
    if(auth()->check())
    {$posts = auth()->user()->usersCoolPosts()->latest()->get();}
    //$posts = Post::where('user_id', auth()->id())->get();
    return view('home',['posts'=> $posts]);
});
Route :: post ('/registrar', [ControleUsuario::class, 'registro']);
Route :: post('/logout', [ControleUsuario::class,'logout']);
Route :: post('/login', [ControleUsuario::class,'login']);

//Rotas dos posts
Route::post('/create-post',[PostController::class,'createPost']);
Route::get('/edit-post/{post}',[PostController::class,'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class,'actuallyUpdatePost']);
Route::delete('/delete-post/{post}',[PostController::class,'deletePost']);

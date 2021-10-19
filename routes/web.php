<?php

use Inertia\Inertia;
use App\Models\Tweet;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TweetController;

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

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $tweets = Tweet::with('user')->orderBy('id', 'desc')->get();
    return Inertia::render('Dashboard', [
        "tweets" => $tweets
    ]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->post('/create', [TweetController::class, 'create'])->name('create');
Route::middleware(['auth:sanctum', 'verified'])->get('/profil/{id}', [UserController::class, 'profil'])->name('profil-user');


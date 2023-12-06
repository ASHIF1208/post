<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/addform',[postController::class,"index"]);
Route::post('/addpost',[postController::class,"addpost"]);
Route::get('/showpost',[postController::class,"showpost"]);

Route::post('/addcommand/{id}',[postController::class,"postcommand"]);
Route::get('/findpost/{id}',[postController::class,"findpost"]);
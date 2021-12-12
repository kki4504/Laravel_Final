<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieSearch;

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
    return view('welcome');
}) -> middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/movies', [MovieController::class, 'index']) -> middleware(['auth']) -> name('movies.index');
Route::post('/movies', [MovieController::class, 'store']) -> middleware(['auth']) -> name('movies.store');
Route::get('/movies/my/{id}', [MovieController::class, 'myIndex']) -> middleware(['auth']) -> name('movies.myComment');
Route::get('/movies/{id}/edit', [MovieController::class, 'edit']) -> middleware(['auth']) -> name('movies.edit');
// Route::get('/movies/{result}', [MovieController::class, 'show']) -> name('movies.show');
// Route::get('/movies?moviesName={movieName}', [MovieSearch::class, 'search']) -> name('movie.');
Route::get('/movies/create/{id}', [MovieController::class, 'create'])-> middleware(['auth']) -> name('movies.create');
Route::patch('/movies/update/{id}', [MovieController::class, 'update']) -> middleware(['auth']) -> name('movies.update');
Route::delete('/movies/delete/{id}', [MovieController::class, 'destroy']) -> middleware(['auth']) -> name('movies.destroy');


Route::post('/search/movies', [MovieSearch::class, 'search']);
Route::get('/movies/show/{id}', [MovieSearch::class, 'idSearch']) -> name('movies.idSearch');
Route::post('/movies/popular', [MovieSearch::class, 'popular']);
Route::post('/movies/{id}/recommendations', [MovieSearch::class, 'recommend']) -> middleware(['auth']);
require __DIR__.'/auth.php';

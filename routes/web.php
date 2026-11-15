<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    FilmController,
    AuthController,
    KritikController,
};
use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboardController,
    FilmController as AdminFilmController,
    CastController as AdminCastController,
    GenreController as AdminGenreController,
    PeranController as AdminPeranController,
    KritikController as AdminKritikController,
    UserController as AdminUserController,
};

Route::get('/', [FilmController::class, 'movieHome'])->name('home');
Route::get('/movies', [FilmController::class, 'movies'])->name('movies');
Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');
Route::post('/movies/{film}/comments', [KritikController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('/movies/genre/{genre}', [FilmController::class, 'moviesByGenre'])->name('genre');

Route::get('/login', function () {
    return redirect()->route('home')->with('open_login_modal', true);
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('films', AdminFilmController::class);
    Route::resource('casts', AdminCastController::class);
    Route::resource('genres', AdminGenreController::class);
    Route::resource('perans', AdminPeranController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('kritiks', AdminKritikController::class)->except(['create', 'store', 'show']);
});

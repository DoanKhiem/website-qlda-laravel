<?php

    use App\Http\Controllers\IssueController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ProjectController;
    use App\Http\Controllers\RiskController;
    use App\Http\Controllers\WorkController;
    use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('projects', ProjectController::class);

    Route::resource('issues', IssueController::class);

    Route::resource('risks', RiskController::class);

    Route::resource('works', WorkController::class);

    Route::get('/users', [ProfileController::class, 'users'])->name('user.index');
    Route::get('/users/create', [ProfileController::class, 'create'])->name('user.create');
});

require __DIR__.'/auth.php';

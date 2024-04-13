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

    Route::get('/users', [ProfileController::class, 'users'])->name('users.index');
    Route::get('/users/create', [ProfileController::class, 'create'])->name('users.create');
    Route::post('/users/store', [ProfileController::class, 'store'])->name('users.store');

    Route::get('/users/edit/{id}', [ProfileController::class, 'editUser'])->name('users.edit');
    Route::put('/users/update/{id}', [ProfileController::class, 'updateUser'])->name('users.update');

    Route::delete('/users/destroy/{id}', [ProfileController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';

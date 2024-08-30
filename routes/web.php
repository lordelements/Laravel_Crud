<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

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
});

Route::get('index', [StudentController::class, 'Studentindex']); //to display the data 
Route::get('add-students', [StudentController::class, 'create']); //to create the data 
Route::post('add-students', [StudentController::class, 'store']); //to store the data 
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('student/{id}', [StudentController::class, 'destroy']); // deletes a user data
Route::get('view-student/{id}', [StudentController::class, 'viewinfo']); 


//User routes
// Route::get('add-user', [UserController::class, 'registeruser']);
// Route::post('add-user', [UserController::class, 'store']);
// Route::get('index', [UserController::class, 'show']);
// Route::delete('user/{id}', [UserController::class, 'destroy']); // deletes a user data


// Route::get('edit-user-data/{id}', [StudentController::class, 'edit']);
// Route::put('updateuser-data/{id}', [StudentController::class, 'update']);


require __DIR__.'/auth.php';

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

Route::get('index', [StudentController::class, 'index']); //to display the data 
Route::get('add-students', [StudentController::class, 'create']); //to create the data 
Route::post('add-students', [StudentController::class, 'store']); //to store the data 
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('student/{id}', [StudentController::class, 'destroy']); // deletes a user data
Route::get('view-student/{id}', [StudentController::class, 'viewinfo']); 


//User routes
// Route::get('add-user', [UserController::class, 'registeruser'])->name('registeruser');
// Route::post('add-user', [UserController::class, 'store']);
// Route::get('index', [UserController::class, 'show']);
// Route::delete('user/{id}', [UserController::class, 'destroy']); // deletes a user data



// CRUD ROUTES FOR USER ACCOUNTS

Route::get('login-pages', [UserController::class, 'loginuser'])->name('login');
Route::get('register-pages', [UserController::class, 'registeruser'])->name('registeruser');

Route::post('store-register', [UserController::class, 'store']);
Route::post('store-login', [UserController::class, 'loginAcc']);
Route::post('logout', [UserController::class, 'logoutUser']);

Route::get('/homepages', [UserController::class, 'homepages'])->name('homepages');

Route::get('users', [UserController::class, 'show']); //Display all user account registered
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user-index'); // deletes a user data
Route::get('/user/{id}/delete-permanent', [UserController::class, 'delete_permanent'])->name('users.delete-permanent'); // deletes a user data

// Route::get('user/{id}/delete-permanent', [UserController::class, 'deletePermanently'])->name('user.delete-permanent'); // route to delete user data permanently
Route::get('user/trash', [UserController::class, 'trash'])->name('user.trash'); // deletes a user data
Route::get('restore/{id}', [UserController::class, 'restore'])->name('user.restore'); // Restore a user data
Route::get('view-user/{id}', [UserController::class, 'viewaccount']); //view specific user account

// update/edit routes for user accounts
Route::get('edit-userdata/{id}', [UserController::class, 'edit'])->name('edit-userdata');

Route::put('updateuser-data/{id}', [UserController::class, 'update']);


require __DIR__.'/auth.php';

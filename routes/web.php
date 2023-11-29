<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
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



//Auth for Admin && IT
Route::middleware(['Is_Admin'])->group(function () {

    //Emp
    Route::get('employees', [EmployeeController::class, 'all'])->name("All_Emp");
    //Show
    Route::get('show/emp/{id}', [EmployeeController::class, 'show'])->name("Show_Emp");

    //Add
    Route::get('add/emp', [EmployeeController::class, 'add'])->name("Add_Emp");
    Route::post('emp/store', [EmployeeController::class, 'store'])->name("Store_Emp");

    //Update
    Route::get('edit/emp/{id}', [EmployeeController::class, 'edit'])->name("Edit_Emp");
    Route::put('update/emp/{id}', [EmployeeController::class, 'update'])->name("Update_Emp");

    //Delete
    Route::delete('delete/emp/{id}', [EmployeeController::class, 'delete'])->name("Delete_Emp");
    //Logout 
    Route::post('logout', [AuthController::class, 'logout'])->name("Logout");

    //Search
    Route::get('search/emp', [EmployeeController::class, 'search_emp'])->name("Search_Emp");

    //User For Admin Only 
    Route::get('users', [UserController::class, 'all'])->name('All_Users');
    Route::get('show/user/{id}', [UserController::class, 'show'])->name("Show_User");

    //Add
    Route::get('add/user', [UserController::class, 'add'])->name("Add_User");
    Route::post('user/store', [UserController::class, 'store'])->name("Store_User");

    //Update
    Route::get('edit/user/{id}', [UserController::class, 'edit'])->name("Edit_User");
    Route::put('update/user/{id}', [UserController::class, 'update'])->name("Update_User");

    //Delete
    Route::delete('delete/user/{id}', [UserController::class, 'delete'])->name("Delete_User");

    //Search
    Route::get('search/user', [UserController::class, 'search_user'])->name("Search_User");
});










//Guest
Route::middleware('guest')->group(function () {

    //Register
    Route::get('register', [AuthController::class, 'register'])->name("Register");
    Route::post('registe/store', [AuthController::class, 'store'])->name('Store_Register');

    //Login
    Route::get('/', [AuthController::class, 'login'])->name("Login");
    Route::post('login/store', [AuthController::class, 'store_login'])->name("Store_Login");
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Home;
use App\Http\Controllers\TaskManager;
use App\Models\Users;


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

Route::get('/', [Home::class, 'index'])->name('home');

Route::get('/login',[Login::class , 'index'])->name('log')->middleware('alreadyLogged');
Route::post('/loginpost',[Login::class , 'login'])->name('log.post')->middleware('alreadyLogged');
Route::get('/logout',[Login::class , 'logout'])->name('logout')->middleware('alreadyLogged');

Route::get('/registration',[Register::class , 'index'])->name('reg')->middleware('alreadyLogged');
Route::post('/registrationpost',[Register::class , 'register'])->name('reg.post')->middleware('alreadyLogged');

Route::get('/task', [TaskManager::class, 'index'])->name('task')->middleware('isLoggedIn');

Route::get('/taskcreate', [TaskManager::class, 'create'])->name('taskcreate')->middleware('isLoggedIn');
Route::post('/taskstore', [TaskManager::class, 'store'])->name('taskstore')->middleware('isLoggedIn');
Route::get('/taskedit/{id}', [TaskManager::class, 'edit'])->name('taskedit')->middleware('isLoggedIn');
Route::post('/taskupdate/{id}', [TaskManager::class, 'update'])->name('taskupdate')->middleware('isLoggedIn');

Route::get('/taskdelete/{id}', [TaskManager::class, 'destroy'])->name('taskdelete');

Route::get('/userlist', [Register::class, 'user_list'])->name('userlist');
Route::get('/useredit/{id}', [Register::class, 'user_edit'])->name('useredit');
Route::post('/userupdate/{id}', [Register::class, 'user_update'])->name('userupdate');
//Route::get('/userdelete/{id}', [Register::class, 'user_list'])->name('userdelete');

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Hash;


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



Route::get('/', [ContactController::class, 'index'])->name('contact.index');
// Route::get('/contact/teste', function () {return Hash::make('admin');})->name("contact.new");
Route::get('/contacts/new', [ContactController::class, 'new'])->name('contact.new');
Route::post('/contacts/register', [ContactController::class, 'store'])->name('contact.register');
Route::post('/contacts/update', [ContactController::class, 'update'])->name('contact.update');
Route::get('/contacts/{id}/details', [ContactController::class, 'show'])->name('contact.show');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::get('/contacts/{id}/show/delete', [ContactController::class, 'showDelete'])->name('contact.show.delete');
Route::get('/contacts/{id}/delete', [ContactController::class, 'delete'])->name('contact.delete');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');






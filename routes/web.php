<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Artisan;
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
    return redirect('/contacts');
});


//all
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
//Create
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
//Store
Route::POST('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
//Show
Route::get('/contacts/show/{id}', [ContactController::class, 'show'])->name('contacts.show');
//Edit
Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
//Update
Route::PUT('/contacts/update/{id}', [ContactController::class, 'update'])->name('contacts.update');
//Delete
Route::delete('/contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


<?php

use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/leaves/import', [LeaveController::class, 'importForm'])->name('leaves.import.form');
Route::post('/leaves/import', [LeaveController::class, 'import'])->name('leaves.import');


Route:: view('test','layout.app');

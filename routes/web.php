<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('rooms', [RoomController::class, 'index']);
Route::post('rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::post('updaterooms', [RoomController::class, 'update'])->name('rooms.update');
Route::post('deleterooms', [RoomController::class, 'delete'])->name('rooms.delete');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/output1', function () {
    return view('output1');
});

Route::get('/output2', function () {
    return view('output2');
});

Route::get('/output3', function () {
    return view('output3');
});

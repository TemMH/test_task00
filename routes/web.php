<?php

use Illuminate\Support\Facades\Route;

use App\Models\Property;
use App\Models\Icon;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    $icons = Icon::all();
    $properties = Property::all();
    return view('index', compact('properties','icons'));
    // return csrf_token(); 
});


// Property

Route::get('/property/{property}', [PropertyController::class, 'show'])->name('showProperty');

Route::post('/storeProperty', [PropertyController::class, 'store']);

// Icon

Route::post('/storeIcon', [IconController::class, 'store']);

// User

Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Comment

Route::post('/property/{id}/store', [CommentController::class, 'store'])->name('propertyComment');
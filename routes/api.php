<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckAdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//::::::::::::::::::::::::::::::::::::ADMIN::::::::::::::::::::::::::::::::::::
Route::middleware(['auth:api',CheckAdminRole::class])->get('/users',[UserController::class,'getUsers']);

//::::::::::::::::::::::::::::::::::::ANON::::::::::::::::::::::::::::::::::::
Route::post('/admin-login', [UserController::class, 'adminLogin']);
Route::post('/register', [UserController::class, 'registerUser']);

//::::::::::::::::::::::::::::::::::::USER::::::::::::::::::::::::::::::::::::

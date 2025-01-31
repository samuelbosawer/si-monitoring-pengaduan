<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login');
});




Auth::routes();



require_once 'admin.php';

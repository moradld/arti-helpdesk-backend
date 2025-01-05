<?php

use Illuminate\Support\Facades\Route;
use App\Http\Lib\SendEmail;
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
   $satus = SendEmail::SendOtp();
   echo "<pre>";
   print_r($satus);
   die();
    return view('welcome');
});

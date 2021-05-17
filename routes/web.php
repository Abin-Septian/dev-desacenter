<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;


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

Route::get('/', [MemberController::class, 'index']);
Route::get('/profil', [MemberController::class, 'profil']);
Route::get('/unit-usaha', [MemberController::class, 'unit_usaha']);
Route::get('/edukasi', [MemberController::class, 'edukasi']);
Route::get('/member', [MemberController::class, 'manage_member']);
Route::get('/assesment', [MemberController::class, 'assesment']);

Route::get('/login', [MemberController::class, 'login']);
Route::get('/register', [MemberController::class, 'register']);

Route::get('google', [AuthController::class, 'redirect']);
Route::get('google/callback', [AuthController::class, 'callback']);
Route::post('/u-register', [AuthController::class, '_register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/insert', function () {
    
    $stuRef = app('firebase.firestore')->database()->collection('Users')->Document("ba");
    $stuRef->set([
        'firstname' => 'Nanda',
        'lastname' => 'Fathurrizki',
        'phone' => 82284710743
    ]);


});
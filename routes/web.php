<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;


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
Route::get('/join-desa', [MemberController::class, 'joindesa']);
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

//RYZVIE
Route::post('/daftarUser', [AuthController::class, 'daftarUser']);
Route::post('/authLogin', [AuthController::class, 'authLogin']);
Route::get('/authRegisterWithEmail', [AuthController::class, 'authRegisterWithEmail']);
Route::post('/daftarUserByEmail', [AuthController::class, 'daftarUserByEmail']);


Route::post('/postJoinDesa', [MemberController::class, 'postJoinDesa']);
Route::get('/profil/akun', [MemberController::class, 'profilAkun']);
Route::post('/profil/update', [MemberController::class, 'updateProfil']);
Route::get('/dashboard', [MemberController::class, 'dashboard']);

//GET MASTER DATA
Route::post('/getMaster/kabupaten', [MasterController::class, 'kabupaten']);
Route::post('/getMaster/kecamatan', [MasterController::class, 'kecamatan']);
Route::post('/getMaster/desa', [MasterController::class, 'desa']);





Route::get('/insert', function () {
    
    $stuRef = app('firebase.firestore')->database()->collection('Users')->Document("ba");
    $stuRef->set([
        'firstname' => 'Nanda',
        'lastname' => 'Fathurrizki',
        'phone' => 82284710743
    ]);


});
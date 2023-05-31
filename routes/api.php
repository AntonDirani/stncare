<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register',[UserController::class,'Register'])->name('register');
Route::post('login',[UserController::class,'Login'])->name('login');



Route::group(['middleware'=>['auth:api']],function(){
    Route::post('logout',[UserController::class,'Logout'])->name('logout');
    Route::post('patient_data_entry',[PatientController::class,'patient_data_entry'])->name('patient_data_entry')->middleware('patient');
    Route::post('student_data_entry/{id}/{id2}',[StudentController::class,'student_data_entry'])->name('student_data_entry')->middleware('student');

});

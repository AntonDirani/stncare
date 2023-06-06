<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TreatmentController;
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

Route::get('sendemail',[EmailController::class,'sendEmail'])->name('sendemail');


Route::group(['middleware'=>['auth:api']],function(){
    Route::post('logout',[UserController::class,'Logout'])->name('logout');
    Route::post('student_data_entry/{id}/{id2}',[StudentController::class,'student_data_entry'])->name('student_data_entry')->middleware('student');
    
    ##########  Admin Routes  ########
    Route::post('create_question',[QuestionController::class,'Create_question'])->name('create_question')->middleware('admin');
    Route::post('create_treatment',[TreatmentController::class,'Create_Treatment'])->name('create_treatment')->middleware('admin');
    
    ########   Patient's Routes   #########
    Route::post('patient_data_entry',[PatientController::class,'patient_data_entry'])->name('patient_data_entry')->middleware('patient');
    Route::get('show_treatments',[PatientController::class,'Show_treatments'])->name('show_treatments')->middleware('patient');
    Route::post('choose_treatment',[PatientController::class,'Choose_treatment'])->name('choose_treatment')->middleware('patient');
    Route::get('skip',[PatientController::class,'Skip'])->name('skip')->middleware('patient');

    ########   Post's Routes   ########
    Route::post('add_post/{st_id}/{tr_id}',[PostController::class,'Add_post'])->name('add_post')->middleware('student');
    Route::put('edit_post/{id}',[PostController::class,'Edit_post'])->name('edit_post')->middleware('student');
    Route::delete('delete_post/{id}',[PostController::class,'Delete_post'])->name('delete_post')->middleware('student');
    Route::get('show_posts_details/{id}',[PostController::class,'Show_posts_details'])->name('show_posts_details');
    Route::post('add_photo_post/{id}/{id1}',[PostController::class,'Post_photo'])->name('add_photo_post')->middleware('student');
    ########  Treatment Routes ########
    Route::post('add_treatment_photo/{id}/{id1}',[TreatmentController::class,'Treatment_photo'])->name('add_treatment_photo')->middleware('admin');
    

});

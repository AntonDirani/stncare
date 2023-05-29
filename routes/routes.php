<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('user', 'UserController');
Route::resource('patient', 'PatientController');
Route::resource('student', 'StudentController');
Route::resource('post', 'PostController');
Route::resource('university', 'UniversityController');
Route::resource('photo', 'PhotoController');
Route::resource('treatment', 'TreatmentController');
Route::resource('subject', 'SubjectController');
Route::resource('date', 'DateController');
Route::resource('patient_post_date', 'Patient_post_dateController');
Route::resource('date_post', 'Date_postController');
Route::resource('post_photo', 'Post_photoController');
Route::resource('treatment_photo', 'Treatment_photoController');
Route::resource('university_subject', 'University_subjectController');
Route::resource('subject_studying', 'Subject_studyingController');
Route::resource('studying', 'StudyingController');
Route::resource('student_studying', 'Student_studyingController');
Route::resource('question', 'QuestionController');
Route::resource('queue', 'QueueController');
Route::resource('report_post', 'Report_postController');
Route::resource('report', 'ReportController');
Route::resource('favorite_list', 'Favorite_listController');

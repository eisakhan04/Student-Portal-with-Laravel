<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\ClassController; 
use App\Http\Controllers\SubjectController; 
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
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

// Route::get('/', function () {
//     return view('welcome');
//  // this is dashborad url   
// });

// this is logins urls
Route::get('/' , [AuthController::class, 'login']);
Route::post('login' , [AuthController::class, 'AuthLogin']);
Route::get('logout' , [AuthController::class, 'logout']);

// this is forgot password urls and function 
Route::get('forgot-password' , [AuthController::class, 'forgotpassword']);
Route::post('forgot-password' , [AuthController::class, 'PostForgotPassword']);


//this is admin dashborad url
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

// this is list url



//create group for middleWare with in urls Of Admin
Route::group(['middleware'=>'admin'] ,function(){
    //All admin url
    Route::get('admin/dashboard' , [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list' , [AdminController::class, 'list']);

    Route::get('admin/admin/add' , [AdminController::class, 'add']);

    Route::post('admin/admin/add' , [AdminController::class, 'insert']);
     
    Route::get('admin/admin/edit/{id}' , [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}' , [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}' , [AdminController::class, 'delete']);
  
    //teacher url
    Route::get('admin/teacher/list' , [TeacherController::class, 'list']);
    Route::get('admin/teacher/add' , [TeacherController::class, 'add']);
    Route::post('admin/teacher/add' , [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}' , [TeacherController::class,'edit']);
    Route::post('admin/teacher/edit/{id}' , [TeacherController::class,'update']);
    Route::get('admin/teacher/delete/{id}' , [TeacherController::class,'delete']);

    //  Student url
    Route::get('admin/student/list' , [StudentController::class, 'list']);
    Route::get('admin/student/add' , [StudentController::class, 'add']);
    Route::post('admin/student/add' , [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}' , [StudentController::class,'edit']);
    Route::post('admin/student/edit/{id}' , [StudentController::class,'update']);
    Route::get('admin/student/delete/{id}' , [StudentController::class,'delete']);

    //Parents url
    Route::get('admin/parent/list' , [ParentController::class, 'list']);
    Route::get('admin/parent/add' , [ParentController::class, 'add']);
    Route::post('admin/parent/add' , [ParentController::class, 'insert']);
    Route::get('admin/parent/edit/{id}' , [ParentController::class,'edit']);
    Route::post('admin/parent/edit/{id}' , [ParentController::class,'update']);
    Route::get('admin/parent/delete/{id}' , [ParentController::class,'delete']);

 // Class url 

 Route::get('admin/class/list',[ClassController::class , 'list']);
 Route::get('admin/class/add' , [ClassController::class, 'add']);
 Route::post('admin/class/add' , [ClassController::class, 'insert']);
 Route::get('admin/class/edit/{id}' , [ClassController::class, 'edit']);
 Route::post('admin/class/edit/{id}' , [ClassController::class, 'update']);
 Route::get('admin/class/delete/{id}' , [ClassController::class, 'delete']);


 // subject url

 Route::get('admin/subject/list',[SubjectController::class , 'list']);
 Route::get('admin/subject/add' , [SubjectController::class, 'add']);
 Route::post('admin/subject/add' , [SubjectController::class, 'insert']);
 Route::get('admin/subject/edit/{id}' , [SubjectController::class, 'edit']);
 Route::post('admin/subject/edit/{id}' , [SubjectController::class, 'update']);
 Route::get('admin/subject/delete/{id}' , [SubjectController::class, 'delete']);

 //assign_subject

 Route::get('admin/assign_subject/list',[ClassSubjectController::class , 'list']);
 Route::get('admin/assign_subject/add' , [ClassSubjectController::class, 'add']);
 Route::post('admin/assign_subject/add' , [ClassSubjectController::class, 'insert']);
 Route::get('admin/assign_subject/edit/{id}' , [ClassSubjectController::class, 'edit']);
 Route::post('admin/assign_subject/edit/{id}' , [ClassSubjectController::class, 'update']);
 Route::get('admin/assign_subject/delete/{id}' , [ClassSubjectController::class, 'delete']);

// edit_single
Route::get('admin/assign_subject/edit_single/{id}' , [ClassSubjectController::class, 'edit_single']);
 Route::post('admin/assign_subject/edit_single/{id}' , [ClassSubjectController::class, 'update_single']);


 // admin/change_password
 Route::get('admin/change_password' ,  [UserController::class, 'change_password']);
 Route::post('admin/change_password' , [UserController::class, 'update_change_password']);




});
//create group for middleWare with in urls Of teacher
Route::group(['middleware'=>'teacher'] ,function(){

    Route::get('teacher/dashboard' , [DashboardController::class, 'dashboard']);

     // teacher/change_password
 Route::get('teacher/change_password' , [UserController::class, 'change_password']);
 Route::post('teacher/change_password' , [UserController::class, 'update_change_password']);
  
});
//create group for middleWare with in urls Of parent
Route::group(['middleware'=>'parent'] ,function(){

    Route::get('parent/dashboard' , [DashboardController::class, 'dashboard']);
 
     // parent/change_password
 Route::get('parent/change_password' , [UserController::class, 'change_password']);
 Route::post('parent/change_password' , [UserController::class, 'update_change_password']);
});


//create group for middleWare with in urls Of student
Route::group(['middleware'=>'student'] ,function(){

    Route::get('student/dashboard' , [DashboardController::class, 'dashboard']);

     // student/change_password
 Route::get('student/change_password' , [UserController::class, 'change_password']);
 Route::post('student/change_password' , [UserController::class, 'update_change_password']);
  
});
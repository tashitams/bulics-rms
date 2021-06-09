<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'welcome')->name('guest');

Auth::routes([
    'login' => true,
    'register' => false,
    'verify'   => false,
    'confirm' => false,
    'reset' => false
]);


// Student Login Route
Route::prefix('student')->name('student.')->namespace('Auth')->group(function() {
    Route::get('login','StudentLoginController@showLoginForm')->name('login');
    Route::post('login','StudentLoginController@login');
    Route::post('logout','StudentLoginController@logout')->name('logout');
});


// Admin Route Group
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', 'Admin\AdminController@index')->name('home');
    Route::view('docs/1.x', 'admin.docs')->name('docs');

    Route::view('profile', 'admin.profile')->name('profile');
    Route::patch('profile', 'Admin\AdminController@updateProfile')->name('profile.update');
    Route::view('password', 'admin.password')->name('password');
    Route::patch('password', 'Admin\AdminController@updatePassword')->name('password.update');
    Route::post('update-avatar', 'Admin\AdminController@updateAvatar')->name('update_avatar');
    
    /* Subject routes */
    Route::livewire('/subjects', 'admin.subject.index')->name('subjects.index');
    Route::livewire('/subjects/create', 'admin.subject.create')->name('subjects.create');
    Route::livewire('/subjects/{subject}/edit', 'admin.subject.edit')->name('subjects.edit');

    /* Grade routes */
    Route::livewire('/grades', 'admin.grade.index')->name('grades.index');
    Route::livewire('/grades/create', 'admin.grade.create')->name('grades.create');
    Route::livewire('/grades/{grade}/edit', 'admin.grade.edit')->name('grades.edit');

    /* Student routes */
    Route::livewire('/students', 'admin.student.index')->name('students.index');
    Route::livewire('/students/create', 'admin.student.create')->name('students.create');
    Route::livewire('/students/upload', 'admin.student.upload')->name('students.upload');
    Route::livewire('/students/{student}/edit', 'admin.student.edit')->name('students.edit');
    Route::livewire('students/Class_Id-{id}', 'admin.student.show-student')->name('students.show_student');
    
   
    Route::get('students/results/{index_no}/create', 'Admin\ResultController@create')->name('student_result.create');
    Route::post('students/results/{index_no}', 'Admin\ResultController@store')->name('student_result.store');
    Route::get('students/results/{index_no}/edit', 'Admin\ResultController@edit')->name('student_result.edit');
    Route::patch('students/results/{index_no}', 'Admin\ResultController@update')->name('student_result.update');
    Route::delete('students/results/{index_no}', 'Admin\ResultController@destroy')->name('student_result.destroy');

    /* Result upload routes */
    Route::livewire('/results/upload', 'admin.result.upload')->name('results.upload');
   
}); 


Route::middleware(['auth:student'])->prefix('student')->name('student.')->namespace('Student')->group(function() {
    Route::get('/', 'StudentController@index')->name('home');
});



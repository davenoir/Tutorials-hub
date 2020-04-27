<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Auth::routes();

Route::get('/dataScience', 'PageController@dataScience')->name('datascience');
Route::get('/home', 'PageController@programming')->name('programming');
Route::get('/devopsview', 'PageController@devops')->name('devops');
Route::get('/designview', 'PageController@design')->name('design');



Route::get('auth/social', 'Auth\LoginController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('/technologies', 'SearchController@indexProgramming');
Route::get('/datascience', 'SearchController@indexDataScience');
Route::get('/devops', 'SearchController@indexDevOps');
Route::get('/design', 'SearchController@indexDesign');
Route::get('/searchProgramming', 'SearchController@searchProgramming')->name('searchProgramming');
Route::get('/searchDataScience', 'SearchController@searchDataScience')->name('searchDataScience');
Route::get('/searchDevOps', 'SearchController@searchDevOps')->name('searchDevOps');
Route::get('/searchDesign', 'SearchController@searchDesign')->name('searchDesign');

Route::get('/list/{id}', 'CourseController@listFilter');

Route::post('/list/{id}', 'CourseController@listFilter');


Route::post('like', 'CourseController@LikeCourse')->name('like');


Route::get('/languages', 'CourseController@getLanguages');
Route::get('/version', 'CourseController@getVersions');

Route::post('/addTutorial', 'CourseController@addCourse');

Route::group(['middleware' => 'user.role'], function () {
    Route::get('/managecourses', 'CourseController@managecourses')->name('managecourses');
    Route::get('approveMail/{id}', 'MailController@approveMail')->name('approveMail');
    Route::post('/declineMail', 'MailController@declineMail')->name('declineMail');
    Route::get('removeCourse/{id}', 'CourseController@removeCourse')->name('removeCourse');
});

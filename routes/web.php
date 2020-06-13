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

Auth::routes();


Route::get('/', 'HomeController@homeAction');
Route::get('/profile', 'HomeController@showProfileAction');
Route::get('/fillProfile', 'HomeController@fillProfileAction');
Route::get('/showAdvancedSearch', 'HomeController@showAdvancedSearchFormAction');
Route::get('/vacancy', 'HomeController@showCreateVacancyFormAction');
Route::get('/resume', 'HomeController@showCreateResumeFormAction');

Route::get('/createVacancy', 'VacanciesController@createVacancyAction');
Route::get('/vacancies{id}', 'VacanciesController@vacancyAction');
Route::get('/myVacancies', 'VacanciesController@myVacanciesAction');
Route::get('/findVacancies', 'VacanciesController@findVacanciesAction');
Route::get('/advancedSearch', 'VacanciesController@advancedSearchAction');
Route::get('/addVacancy', 'VacanciesController@addVacancyAction');
Route::get('/removeVacancy', 'VacanciesController@removeVacancyAction');

Route::get('/createResume', 'ResumeController@createResumeAction');

Route::get('/statistic', 'StatisticController@indexAction');
Route::get('/chosenProfessionStatistic', 'StatisticController@chosenProfessionAction');

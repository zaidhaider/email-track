<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});


Route::get('/tables', 'TaginfoController@extractingInfos');
Route::get('/tablesSendersV1', 'TaginfoController@extractingRates');
Route::get('/tablesSendersV2', 'TaginfoController@extractingRatesV2');
Route::get('/tablesTagdetails', 'TagdetailController@extractingTagdetails');
Route::get('/tablesTagdetailsThisweek', 'TagdetailController@extractingLastweekTagdetails');
Route::get('/tablesTagdetailslast15days', 'TagdetailController@extractingPreviousweekTagdetails');
Route::get('/tablesTagdetailslast30days', 'TagdetailController@extractingLastmonthTagdetails');

//Route::get('/tablesindividualTagdetails', 'TagdetailController@extractingindividualTagdetails');


Route::get('/blank', function()
{
	return View::make('blank');
});
//Route::get('tag_info', 'Tag_infoController@dbTesting');
//Route::get('tag_info', 'TaginfoController@extractingInfos');


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

Route::view("", "index");

Route::get("cari", function() {

	return redirect("");
});

Route::post("cari", "UmumController@cari");

Route::get("cari/semua", function() {

	return redirect("");
});

Route::get("cari/semua/{katakunci}", "UmumController@cari_semua");

Route::get("cari/{surah_id}/{katakunci}", "UmumController@cari_surah");

Route::get("surah", "UmumController@surah");

Route::get("surah/{surah_id}", "UmumController@surah_surah_id");


Route::get("tafsir/{surah}/{ayat}", "UmumController@tafsir");

Route::get("tafsir/{surah}", function() {

	return redirect("");
});

Route::get("tafsir", function() {

	return redirect("");
});

Route::get("kontak", function() {

	return redirect("");
});

Route::post("kontak", "UmumController@kontak");
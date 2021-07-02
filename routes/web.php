<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// Static contents
Route::get('/', function () { return view('contents.home'); })->name("home");
Route::get('/archive', function () { return view('contents.archive'); })->name("archive");
Route::get('/aypa', function () { return view('contents.aypa'); })->name("aypa");
Route::get('/calendar', function () { return view('contents.calendar'); })->name("calendar");
Route::get('/lay-singles', function () { return view('contents.laysingles'); })->name("lay.singles");
Route::get('/team', function () { return view('contents.team'); })->name("team");
Route::get('/resources', function (Request $request) { return view('contents.resources',["agent"=>$request->server("HTTP_USER_AGENT")]); })->name("resources");
Route::get('/teens', function () { return view('contents.teens'); })->name("teens");
Route::get('/young-adult', function () { return view('contents.youngadult'); })->name("young.adult");
Route::get('/youth-campus', function () { return view('contents.youthcampus'); })->name("youth.campus");


//rog
Route::get('/reachout', function () { return view('contents.home'); });
Route::get('/rog-admin', function () { return view('contents.home'); });
Route::get('/rog-user', function () { return view('contents.home'); });

//forms
Route::get('/checkin', function () { return view('contents.checkin'); })->name("checkin");
Route::get('/ciptass', function () { return view('contents.home'); });
Route::get('/hangout', function () { return view('contents.home'); });
Route::get('/kamikudus', function () { return view('contents.home'); });
Route::get('/lnl', function () { return view('contents.home'); });
Route::get('/s2s', function () { return view('contents.home'); });


Route::get('/yan', function () { return view('contents.home'); });


//processes
Route::get('/submit', function () {
    return view('contents.home');
});
Route::get('/submitBehalf', function () {
    return view('contents.home');
});
Route::get('/confirm', function () {
    return view('contents.home');
});

//redirects
Route::get('/easter', function () { return view('contents.home'); });
Route::get('/kamiberdoa', function () { return view('contents.home'); });
Route::get('/quiz', function () { return view('contents.home'); });
Route::get('/quiz1', function () { return view('contents.home'); });
Route::get('/quiz2', function () { return view('contents.home'); });
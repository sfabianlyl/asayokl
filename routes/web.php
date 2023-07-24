<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Shortlink;
use App\Models\Form;
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
Route::get('/team', "App\Http\Controllers\ViewController@team")->name("team");
Route::get('/resources', function (Request $request) { return view('contents.resources',["agent"=>$request->server("HTTP_USER_AGENT")]); })->name("resources");
Route::get('/teens', function () { return view('contents.teens'); })->name("teens");
Route::get('/young-adult', function () { return view('contents.youngadult'); })->name("young.adult");
Route::get('/youth-campus', function () { return view('contents.youthcampus'); })->name("youth.campus");
Route::get("/kamikudusfaq", function() { return view("contents.kami.kudus.faq"); })->name("kami.kudus.faq");
Route::get('/cyan', function () { return view('contents.cyan'); })->name("cyan.page");
Route::get("/kamikudus", function () { return view('contents.kami.kudus.page'); })->name("kamikudus.page");
Route::get("/pestakami", function () { return view('contents.kami.pesta.page'); })->name("pestakami.page");
Route::get("/wydarchkl", function () { return view('contents.wydarchkl'); })->name("wydarchkl");


//kami
    //kamikudus
    // Route::get("/kamikudus", "App\Http\Controllers\ViewController@kamikudus" )->name('kami.kudus.registration.form');
    // Route::post('/kamikudus',"App\Http\Controllers\RegistrationController@kamikudus")->name("kami.kudus.registration.submit");

//forms
Route::get('/checkin', function () { return view('forms.checkin'); })->name("checkin");
Route::post('/checkin', "App\Http\Controllers\CheckinController@checkin_self")->name("checkin.self.submit");
Route::post('/checkin-behalf', "App\Http\Controllers\CheckinController@checkin_behalf")->name("checkin.behalf.submit");

Route::get('/ciptass', function () { return view('forms.ciptass'); })->name("ciptass.registration.form");
Route::get('/hangout', function () { return view('forms.hangout'); })->name("hangout.registration.form");
Route::get('/lnl', function () { return view('forms.lnl'); })->name("lnl.registration.form");;
Route::get('/s2s', function () { return view('forms.s2s'); })->name("s2s.registration.form");;


Route::post('/ciptass',"App\Http\Controllers\RegistrationController@ciptass")->name("ciptass.registration.submit");
Route::post('/hangout',"App\Http\Controllers\RegistrationController@hangout")->name("hangout.registration.submit");
Route::post('/lnl',"App\Http\Controllers\RegistrationController@lnl")->name("lnl.registration.submit");
Route::post('/s2s',"App\Http\Controllers\RegistrationController@s2s")->name("s2s.registration.submit");
Route::post('/cyan',"App\Http\Controllers\RegistrationController@cyan")->name("cyan.registration.submit");

Route::get("/youtube", function(){ return redirect("https://www.youtube.com/channel/UCYYMs6KKetfDXo2HNOaiyMg"); });

Route::get("/ig_oauth", "App\Http\Controllers\MiscController@ig_oauth")->name("ig.oauth");
Route::get("/ig_get_posts","App\Http\Controllers\MiscController@get_posts")->name("ig.get.posts");
//redirects
// Route::get('/easter', function () { return redirect("https://www.youtube.com/playlist?list=PL1GEZHjLaCL2Z01gOjPk4B_5ZqhAyNv_M"); });
// Route::get('/kamiberdoa', function () { return redirect('https://www.youtube.com/playlist?list=PL1GEZHjLaCL3wnDiZkXS-WbzCbEP-4t2A'); });
// Route::get('/quiz', function () { return redirect("https://docs.google.com/forms/d/e/1FAIpQLScBe6BS4kf0Do74gGKliJHWHcOOIlPtxXex3oDuTb8GSBXp4g/viewform?usp=sf_link"); });
// Route::get('/quiz1', function () { return redirect('https://docs.google.com/forms/d/e/1FAIpQLSe5_f3CvQypw7UTBo1YL6jWjzumkl5lHpX_yprkDq7FuKXbbw/viewform?usp=sf_link'); });
$shortlinks=Shortlink::where("status","active")->get();
foreach($shortlinks as $shortlink){
    $link=$shortlink->shortlink;
    Route::get("/$link",function() use($shortlink) { return redirect($shortlink->url); });
}

Route::get("/forms/{url}","App\Http\Controllers\FormController@view_form")->name("forms.view");
Route::post("/forms","App\Http\Controllers\FormController@submit_form")->name("forms.submit");

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
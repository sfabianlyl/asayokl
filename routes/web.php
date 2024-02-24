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
Route::get("/about", function () { return view('contents.about'); })->name("about");
Route::get('/team', "App\Http\Controllers\ViewController@team")->name("team");
Route::get('/resources', function (Request $request) { return view('contents.resources',["agent"=>$request->server("HTTP_USER_AGENT")]); })->name("resources");
Route::get('/teens', function () { return view('contents.teens'); })->name("teens");
Route::get('/young-adult', function () { return view('contents.youngadult'); })->name("young.adult");
Route::get('/youth-campus', function () { return view('contents.youthcampus'); })->name("youth.campus");
Route::get("/kamikudusfaq", function() { return view("contents.kami.kudus.faq"); })->name("kami.kudus.faq");
Route::get('/cyan', function () { return view('contents.cyan'); })->name("cyan.page");
Route::get("/kamikudus", function () { return view('contents.kami.kudus.page'); })->name("kamikudus.page");
Route::get("/pestakami", function () { return view('contents.kami.pesta.page'); })->name("pestakami.page");
Route::get("/about", function () { return view('contents.about'); })->name("about");

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

Route::group(['prefix'=>'nyalakan'], function(){
    Route::get("/","App\Http\Controllers\NyalakanController@registration_form")->name("nyalakan.registration.form");
    
    Route::get("/login","App\Http\Controllers\NyalakanController@login_form")->name("nyalakan.login.form");
    Route::post("/check_email","App\Http\Controllers\NyalakanController@check_email")->name("nyalakan.email.check");
    Route::post("/password","App\Http\Controllers\NyalakanController@create_password")->name("nyalakan.password.create");
    Route::post("/login","App\Http\Controllers\NyalakanController@login")->name("nyalakan.login.authenticate");
    
    Route::post("/submit","App\Http\Controllers\NyalakanController@submit")->name("nyalakan.registration.submit");

});
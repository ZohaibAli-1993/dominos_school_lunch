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
    return view('index');
});

Route::get('/contact',function(){
    return view('main.contact');
});

Route::post('/contact','Home@contact');

Route::get('/about',function(){
    return view('main.about')
;});

//Captcha routes
Route::get('my-captcha', 'Home@myCaptcha')->name('myCaptcha');
Route::post('my-captcha', 'Home@myCaptchaPost')->name('myCaptcha.post');
Route::get('refresh_captcha', 'Home@refreshCaptcha')->name('refresh_captcha');


Route::get('/send/email', 'Email@mail');


/**SCHOOL ROUTES */
Route::get('/schools/', function(){return view('schools.index');});

/**PARENTS ROUTES */
Route::get('/parents/', function(){return view('parents.index');});

/**FOOTER CONTENT LINKS */
Route::get('/content/gift-cards', function(){return view('content.cards');});
Route::get('/content/terms', function(){return view('content.terms');});
Route::get('/content/nutricion-guide', function(){return view('content.nutrition');});
Route::get('/content/privacy', function(){return view('content.privacy');});

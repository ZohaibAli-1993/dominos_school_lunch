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
})->name('home');

/*
|--------------------------------------------------------------------------
| Contact Page
|--------------------------------------------------------------------------
*/

Route::get('/contact',function(){
    return view('main.contact');
});


/*
|--------------------------------------------------------------------------
| Main registration Page
|--------------------------------------------------------------------------
*/
Route::get('/registration',function(){
    return view('main.registration');
});

/*
|--------------------------------------------------------------------------
| school registration Page
|--------------------------------------------------------------------------
*/
Route::get('/school_registration', 'Schools\SchoolsController@create');

Route::post('/school_registration', 'Schools\SchoolsController@store');

/*
|--------------------------------------------------------------------------
| login Page
|--------------------------------------------------------------------------
*/
Route::get('/login',function(){
    return view('main.login');
}); 

/*
|--------------------------------------------------------------------------
| parents registration Page
|--------------------------------------------------------------------------
*/
Route::get('/parents_registration',function(){
    return view('main.parents_registration');
});

/*
|--------------------------------------------------------------------------
| contact Page
|--------------------------------------------------------------------------
*/


Route::get('/login',function(){
    return view('main.login');
}); 
Route::get('/parents_registration',function(){
    return view('main.parents_registration');
});

Route::post('/contact','Home@contact');

/*
|--------------------------------------------------------------------------
| about Page
|--------------------------------------------------------------------------
*/
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
Route::get('/schools/menu',function(){return view('schools.menu');});

/**PARENTS ROUTES */
Route::get('/parents/', function(){return view('parents.index');});
Route::get('/parents/order','Students\OrdersController@showOrder');
Route::post('/parents/order','Students.OrdersController@store');

/**FOOTER CONTENT LINKS */
Route::get('/content/gift-card', function(){return view('content.cards');});
Route::get('/content/terms', function(){return view('content.terms');});
Route::get('/content/nutricion-guide', function(){return view('content.nutrition');});
Route::get('/content/privacy', function(){return view('content.privacy');});
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

/*
|-------------------------------------------------------------------------
| Authentication Pages
|--------------------------------------------------------------------------
*/

Auth::routes();

/*
|-------------------------------------------------------------------------
| Home Page (Main Page)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
   return view('index');
})->name('home');

Route::get('/home', function () {
    return view('index');
})->name('home');

//logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Subscription 
Route::post('/home', 'Dominos\SubscriptionsController@store');


//Parents instructions
Route::get('/parents_help', function () {
    return view('parents.instruction');
});

//School Instructions
Route::get('/schools_help', function () {
    return view('schools.instruction');
});


/*
|--------------------------------------------------------------------------
| SCHOOL ROUTES
|--------------------------------------------------------------------------
*/

// Schools route without login
Route::get('/schools/', function(){
    return view('schools.index');
});

// Schools routes with login
Route::middleware(['school'])->group(function()
{   
    //menu items
    Route::get('/schools/menu', 'Dominos\MenuItemsController@index');

    //show school profile
    Route::get('/school/{school}', 'Schools\SchoolsController@show');

    //show form to edit school profile
    Route::get('/school/edit', 'Schools\SchoolsController@edit');

    //update school profile
    Route::PUT('/school/edit', 'Schools\SchoolsController@update');

    //Routes for classroom pages
    Route::get('/schools/classrooms', 'Schools\ClassroomsController@index');
    Route::post('/schools/classrooms','Schools\ClassroomsController@store');
    Route::get('/schools/classrooms/{classroom}','Schools\ClassroomsController@edit');
    Route::put('/schools/classrooms','Schools\ClassroomsController@update');
    Route::delete('/schools/classrooms/{classroom}',
                  'Schools\ClassroomsController@destroy');

    /* Events routes */
    Route::get('/schools/events/create', 'Schools\EventsController@create');
    Route::post('/schools/events/create', 'Schools\EventsController@store');
    Route::get('/schools/events', 'Schools\EventsController@index');
    Route::get('/schools/events/edit/{event}', 'Schools\EventsController@edit');
    Route::put('/schools/events', 'Schools\EventsController@update');
    Route::delete('/schools/events/{event}', 'Schools\EventsController@destroy');

    /* Reports */
    Route::get('/schools/reports', 'Schools\ReportsController@index');
    Route::get('/schools/reports/orders', 'Schools\ReportsController@orders');
    Route::get('/schools/reports/classrooms', 'Schools\ReportsController@classrooms');
    Route::get('/schools/reports/students', 'Schools\ReportsController@students');
    Route::get('/schools/reports/parents', 'Schools\ReportsController@parents');
    Route::get('/schools/reports/download/{report}', 
               'Schools\ReportsController@download');

});


/*
|--------------------------------------------------------------------------
| Admin ROUTES
|--------------------------------------------------------------------------
*/
// Admin routes with login
Route::middleware(['admin'])->group(function()
{  
    Route::get('/dominos/setup', 'Dominos\SetupsController@edit');
    Route::put('/dominos/setup', 'Dominos\SetupsController@update');
    Route::get('/dominos/calendars', 'Dominos\CalendarsController@edit');
    Route::put('/dominos/calendars', 'Dominos\CalendarsController@update');
    Route::get('/dominos/stores', 'Dominos\StoresController@edit');
    Route::put('/dominos/stores', 'Dominos\StoresController@update');
    Route::get('/dominos/categories', 'Dominos\CategoriesController@edit');
    Route::put('/dominos/categories', 'Dominos\CategoriesController@update');
    Route::get('/dominos/menuitems', 'Dominos\MenuItemsController@edit');
    Route::put('/dominos/menuitems', 'Dominos\MenuItemsController@update');
    Route::get('/dominos/contacts', 'Dominos\ContactsController@index');
    Route::get('/dominos/subscriptions', 'Dominos\SubscriptionsController@index');
    Route::get('/dominos/provinces', 'Dominos\ProvincesController@edit');
    Route::put('/dominos/provinces', 'Dominos\ProvincesController@update');
});

/*
|--------------------------------------------------------------------------
| Contact Page
|--------------------------------------------------------------------------
*/
Route::get('/contact',function(){
    return view('main.contact');
});
Route::post('/contact', 'Dominos\ContactsController@store');
Route::get('/sucess', function(){
    return view('main.sucess');
});

/*
|--------------------------------------------------------------------------
| Registration Page
|--------------------------------------------------------------------------
*/
Route::get('/registration',function(){
    return view('main.registration');
});

// School registration Page
Route::get('/school_registration', 'Schools\SchoolsController@create');
Route::post('/school_registration', 'Schools\SchoolsController@store');

//Parents registration Page
Route::get('/parents_registration',function(){
   return view('main.parents_registration');
});


/*
|--------------------------------------------------------------------------
| Captcha routes
|--------------------------------------------------------------------------
*/
Route::get('my-captcha', 'Home@myCaptcha')->name('myCaptcha');

Route::post('my-captcha', 'Home@myCaptchaPost')->name('myCaptcha.post');

Route::get('refresh_captcha', 'Home@refreshCaptcha')->name('refresh_captcha');

/*
|--------------------------------------------------------------------------
| Other pages
|--------------------------------------------------------------------------
*/
Route::get('/about',function(){
    return view('main.about')
;}); 

Route::get('/new',function(){
    return view('captcha')
;});

Route::get('/send/email', 'Email@mail');

/*
|--------------------------------------------------------------------------
| PARENTS ROUTES
|--------------------------------------------------------------------------
*/
// Parents routes with login
Route::middleware(['parents'])->group(function()
    { 
    // Orders 
    Route::get('/parents/order','Students\OrdersController@showOrder');
    Route::post('/parents/order/neworder/process','Students\OrdersController@store');
    Route::get('/parents/order/past','Students\OrdersController@showOrderPast');
    Route::get('/parents/order/invoice/{event}/{student}','Students\OrdersController@showInvoice');
    Route::get('/parents/order/neworder/{event}/{student}', 
                'Students\OrdersController@newOrder');
    Route::post('/parents/order/checkout/', 'Students\OrdersController@checkout');
    Route::view('/checkout', 'checkout-page');
    Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment');
    Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment');
    /**
     * Parents home page route
     */
    Route::get('/parents/', 'Students\StudentsController@index');
    Route::post('/parents/', 
           'Students\ParentsRegisterController@updateSession');

    /**
     * Parents edit student page route
     */
    Route::get('/parents/{parentRegister}/{student}/edit', 'Students\StudentsController@edit');

    Route::PUT('/parents/{parentRegister}/{student}/edit', 'Students\StudentsController@update');

    /**
     * Parents add student page route
     */
    Route::get('/parents/{parentRegister}/student/add', 'Students\StudentsController@create');

    Route::post('/parents/{parentRegister}/student/add', 'Students\StudentsController@store');

    Route::get('/parents', 'Students\StudentsController@index');

    //show form to edit parents profile
    Route::get('/parents/edit', 
               'Students\ParentsRegisterController@edit');

    //update parents profile
    Route::PUT('/parents/edit', 'Students\ParentsRegisterController@update');


    ///////????????????????
    /**Parents Registration */  
    Route::post('/registration','students\ParentsRegisterController@store'); 

});

/*
|--------------------------------------------------------------------------
| Footer links routes
|--------------------------------------------------------------------------
*/

Route::get('/content/gift-card', function(){return view('content.cards');});
Route::get('/content/terms', function(){return view('content.terms');});
Route::get('/content/nutricion-guide', function(){return view('content.nutrition');});
Route::get('/content/privacy', function(){return view('content.privacy');}); 




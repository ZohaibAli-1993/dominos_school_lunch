<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::middleware(['school'])->group(function()
{   
    //show school profile
    Route::get('/school/{school}', 'Schools\SchoolsController@show');

    //show form to edit school profile
    Route::get('/school/{school}/edit', 'Schools\SchoolsController@edit');

    //update school profile
    Route::PUT('/school/{school}/edit', 'Schools\SchoolsController@update');

});

Route::get('/', function () {
	return view('index');
})->name('home');

/*
|--------------------------------------------------------------------------
| Contact Page
|--------------------------------------------------------------------------
*/
Route::post('/contact', 'Dominos\ContactsController@store');


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
|-------------------------------------------------------------------------
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

return
view('main.parents_registration');

});


/*
|--------------------------------------------------------------------------
| school registration Page
|--------------------------------------------------------------------------
*/
Route::get('/school_registration', 'Schools\SchoolsController@create');

Route::post('/school_registration', 'Schools\SchoolsController@store');

/*
|-------------------------------------------------------------------------
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

return
view('main.parents_registration');

});

/*
|--------------------------------------------------------------------------
| contact Page
|--------------------------------------------------------------------------
*/


Route::get('/parents_registration',function(){
	return view('main.parents_registration');
});

//Route::post('/contact','Home@contact');  




//Route::post('/contact','Home@contact');

Route::post('/registration','students\ParentsController@store');


/*
|--------------------------------------------------------------------------
| about Page
|--------------------------------------------------------------------------
*/
Route::get('/about',function(){

    return view('main.about')
;}); 
Route::get('/new',function(){
    return view('captcha')
;});





/*
|--------------------------------------------------------------------------
| Captcha routes
|--------------------------------------------------------------------------
*/
Route::get('my-captcha', 'Home@myCaptcha')->name('myCaptcha');

Route::post('my-captcha', 'Home@myCaptchaPost')->name('myCaptcha.post');

Route::get('refresh_captcha', 'Home@refreshCaptcha')->name('refresh_captcha');


Route::get('/send/email', 'Email@mail');

/*
|--------------------------------------------------------------------------
| SCHOOL ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/schools/', function(){
	return view('schools.index');
});

Route::get('/schools/menu', 'Dominos\MenuItemsController@index');




//Route::get('/schools/menu', 'Dominos\MenuItemsController@index');

Route::get('/schools/classrooms', 'Schools\ClassroomsController@index');

Route::post('/schools/classrooms','Schools\ClassroomsController@store');

Route::get('/schools/upload','Schools\ClassroomsController@showUpload');

Route::post('/schools/upload','Schools\ClassroomsController@storeFileContents');

Route::get('/schools/classrooms/{classroom}','Schools\ClassroomsController@edit');

Route::put('/schools/classrooms','Schools\ClassroomsController@update');

Route::delete('/schools/classrooms/{classroom}','Schools\ClassroomsController@destroy');




//Route::get('/schools/menu',function(){return view('schools.menu');});


//Route::get('/schools/classrooms',function(){return
//view('schools.classrooms');});


//Route::get('/schools/menu',function(){return
//view('schools.menu');});



/**SCHOOL EVENTS ROUTES */
Route::get('/schools/events/create', 'Schools\EventsController@create');
Route::post('/schools/events/create', 'Schools\EventsController@store');
Route::get('/schools/events', 'Schools\EventsController@index');
Route::get('/schools/events/edit/{event}', 'Schools\EventsController@edit');
Route::put('/schools/events', 'Schools\EventsController@update');
Route::delete('/schools/events/{event}', 'Schools\EventsController@destroy');

/*
|--------------------------------------------------------------------------
| PARENTS ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/parents/order','Students\OrdersController@showOrder');
Route::post('/parents/order','Students\OrdersController@store');
Route::get('/parents/order/neworder/{event}/{student}', 'Students\OrdersController@newOrder');
Route::post('/parents/order/checkout/', 'Students\OrdersController@checkout');

/**
 * Parents home page route
 */
Route::get('/parents/{parentRegister}', 'Students\StudentsController@index');

Route::post('/parents/{parentRegister}', 'Students\ParentsRegisterController@updateSession');


/**
 * Parents edit student page route
 */
Route::get('/parents/{parentRegister}/{student}/edit', 'Students\StudentsController@edit');

Route::PUT('/parents/{parentRegister}/{student}/edit', 'Students\StudentsController@update');

/**
 * Parents add student page route
 */
/*Route::get('/parents/{parentRegister}/student/add', 'Students\StudentsController@create');

Route::post('/parents/{parentRegister}/student/add', 'Students\StudentsController@store');*/

Route::get('/parents/{parentRegister}/{token}/student/add', 'Students\StudentsController@create');

Route::post('/parents/{parentRegister}/{token}/student/add', 'Students\StudentsController@store');


/** Subscription routes  */
Route::get('/home', 'Dominos\SubscriptionsController@store')->name('home');
Route::post('/home', 'Dominos\SubscriptionsController@store');

/**FOOTER CONTENT LINKS */

Route::get('/content/gift-card', function(){return view('content.cards');});
Route::get('/content/terms', function(){return view('content.terms');});
Route::get('/content/nutricion-guide', function(){return view('content.nutrition');});

Route::get('/content/privacy', function(){return view('content.privacy');}); 
/**Parents Registration */  
Route::post('/registration','students\ParentsRegisterController@store'); 
Route::middleware(['parents'])->group(function() 
{ 


});
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/content/privacy', function(){return view('content.privacy');});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/content/gift-card',
function(){return
view('content.cards');});

Route::get('/content/terms',
function(){return
view('content.terms');});

Route::get('/content/nutricion-guide',
function(){return
view('content.nutrition');});

Route::get('/content/privacy',
function(){return
view('content.privacy');});

Auth::routes();



Route::get('/home',
'HomeController@index')->name('home');


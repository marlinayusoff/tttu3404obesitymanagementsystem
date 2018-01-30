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

//Login Session
Route::get('/', 'pagesController@getIndex');
Route::get('/nsoHome', 'nsoHomeController@Home');
Route::post('/', 'pagesController@loginprocess');
Route::get('/logout', 'pagesController@logoutprocess');

/*
*
ADMIN VIEW
*
*/

//Admin Section -  Manage NSO
Route::get('/admin/register_nso', 'adminController@create')->name('Pendaftaran Staf');
Route::post('/admin','adminController@insert');
Route::get('/admin/nso_list', 'adminController@nsoList');
Route::get('/admin/search_nso', 'adminController@searchNSO');
Route::get('admin/{id}/edit','adminController@edit');
Route::post('admin/update','adminController@update');
Route::delete('admin/{id}','adminController@destroy')->name('delete');

//Admin Section - Daily Diet
//Makanan
Route::get('/admin/food', 'libraryFoodController@viewFoodLibrary');
Route::get('/admin/food/new', 'libraryFoodController@createFoodLibrary');
Route::post('/admin/food', 'libraryFoodController@storeFoodLibrary');
Route::get('/admin/food/add', 'libraryFoodController@addFood');
Route::delete('admin/food/{foodId}','libraryFoodController@destroy')->name('delete');

//Minuman
Route::get('/admin/drink', 'libraryDrinkController@viewDrinkLibrary');
Route::get('/admin/drink/new', 'libraryDrinkController@createDrinkLibrary');
Route::post('/admin/drink', 'libraryDrinkController@storeDrinkLibrary');
Route::get('/admin/drink/add', 'libraryDrinkController@addDrink');
Route::delete('admin/drink/{drinkId}','libraryDrinkController@destroy')->name('delete');
//Aktiviti
Route::get('/admin/activity', 'libraryActivityController@viewActivityLibrary');
Route::get('/admin/activity/new', 'libraryActivityController@createActivityLibrary');
Route::post('/admin/activity', 'libraryActivityController@storeActivityLibrary');
Route::get('/admin/activity/add', 'libraryActivityController@addActivity');
Route::delete('admin/activity/{activityId}','libraryActivityController@destroy')->name('delete');

/*
*
NSO VIEW
*
*/

//NSO Section - Home
//Route::get('/nso', 'nsoHomeController@Home');

//NSO Section - Manage Patient
Route::get('/nso/register_patient', 'nsoController@getRegisterPatient');
Route::get('/nso/viewpatient','nsoController@getPatientInfo');
Route::post('/nso/insert_patient','nsoController@insertPatientBasic');
Route::post('/nso/insert_patientMed','nsoController@insertPatientMed');
Route::delete('nso/{id}','nsoController@destroy')->name('delete');
Route::post('/nso/info/{id}/update','nsoController@updateBasicInformation');



//Calendar Appointment
Route::get('/calender', 'nsoHomeController@calender');
Route::get('/appointmentDetail', 'addAppointmentController@displayAppointment');
Route::get('/Appointment', 'addAppointmentController@schedule');
Route::get('/addAppt', 'addAppointmentController@AppointmentAdd');

//Infomation & Update Patient
Route::get('/info/{patientId}', 'patientController@show');
Route::get('/schedule/{patientId}', 'patientController@showSchedule');
Route::get('/scheduleP', 'patientController@schedule');
Route::post('/info', 'patientController@processForm');
Route::post('/addAntro', 'patientController@addAntro');
Route::get('/Kesihatan', 'patientController@addkesihatan');
Route::get('/ubat', 'patientController@addubat');
Route::get('/updatespk', 'patientController@updatespk');
Route::get('/update', 'patientController@updatePatient');
Route::get('/delete/{patientId}', 'patientController@Deleteshow');
Route::post('/delete', 'patientController@processDelete');

Route::get('/patientList', 'patientController@patientList');
Route::get('/searchPatient', 'patientController@searchPatient');

//view visualize patient
Route::get('/nso/patientSummary', 'patientSummaryController@show');
Route::get('google-piechart',array('as'=>'/nso/patientSummary','uses'=>'patientSummaryController@pieChart'));

//view patient daily diet
Route::get('/getDailyDietDetails', 'dailydietViewController@process');


//Print pdf  
Route::get('/pdfPatientInformation/{patientId}', 'PDFController@pdfPatientInformation');
Route::post('/pdfPatientInformation', 'PDFController@processPdfPatientInformation');
Route::get('pdfPatientInformation/{patientId}',array('as'=>'pdfPatientInformation','uses'=>'PDFController@pdfPatientInformation'));
/*
*
PATIENT VIEW - 30/11/2017
*
*/

Route::get('/patient/info/{patientId}', 'userController@show');
Route::post('/patient/info', 'userController@processForm');

//Patient Inbody


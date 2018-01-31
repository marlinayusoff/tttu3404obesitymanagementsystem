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
Route::get('/patientHome', 'patientHomeController@Home');
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
Route::post('/addAntro', 'patientController@addAntros');
Route::get('/Kesihatan', 'patientController@addkesihatan');
Route::get('/ubat', 'patientController@addubat');
Route::get('/updatespk', 'patientController@updatespk');
Route::get('/update', 'patientController@updatePatient');
Route::get('/delete/{patientId}', 'patientController@Deleteshow');
Route::post('/delete', 'patientController@processDelete');

Route::get('/patientList', 'patientController@patientList');
Route::get('/searchPatient', 'patientController@searchPatient');


// Patient Daily Diet
Route::get('/dailyDiet/{patientId}', 'patientController@getpatientDetails');
Route::get('/getDailyDietDetails', 'dailydietViewController@process');
Route::get('/addTreatment/{patientId}', 'patientController@addTreatment');

//view visualize patient - yusna
Route::get('/nso/patientSummary', 'patientSummaryController@show');
Route::get('google-piechart',array('as'=>'/nso/patientSummary','uses'=>'patientSummaryController@pieChart'));

//Print pdf - yusna 
Route::get('/pdfPatientInformation/{patientId}', 'PDFController@pdfPatientInformation');
Route::post('/pdfPatientInformation', 'PDFController@processPdfPatientInformation');
Route::get('pdfPatientInformation/{patientId}',array('as'=>'pdfPatientInformation','uses'=>'PDFController@pdfPatientInformation'));

//Patient Inbody
Route::post('/inbody', 'patientInfoController@inbodyPro');
Route::get('/inbody/{id}/{date}', 'patientInfoController@inbodyResult');

/*
*
PATIENT VIEW
*
*/
Route::get('/patient/info', 'userController@show');
Route::get('/patient/info/update', 'userController@updatePatient');

Route::get('/calenderPatient', 'patientHomeController@calender');
Route::get('/schedule_Details', 'userController@showScheduleUser');
Route::get('/scheduleU', 'userController@schedule');

//User Inbody
Route::get('patient/inbody/{id}/{date}', 'patientInfoController@inbodyResultPatient');


//Daily Diet
Route::get('/nso/adddailydiet','patientController@getDiet');
Route::get('/nso/addDaily','patientController@addDiet');
Route::post('/nso/insert_patient','nsoController@insertPatientBasic');
Route::post('/nso/insert_patientMed','nsoController@insertPatientMed');


Route::get('/DailyDiet_Details', 'patientController@getdailyDiet');
Route::get('/getDailyDietDetails', 'dailydietViewController@process');
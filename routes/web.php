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
// =========  Admin Home Route =======
// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/','HomeController@index');
Route::get('/home','HomeController@home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/// Create Question Route With Controller 

Route::get('/addquestion','QuestionController@addquestion')->name('admin.addquestion');
Route::post('/questionpost','QuestionController@questionpost')->name('admin.question.posts');
Route::get('/question_active/{question_id}','QuestionController@question_active')->name('admin.question_active');
Route::get('/edit_question/{question_id}','QuestionController@edit_question')->name('admin.edit_question');
Route::post('/edit_questionpost','QuestionController@edit_questionpost')->name('admin.edit_questionpost');
Route::get('/delete_question/{question_id}','QuestionController@delete_question')->name('admin.delete_question');

// Create Question Route With Controller 
Route::post('/answerpost','AnswerController@answerpost')->name('user.answerpost');
// Create  View Answer and Question route and Controller
Route::get('/view_answer','QuestionViewController@view_answer')->name('user.view_answer');
// Create User Route and controller 
Route::get('/users','HomeController@users')->name('admin.users');
Route::get('/banks','HomeController@banks');
// ===== Delete User Route and Controller ===== //
Route::get('/user_delete/{user_id}','HomeController@user_delete')->name('admin.user_delete');
Route::get('/admin','HomeController@admin')->name('admin');
// =====  User Edit Route and Controller ===== //
Route::get('/user_edit/{user_id}','HomeController@user_edit')->name('admin.user_edit');
Route::post('/edit_user_post','HomeController@edit_user_post')->name('admin.edit_user_post');
// Add User method and controller 
Route::get('/add_user','AddUserController@index')->name('admin.add_user');
Route::post('/userpost','AddUserController@userpost')->name('admin.userpost');
// ==== Create Edit Profile Route and Controller ==== ///

Route::get('/editprofile','HomeController@editprofile')->name('admin.editprofile');
Route::post('/editprofilepost','HomeController@editprofilepost')->name('admin.editprofilepost');

// ============= Create Category Route and Controller =====//
Route::get('/category','CategoryController@index')->name('admin.category');
Route::post('/categorypost','CategoryController@categorypost')->name('admin.categorypost');
Route::get('/active_category/{category_id}','CategoryController@active_category')->name('admin.active_category');
Route::get('/edit_category/{category_id}','CategoryController@edit_category')->name('admin.edit_category');
Route::post('/edit_categorypost','CategoryController@edit_categorypost')->name('admin.edit_categorypost');
Route::get('/delete_category/{category_id}','CategoryController@delete_category')->name('admin.delete_category');
// ========== Create Route and Controller For App Info ==========//
Route::get('/appinfo','AppInfoController@index')->name('admin.appinfo');
Route::post('/appinfopost','AppInfoController@appinfopost')->name('admin.appinfopost');
Route::get('/active_app/{app_id}','AppInfoController@active_app')->name('admin.active_app');
Route::get('/edit_app/{app_id}','AppInfoController@edit_app')->name('admin.edit_app');
Route::post('/editinfopost','AppInfoController@editinfopost')->name('admin.editinfopost');
Route::get('/delete_app/{app_id}','AppInfoController@delete_app')->name('admin.delete_app');
// ==========  Front Page Cart Controller and Route =========/
// Route::get('/frontcart','DashboardController@frontcart')->name('front.user.cart');
// Route::get('/frontcheckout','DashboardController@frontcheckout')->name('front.user.checkout');
// ============= Bank Sample Info Route ==============//
Route::get('/bank/home','BankInformationController@bank_home');
Route::post('/file_post','BankInformationController@file_post');
Route::get('/bank_ca_personal_details','BankInformationController@bank_ca_personal_details')->name('bank_ca_personal_details');
Route::get('/bank_cs_personal_details','BankInformationController@bank_cs_personal_details')->name('bank_cs_personal_details');
Route::post('/personal_post','BankInformationController@personal_post');
Route::get('/cs_employee_details','BankInformationController@cs_employee_details');
Route::post('/employee_details_post','BankInformationController@employee_details_post');

Route::get('/personal_details','BankInformationController@personal_details');
Route::post('/bank_sample_post','BankInformationController@bank_sample_post');

// ======== guarantor Details ==========//
Route::get('/bank_cs_gurantor_details','BankInformationController@bank_cs_gurantor_details');
Route::post('/guarantor_details_post','BankInformationController@guarantor_details_post');
// ======== BANk CS STATEMENT WITHDRAWAL ======/
Route::get('/bank_cs_statement_withdrawal','BankInformationController@bank_cs_statement_withdrawal');
Route::post('/bank_statement_details_post','BankInformationController@bank_statement_details_post');

// ========== CHeck CA OR CS =========== // 

Route::get('/view_cs_ca/{assign_id}','AssignSurveyController@view_cs_ca');



// =========== Assign Survey  ============== //
Route::get('/assign_survey','AssignSurveyController@index');
Route::get('/add_assign','AssignSurveyController@add_assign');
Route::post('/assign_post','AssignSurveyController@assign_post');
Route::get('/edit_assign/{assign_id}','AssignSurveyController@edit_assign');
Route::post('/edit_assign_post','AssignSurveyController@edit_assign_post');
Route::get('/delete_assign/{assign_id}',"AssignSurveyController@delete_assign");
// =========== User Asign List ============= //
Route::get('/assign_list','AssignListController@assign_list');


//  CA File For Admin
Route::post('/personal_ca_post','BankInformationCaController@personal_ca_post');
Route::get('/ca_employee_details','BankInformationCaController@ca_employee_details');
Route::post('/employment_ca_post','BankInformationCaController@employment_ca_post');
Route::get('/ca_bank_statement','BankInformationCaController@ca_bank_statement');
Route::post('/bank_statement_ca_post','BankInformationCaController@bank_statement_ca_post');


// Assign Survey file //

Route::get('/update_assign_file/{assign_id}','UpdateCSPersonalController@update_assign_file');
Route::post('/update_cs_personal_post','UpdateCSPersonalController@update_cs_personal_post');
// Update CS Employment Details
Route::get('/update_cs_employment_details','UpdateCSPersonalController@update_cs_employment_details');
Route::post('/update_cs_employment_post','UpdateCSPersonalController@update_cs_employment_post');
Route::get('/guarantor_details','UpdateCSPersonalController@guarantor_details');
Route::post('/update_guarantor_details_post','UpdateCSPersonalController@update_guarantor_details_post');
Route::get('/bank_statement_details','UpdateCSPersonalController@bank_statement_details');
Route::post('/update_bank_statement_details_post','UpdateCSPersonalController@update_bank_statement_details_post');
// Route::get('/cs_photo','UpdateCSPersonalController@cs_photo');

Route::post('/cs_photo_post','UpdateCSPersonalController@cs_photo_post');

// UPDATE CA FILE //
Route::post('/update_personal_ca_post','UpdateCAController@update_personal_ca_post');
Route::get('/update_employment_ca','UpdateCAController@update_employment_cs');
Route::post('/update_employment_ca_post','UpdateCAController@update_employment_ca_post');
Route::post('/update_bank_statement_ca_post','UpdateCAController@update_bank_statement_ca_post');
Route::post('/ca_photo_post','UpdateCAController@ca_photo_post');

Route::get('/report/{file_id}','ReportController@report');
Route::get('/download/{file_id}','ReportController@download');
// Download Export CSV File
Route::get('export', 'ExportController@export')->name('export');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// ===============   Create Zone    ============== 
Route::get('/zone','ZoneController@zone')->name('zone');
Route::post('/zone_post','ZoneController@zone_post')->name('zone_post');
Route::get('/view_zone','ZoneController@view_zone')->name('view_zone');
Route::get('/active_zone/{zone_id}','ZoneController@active_zone')->name('active_zone');
Route::get('/edit_zone/{zone_id}','ZoneController@edit_zone')->name('edit_zone');
Route::post('/edit_zone_post','ZoneController@edit_zone_post')->name('edit_zone_post');
Route::get('/delete_zone/{zone_id}','ZoneController@delete_zone')->name('delete_zone');

// File Upload 

Route::get('import-excel', 'FileUploadController@index');
Route::post('import-excel', 'FileUploadController@import');
Route::get('/delete_file_cs/{file_id}','FileUploadController@delete_file_cs');

// CS personal photo post

Route::post('/cs_personal_photo_post','UpdateCSPersonalController@cs_personal_photo_post');
Route::post('/cs_employment_photo_post','UpdateCSPersonalController@cs_employment_photo_post');
Route::post('/cs_guarantor_photo_post','UpdateCSPersonalController@cs_guarantor_photo_post');

// CA Photo Post
Route::post('/ca_personal_photo_post','UpdateCAController@ca_personal_photo_post');
Route::post('/ca_employment_photo_post','UpdateCAController@ca_employment_photo_post');
// Client Enquiry Form
Route::get('/cef','ClientEnquiryController@create');
Route::post('/sent_enquiry','ClientEnquiryController@sent_enquiry');
Route::get('/view_enquiry','ClientEnquiryController@view_enquiry');
Route::get('/delete_enquiry/{enquiry_id}','ClientEnquiryController@delete_enquiry');

Route::get('/get/area','AssignSurveyController@get_area');
Route::get('/get/area/edit','AssignSurveyController@get_area_edit');
Route::get('getEmployees/{id}','AssignSurveyController@getEmployees');
// Create Zone
Route::get('/create_zone','SelectZoneController@create_zone')->name('create_zone');
Route::post('/create_zone_post','SelectZoneController@create_zone_post')->name('create_zone_post');
Route::get('/zone_view','SelectZoneController@zone_view')->name('zone_view');
Route::get('/create_active_zone/{zone_id}','SelectZoneController@create_active_zone')->name('create_active_zone');
Route::get('/create_edit_zone/{zone_id}','SelectZoneController@create_edit_zone')->name('create_edit_zone');
Route::post('/create_edit_zone_post','SelectZoneController@create_edit_zone_post')->name('create_edit_zone_post');
Route::get('/create_delete_zone/{zone_id}','SelectZoneController@create_delete_zone')->name('create_delete_zone');

// Update Survey V1

// File Name Upload 

// Route::get('assign_survey', 'AssignFileUploadController@index');
Route::post('import-file', 'AssignFileUploadController@import');
Route::get('/delete_file/{file_id}','AssignFileUploadController@delete_file');

Route::get('/active_task/{id}','AssignSurveyController@active_task');

// Update V2

Route::get('/complete_files','FileStatusController@complete_files');
Route::get('/incomplete_files','FileStatusController@incomplete_files');

// File Create
Route::get('/file_create','FileCreateController@file_create');

// File Upload 

Route::get('import-excel_ca', 'FileUploadCAController@index');
Route::post('import-excel_ca_post', 'FileUploadCAController@import');
Route::get('/delete_file_ca/{file_id}','FileUploadCAController@delete_file_ca');

// Show Report
Route::get('/show_report/{id}','ReportController@show_report');

// Notification
Route::get('/update_notification_file/{id}','ReportController@update_notification_file');
Route::get('/update_ca_notification_file/{id}','ReportController@update_ca_notification_file');
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
/*use App\Http\Controllers\MailSendController;
use App\Http\Controllers\PasswordController;
*/
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*コントローラー不要 viewを返すだけのもの*/
Route::get('/', function () {
  return view('top');
});
Route::get('/top/faq', function () {
  return view('top.faq');
});
Route::get('/top/signup', function () {
  return view('top.signup');
});
Route::get('/login_logout/reset_request', function () {
  return view('login_logout.reset_request');
});
Route::get('/login_logout/login', function () {
  return view('login_logout.login');
});
Route::get('/login_logout/stylist_login', function () {
  return view('login_logout.stylist_login');
});
Route::get('/contact/contact', function () {
  return view('contact.contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*美容師*/
Route::post('/stylist/stylist_comp',[Controller::class,'showStylistComp']);
Route::get('/stylist/stylist_home',[Controller::class,'showStylistHome']);
Route::get('/stylist/reservation_history',[Controller::class,'showStylistReservationHistory']);
Route::get('/stylist/schedule_add',[Controller::class,'addSchedule']);
Route::get('/stylist/profile_edit',[Controller::class,'showProfileEdit']);
Route::post('/stylist/user_memo',[Controller::class,'editUserMemo']);
Route::post('/stylist/reservation_cancel',[Controller::class,'showCancelReservation']);
Route::get('/stylist/schedule_list',[Controller::class,'showScheduleList']);

/*ユーザー*/
Route::post('/user/user_comp',[Controller::class,'showUserComp']);
Route::get('/user/user_home',[Controller::class,'showUserHome']);
Route::post('/user/reservation_confirm',[Controller::class,'confirmRservation']);
Route::get('/user/reservation_history',[Controller::class,'showReservationHistory']);
Route::post('/user/comment_change',[Controller::class,'showCommentChange']);
Route::post('/user/reservation',[Controller::class,'showReservation']);
Route::get('/user/reservation',[Controller::class,'showReservation']);
Route::get('/user/user_profile_edit',[Controller::class,'showUserProfileEdit']);

/*管理者*/
Route::post('/admin/admin_comp',[Controller::class,'showAdminComp']);
Route::get('/admin/admin_home',[Controller::class,'showAdminHome']);
Route::post('/admin/admin_home',[Controller::class,'showAdminHome']);
Route::post('/admin/reservation_detail',[Controller::class,'showReservationDetail']);
Route::get('/admin/stylist_list',[Controller::class,'showStylistList']);
Route::get('/admin/member_list',[Controller::class,'showUserList']);
Route::get('/admin/contact_list',[Controller::class,'showInquiryList']);
Route::post('/admin/contact_detail',[Controller::class,'showInquiryDetail']);
Route::post('/admin/reply_confirm',[Controller::class,'confirmReplyDetail']);

/*トップ*/
Route::post('/top/signup_confirm',[Controller::class,'confirmUserRegister']);
Route::post('/top/signup_comp',[Controller::class,'showUserRegistrationComp']);
Route::get('/top/stylist_signup',[Controller::class,'showStylistRegister']);
Route::post('/top/stylist_signup_confirm',[Controller::class,'confirmStylistRegister']);

/*ログイン・ログアウト*/
Route::post('/login_logout/login',[Controller::class,'confirmPossibleToLogin']);
Route::get('/login_logout/logout_comp',[Controller::class,'showLogoutComp']);
Route::post('/login_logout/stylist_login',[Controller::class,'stylistConfirmPossibleToLogin']);
Route::post('/login_logout/pass_reset_comp',[Controller::class,'showPasswordResetComp']);
Route::get('/login_logout/pass_reset_confirm',[Controller::class,'showPasswordReset']);
Route::post('/login_logout/pass_mailsend_comp',[Controller::class,'sendEmailReset']);


/*contact*/
Route::post('/contact/confirm',[Controller::class,'confirmInquiryDetail']);
Route::post('/contact/complete',[Controller::class,'showInquiryComp']);

<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Bet\BetHandlerController;
use App\Http\Controllers\Contacts\ContactUsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Games\GamesController;
use App\Http\Controllers\NewsLetter\NewsLetterController;
use App\Http\Controllers\Payments\PaystackPaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sports\SportsController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Withdrawal\WithdrawalController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SportsController::class, 'landingPage']);

Route::get('/faq', [Controller::class, 'faqPage'])->name('faq');
Route::get('/affiliate', [Controller::class, 'affiliatePage'])->name('affiliate');
Route::get('/about-us', [Controller::class, 'aboutPage'])->name('about-us');
Route::get('/terms-conditions', [Controller::class, 'termsConditionsPage'])->name('terms-conditions');
Route::get('/privacy-policy', [Controller::class, 'privacyPolicyPage'])->name('privacy-policy');

//contact us section
Route::get('/contact-us', [ContactUsController::class, 'contactPage'])->name('contact-us');
Route::post('/contact-us', [ContactUsController::class, 'sendContactMail'])->name('contact-us');

//newsletter section
Route::post('/subscribe-newsletter', [NewsLetterController::class, 'subscribeNewsletter'])->name('subscribe-newsletter');

Route::prefix('sports')->group(function () {
    Route::get('/all/{id?}', [SportsController::class, 'allSportsPage'])->name('all');
    Route::get('/league-all/{id?}', [SportsController::class, 'sportsLeague'])->name('league-all');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboard');

    //verify user account details
    Route::post('/verify-bank-number', [DashboardController::class, 'verifyAccountNumber'])->name('verify-bank-number');
    Route::post('/update-bank-details', [DashboardController::class, 'updateUserPaymentDetails'])->name('update-bank-details');

    //profile settings section
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-update', [ProfileController::class, 'update'])->name('profile-update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/update-profile-photo', [ProfileController::class, 'updateUserProfilePhoto'])->name('update-profile-photo');


    Route::post('/update-password', [PasswordController::class, 'update'])->name('update-password');


    //payment section
    Route::post('/iniate-payment', [PaystackPaymentController::class, 'iniatePaystackPayment'])->name('iniate-payment');
    Route::get('/verify-payment', [PaystackPaymentController::class, 'verifyPaystackPayment'])->name('verify-payment');


    Route::get('/notifications/{id?}', [ProfileController::class, 'readNotifications'])->name('notifications');

    Route::get('/open-bets/{id?}', [BetHandlerController::class, 'openBetsInterface'])->name('open-bets');

    //withdrawal section
    Route::post('/create-withdrawal', [WithdrawalController::class, 'createWithdrawal'])->name('create-withdrawal');
    
});

Route::middleware(['auth', 'isadmin'])->group(function () {
    //admin
    Route::get('/admin-dashboard', [AdminDashboard::class, 'adminMainPage'])->name('admin-dashboard');
    Route::get('/view-categories', [AdminDashboard::class, 'viewCategoryPage'])->name('view-categories');
    Route::get('/create-league', [AdminDashboard::class, 'leaguePage'])->name('create-league');
    Route::post('/create-league', [AdminDashboard::class, 'storeNewLeague'])->name('create-league');
    Route::patch('/update-league/{id?}', [AdminDashboard::class, 'updateLeague'])->name('update-league');

    //bet for admin section
    Route::get('/bets-history/{option?}', [AdminDashboard::class, 'openBetInterface'])->name('bets-history');


    Route::get('/view-teams', [AdminDashboard::class, 'teamPage'])->name('view-teams');
    Route::post('/create-team', [AdminDashboard::class, 'storeNewTeam'])->name('create-team');
    Route::patch('/update-team/{id?}', [AdminDashboard::class, 'updateTeam'])->name('update-team');

    //handle games section
    Route::get('/select-league', [GamesController::class, 'gameInterface'])->name('select-league');
    Route::get('/create-games/{id?}', [GamesController::class, 'creatGameInterface'])->name('create-games');
    Route::post('/create-game', [GamesController::class, 'creatNewGame'])->name('create-game');
    Route::get('/view-games/{status?}', [GamesController::class, 'viewGameInterface'])->name('view-games');
    Route::patch('/end-game', [GamesController::class, 'endOngoingGame'])->name('end-game');

    //view / process withdraw request
    Route::get('/withdraw-request', [WithdrawalController::class, 'withdrawalRequest'])->name('withdraw-request');
    Route::get('/verify-transfer', [WithdrawalController::class, 'verifyTransferInterface'])->name('verify-transfer');
    Route::post('/single-transfer', [WithdrawalController::class, 'processSingleTransfer'])->name('single-transfer');
    Route::post('/verify-otp', [WithdrawalController::class, 'verifyOTP'])->name('verify-otp');
    Route::post('/delete-withdrawal', [WithdrawalController::class, 'deleteWithdrawal'])->name('delete-withdrawal');

    //transactions section
    Route::get('/transactions', [WithdrawalController::class, 'transactionInterface'])->name('transactions');
    Route::post('/delete-trans', [WithdrawalController::class, 'deleteTransaction'])->name('delete-trans');

});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use App\View\Components\admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// users controllor
Route::middleware('auth', 'verified')->group(function () {
    // dashboard
    Route::get('/dashboard', [userController::class, 'view'])->name('dashboard');


    // deposit
    Route::get('/dashboard/deposit', [userController::class, 'deposit'])->name('user.deposit');
    Route::post('/dashboard/deposit', [userController::class, 'deposits'])->name('user.deposits');
    // deposit history
    Route::get('/dashboard/deposithistory', [userController::class, 'deposithistory'])->name('deposithis');


    // withdrawal
    Route::get('/dashboard/withdrawal', [userController::class, 'withdrawal'])->name('user.withdraw');
    Route::post('/dashboard/withdrawal', [userController::class, 'withdrawals'])->name('user.withdraws');
    // withdrawal history
    Route::get('/dashboard/withdrawalhistory', [userController::class, 'withdrawalhistory'])->name('withdrawhis');




    // invest
    Route::get('/dashboard/invest', [userController::class, 'invest'])->name('user.invest');
    Route::post('/dashboard/invest', [userController::class, 'invests'])->name('user.invests');

    // invest history
    Route::get('/dashboard/investhistory', [userController::class, 'investhistory'])->name('investhis');

    Route::get('/dashboard/course', [userController::class, 'course'])->name('course');
    Route::get('/dashboard/coursehisotry', [userController::class, 'coursehistory'])->name('course.history');
    Route::post('/dashboard/coursestore', [userController::class, 'coursestore'])->name('course.store');

    Route::get('/dashboard/signal', [userController::class, 'signal'])->name('signal');
    Route::get('/dashboard/signalhisotry', [userController::class, 'signalhistory'])->name('signal.history');
    Route::post('/dashboard/signalstore', [userController::class, 'signalstore'])->name('signal.store');

    Route::get('/dashboard/copytrade', [userController::class, 'copytrade'])->name('copytrade');

    Route::get('/dashboard/loan', [userController::class, 'loan'])->name('loan');
    Route::get('/dashboard/loanhistory', [userController::class, 'loanhistory'])->name('loan.history');
    Route::post('/dashboard/loanstore', [userController::class, 'loanstore'])->name('loan.store');


    // admin routes

    Route::get('/admin/dashboard/admin', [adminController::class, 'dashboard'])->name('admin.board');
    Route::get('/admin/dashboard/userdetail/{user}', [adminController::class, 'user'])->name('admin.user');
    Route::delete('/admin/dashboard/userdetails/{user}', [adminController::class, 'users'])->name('admin.delete');
    Route::post('/admin/dashboard/userdetail/{user}/update-balance', [adminController::class, 'updatebalance'])->name('admin.update_balance');




    Route::get('/admin/dashboar/copy', [adminController::class, 'copy'])->name('admin.copy');

    Route::get('/admin/dashboard/admin/course', [adminController::class, 'course'])->name('admin.course');
    Route::post('/admin/dashboard/admin/courses', [adminController::class, 'admincourse'])->name('admin.courses.store');
    Route::get('/admin/course-histories', [adminController::class, 'courseHistories'])->name('admin.course-histories');
    Route::put('/admin/course-histories/{courseHistory}/status', [adminController::class, 'updateCourseHistoryStatus'])->name('admin.course-histories.updateStatus');

    Route::get('/admin/dashboard/admin/deposit', [adminController::class, 'deposit'])->name('admin.deposit');
    Route::put('/admin/deposits/{deposit}/status', [AdminController::class, 'updatestatus'])->name('admin.deposits.updateStatus');

    Route::get('/admin/dashboard/investment', [adminController::class, 'investment'])->name('admin.investment');
    Route::post('/admin/dashboard/investmentplans', [adminController::class, 'storeInvestmentPlan'])->name('admin.investmentplans.store');

    Route::get('/admin/dashboard/admin/loan', [adminController::class, 'loan'])->name('admin.loan');
    Route::post('/admin/dashboard/admin/loans', [adminController::class, 'adminloan'])->name('admin.store');
    Route::get('/admin/loan-histories', [AdminController::class, 'loanHistories'])->name('admin.loan-histories');
    Route::put('/admin/loan-histories/{loanHistory}/status', [AdminController::class, 'updateLoanHistoryStatus'])->name('admin.loan-histories.updateStatus');

    Route::get('/admin/dashboard/plan', [adminController::class, 'plan'])->name('admin.plan');

    Route::get('/admin/dashboard/admin/signal', [adminController::class, 'signal'])->name('admin.signal');
    Route::post('/admin/dashboard/admin/signal', [adminController::class, 'adminsignal'])->name('admin.signals.store');
    Route::get('/admin/signal-histories', [adminController::class, 'signalHistories'])->name('admin.signal-histories');
    Route::put('/admin/signal-histories/{signalHistory}/status', [adminController::class, 'updateSignalHistoryStatus'])->name('admin.signal-histories.updateStatus');


    Route::get('/admin/dashboard/admin/withdrawal', [adminController::class, 'withdraw'])->name('admin.withdraw');
    Route::put('/admin/withdrawals/{withdrawal}/status', [adminController::class, 'withdrawStatus'])->name('admin.withdrawals.updateStatus');

    Route::get('/admin/dashboard/address', [adminController::class, 'address'])->name('admin.address');
    Route::post('/admin/dashboard/cryptoaddresses', [adminController::class, 'storeCryptoAddress'])->name('admin.cryptoaddresses.store');



    Route::delete('/admin/dashboard/signals/{id}', [adminController::class, 'deleteSignal'])->name('admin.signals.delete');
    Route::delete('/admin/dashboard/loans/{id}', [adminController::class, 'deleteLoan'])->name('admin.loans.delete');
    Route::delete('/admin/dashboard/courses{id}', [adminController::class, 'deleteCourse'])->name('admin.courses.delete');
    Route::delete('/admin/dashboard/investments/{id}', [adminController::class, 'deleteInvestment'])->name('admin.investments.delete');
    Route::delete('/admin/dashboard/cryptoaddresses/{id}', [adminController::class, 'destroyaddress'])->name('cryptoaddress.destroy');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
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
    Route::post('/dashboard/coursestore', [userController::class, 'coursestore'])->name('course.store');

    Route::get('/dashboard/signal', [userController::class, 'signal'])->name('signal');
    Route::post('/dashboard/signalstore', [userController::class, 'signalstore'])->name('signal.store');

    Route::get('/dashboard/copytrade', [userController::class, 'copytrade'])->name('copytrade');

    Route::get('/dashboard/loan', [userController::class, 'loan'])->name('loan');
    Route::post('/dashboard/loanstore', [userController::class, 'loanstore'])->name('loan.store');


    // admin routes

    Route::get('/dashboard/admin', [adminController::class, 'dashboard'])->name('admin.board');
    Route::get('/dashboard/userdetail/{user}', [adminController::class, 'user'])->name('admin.user');
    Route::delete('/dashboard/userdetails/{user}', [adminController::class, 'users'])->name('admin.delete');
    Route::post('/dashboard/userdetail/{user}/update-balance', [adminController::class, 'updatebalance'])->name('admin.update_balance');


    Route::post('/dashboard/cryptoaddresses', [adminController::class, 'storeCryptoAddress'])->name('admin.cryptoaddresses.store');


    Route::get('/dashboar/copy', [adminController::class, 'copy'])->name('admin.copy');

    Route::get('/dashboard/admin/course', [adminController::class, 'course'])->name('admin.course');

    Route::get('/dashboard/admin/deposit', [adminController::class, 'deposit'])->name('admin.deposit');
    Route::put('/deposits/{deposit}/status', [AdminController::class, 'updatestatus'])->name('admin.deposits.updateStatus');

    Route::get('/dashboard/investment', [adminController::class, 'investment'])->name('admin.investment');
    Route::post('/dashboard/investmentplans', [adminController::class, 'storeInvestmentPlan'])->name('admin.investmentplans.store');

    Route::get('/dashboard/admin/loan', [adminController::class, 'loan'])->name('admin.loan');

    Route::get('/dashboard/plan', [adminController::class, 'plan'])->name('admin.plan');

    Route::get('/dashboard/admin/signal', [adminController::class, 'signal'])->name('admin.signal');


    Route::get('/dashboard/admin/withdrawal', [adminController::class, 'withdraw'])->name('admin.withdraw');
    Route::put('/withdrawals/{withdrawal}/status', [adminController::class, 'withdrawStatus'])->name('admin.withdrawals.updateStatus');

    Route::get('/dashboard/address', [adminController::class, 'address'])->name('admin.address');
});

require __DIR__ . '/auth.php';

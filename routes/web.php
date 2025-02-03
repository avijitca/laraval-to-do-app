<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\UserController;
Route::resource('users', UserController::class);
Route::get('/download/pdf', [UserController::class, 'downloadPdf'])->name('users.pdf');
Route::get('/login',[UserController::class,'showLoginForm'])->name('login');
Route::post('/submit/login',[UserController::class,'login'])->name('login.submit');
Route::post('/logout',[UserController::class,'logout'])->name('logout');


// Testing the routes
Route::get('/test/testroutes', [UserController::class, 'testRoute'])->name('users.testroutes');


// debugging technique
/* use Barryvdh\DomPDF\Facade\Pdf;
Route::get('/test-pdf', function () {
    $pdf = Pdf::loadHTML('<h1>Test PDF</h1>');
    return $pdf->download('test.pdf');
}); */
Route::get('/users/pdf', function () {
    return 'This route works!';
});

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
Route::get('/download/excel', function () {
    return Excel::download(new UsersExport, 'users.xlsx');
})->name('users.excel');


// Task management
use App\Http\Controllers\TaskController;
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
});

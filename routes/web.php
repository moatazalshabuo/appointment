<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\UsersController;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/', function () {
    return redirect()->route("login");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(["auth"]);
Route::get("/profile", [HomeController::class, "profile"])->name("profile")->middleware(["auth"]);
Route::post("/api/edit/user", [HomeController::class, "update"])->name("edituser")->middleware(["auth"]);
Route::get("appointment", [\App\Http\Controllers\HomeController::class, "appointment"])->name("appointemt")->middleware(["auth"]);
Route::get("appointment/{type}", [\App\Http\Controllers\HomeController::class, "appointment_type"])->name("appointemt-type");

Route::controller(TodolistController::class)->group(function () {
    Route::middleware(["auth"])->group(function () {
        Route::post("api/save", "save");
        Route::get("api/todo/{id}", "Data");
        Route::post("api/edit", "edit")->name("edit.event");
        Route::get('api/delete/event/{id}', 'delete')->name('delete.event');
        Route::get("api/Appointment/{id}", "getAppointment")->name("getAppointment");
        Route::get("api/Appointment1/{id}", "getAppointment1")->name("getAppointment1");
    });
});

Route::get('not-active', function () {
    if (Auth::user()->status == 1) {
        return redirect()->route("home");
    }
    return view('public/notActive');
})->name('not.active')->middleware('auth');
Route::get('notifications', function () {
    // Auth::user()->Notifications;
    return response()->json(['noty' => Auth::user()->Notifications, 'count' => count(Auth::user()->unreadNotifications)]);
})->name("notifications")->middleware(["auth"]);

Route::get("seen", function () {
    Auth::user()->unreadNotifications->markAsRead();
})->name("seen.notifications")->middleware(["auth"]);

Route::controller(UsersController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('users', 'index')->name('user');
        Route::get('active/user/{id}', "active")->name('active');
        Route::get('unactive/user/{id}', "unactive")->name('unactive');
    });
});

Route::post('check-date',[TodolistController::class,'checkDate'])->name('check_date');

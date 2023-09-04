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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(["auth",'active']);
Route::get("/profile",[HomeController::class,"profile"])->name("profile")->middleware(["auth",'active']);
Route::post("/api/edit/user",[HomeController::class,"update"])->name("edituser")->middleware(["auth",'active']);
Route::get("appointment", [\App\Http\Controllers\HomeController::class, "appointment"])->name("appointemt")->middleware(["auth",'active']);
Route::controller(TodolistController::class)->group(function () {
    Route::middleware(["auth",'active'])->group(function () {
        Route::post("api/save", "save");
        Route::get("api/todo/{id}", "Data");
        Route::post("api/edit", "edit")->name("edit.event");
        Route::get('api/delete/event/{id}', 'delete')->name('delete.event');
        Route::get("api/Appointment/{id}", "getAppointment")->name("getAppointment");
    });
});

Route::get('not-active', function(){
    if(Auth::user()->status == 1)
    {
        return redirect()->route("home");
    }
    return view('public/notActive');
})->name('not.active')->middleware('auth');
Route::get('notifications', function () {
    // Auth::user()->Notifications;
    return response()->json(['noty' => Auth::user()->Notifications, 'count' => count(Auth::user()->unreadNotifications)]);
})->name("notifications")->middleware(["auth",'active']);

Route::get("seen",function(){
    Auth::user()->unreadNotifications->markAsRead();
})->name("seen.notifications")->middleware(["auth",'active']);

Route::controller(UsersController::class)->group(function(){
    Route::middleware(['auth', 'active'])->group(function () {
        Route::get('users', 'index')->name('user');
        Route::get('active/user/{id}',"active")->name('active');
        Route::get('unactive/user/{id}',"unactive")->name('unactive');
    });
});

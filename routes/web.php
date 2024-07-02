<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');                                    

});

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
    Route::post('/agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');
    Route::get('/agent/change/password', [AgentController::class, 'AgentChangePassword'])->name('agent.change.password');   
    Route::post('/agent/update/password', [AgentController::class, 'AgentUpdatePassword'])->name('agent.update.password');    
    Route::get('/agent/properties/history', [PropertyController::class, 'history'])->name('agent.properties.history');
    Route::get('/agent/properties/history', [PropertyController::class, 'history'])->name('agent.properties.history');
    Route::delete('/agent/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');
          
});




Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/dashboard', [PropertyController::class, 'index'])->name('dashboard');
Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
Route::get('/filter-properties', [PropertyController::class, 'filter'])->name('user.filter.properties');
Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');   
Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');              


Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');


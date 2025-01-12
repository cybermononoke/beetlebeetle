<?php
use Illuminate\Support\Facades\Route;

use App\Livewire\Welcome;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;

use App\Livewire\Emails\EmailIndex;

use Illuminate\Support\Facades\Auth;
use App\Livewire\Notifications\NotifIndex;

use App\Livewire\Centers\CenterDashboard;
use App\Livewire\Centers\CenterLogin;


use App\Livewire\Admin\AdminDashboard;


Route::get('/', Welcome::class);

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class);

Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
});


Route::middleware('auth')->group(function () {
    Route::get('/emails', EmailIndex::class);
    Route::get('/notifications', NotifIndex::class);
});

// make a specific centers middleware for these
Route::get('/centers/login', CenterLogin::class)->name('centers.login');
Route::get('/centers/dashboard', CenterDashboard::class)->name('centers.dashboard');



// make an admin middleware for these
Route::get('/admin/dashboard', AdminDashboard::class)->name('admins.dashboard');
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationAcceptController;
use App\Http\Controllers\SuperAdmin\InvitationController as SuperAdminInvitationController;
use App\Http\Controllers\Admin\InvitationController as AdminInvitationController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\Admin\TeamMemberController;

Route::get('/', function () {

    if(auth()->check()) {

        $user = auth()->user();

        if($user->role === 'super_admin') {
            return redirect()->route('super-admin.dashboard');
        }

        if($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('member.dashboard');
    }

    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('super-admin')->name('super-admin.')
        ->middleware(['role:super_admin'])
        ->group(function () {
            
            Route::get('/dashboard',[SuperAdminDashboardController::class,'index'])->name('dashboard');

            Route::get('/invite-client',[SuperAdminInvitationController::class,'create'])->name('invite-client');

            Route::post('/invite-client',[SuperAdminInvitationController::class,'store'])->name('store-client');

        });

    Route::prefix('admin')->name('admin.')
        ->middleware(['role:admin'])
        ->group(function () {

            Route::get('/dashboard',[AdminDashboardController::class,'index'])
                ->name('dashboard');

            Route::get('/invitations',[AdminInvitationController::class,'index'])
                ->name('invitations.index');

            Route::get('/invitations/create',[AdminInvitationController::class,'create'])
                ->name('invitations.create');

            Route::post('/invitations',[AdminInvitationController::class,'store'])
                ->name('invitations.store');
            
            /* short urls */
            Route::get('/short-urls', [ShortUrlController::class, 'index'])
                ->name('short-urls.index');

            Route::get('/short-urls/create', [ShortUrlController::class, 'create'])
                ->name('short-urls.create');

            Route::post('/short-urls', [ShortUrlController::class, 'store'])
                ->name('short-urls.store');

            Route::get('/team-members', [TeamMemberController::class, 'index'])
                ->name('team-members.index');
            });

            Route::middleware('role:member')
                ->prefix('member')
                ->name('member.')
                ->group(function () {

                Route::get('/dashboard', [MemberDashboardController::class, 'index'])
                    ->name('dashboard');

                Route::get('/short-urls', [ShortUrlController::class, 'index'])
                    ->name('short-urls.index');

                Route::get('/short-urls/create', [ShortUrlController::class, 'create'])
                    ->name('short-urls.create');

                Route::post('/short-urls', [ShortUrlController::class, 'store'])
                    ->name('short-urls.store');
                    
            });

});

Route::get('/invitations/{token}',[InvitationAcceptController::class,'create'])->name('invitations.accept');
Route::post('/invitations/{token}',[InvitationAcceptController::class,'store']);
Route::get('/shorturl/{shortCode}', [ShortUrlController::class, 'redirect'])
    ->name('redirect');
require __DIR__.'/auth.php';

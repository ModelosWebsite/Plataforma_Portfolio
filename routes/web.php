<?php

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . "/site.php";
require __DIR__ . "/account/routes.php";
require __DIR__ . "/admin.php";
require __DIR__ . "/SuperAdmin/routes.php";
require __DIR__ . "/subscription/routes.php";

Route::get('/email/verify/{id}/{hash}', function (Request $request) {
    $auth = Request("id");
    if ($auth != null) {
        
        $user = User::find($auth);
        Auth::login($user);
        $user->email_verified_at = now();
        $user->save();
        return redirect()->route("admin.index",["id"=>auth()->user()->id]);
    }
})->name('verification.verify');
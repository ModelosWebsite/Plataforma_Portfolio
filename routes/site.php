<?php

use App\Http\Controllers\Admin\StatusSiteController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(function(){
    Route::get("/{company}", "index")->name("site.portfolio.index");
    Route::post("/envio/email/client", "sendEmail")->name("site.portfolio.send.email");
    Route::get("/senha", "senha")->name("site.portfolio.senha");
});

Route::controller(StatusSiteController::class)->group(function(){
    Route::get("/site/status", "status")->name("site.status");
});
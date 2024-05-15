<?php

use App\Http\Controllers\SuperAdmin\DocumentationController;
use App\Http\Controllers\SuperAdmin\PacoteController;
use App\Http\Controllers\SuperAdmin\RegisterCompanyController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\TermosController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(SuperAdminController::class)->prefix("/super/admin")->group(function(){
    Route::get("/inicial", "index")->name("super.admin.index");
    Route::get("/contas", "accountView")->name("super.admin.account.view");
});

Route::controller(RegisterCompanyController::class)->prefix("/super/admin")->group(function(){
    Route::post("/registrar/empresa", "companyRegister")->name("super.admin.register.company");
    Route::post("/actualizar/empresa", "companyUpdate")->name("super.admin.update.empresa");
    Route::get("/eliminar/comapany/{companyid}", "deleteCompany")->name("super.admin.delete.company");
});

Route::controller(UserController::class)->prefix("/super/admin")->group(function(){
    Route::get("/utilizadores/lista", "userView")->name("super.admin.user.view");
});

Route::controller(PacoteController::class)->prefix("/super/admin")->group(function(){
    Route::get("/pacote/premium", "mainView")->name("super.admin.pacote.view");
    Route::post("/pacote/store", "store")->name("super.admin.pacote.store");
    Route::post("/pacote/actualizar/{id}", "updatePacote")->name("super.admin.pacote.update");
});

Route::controller(TermosController::class)->prefix("/super/admin")->group(function(){
    Route::get("/politica", "privacyView")->name("super.privacy.view");
    Route::post("/politica/save", "privacyStore")->name("super.privacy.store");
});

Route::controller(DocumentationController::class)->prefix("/super/admin")->group(function(){
    Route::get("/documentação/incial", "index")->name("super.admin.documentation.index");
    Route::post("/documentação/criar", "store")->name("super.admin.documentation.store");
});
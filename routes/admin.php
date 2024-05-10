<?php

use App\Http\Controllers\Admin\ConditionsController;
use App\Http\Controllers\Admin\ConfigSiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//Routes do administrador do site para manipulação
Route::middleware("auth")->controller(AdminController::class)->prefix("/admin/")->group(function(){
    Route::get("index/{id?}", "index")->name("admin.index");
    Route::get("hero/", "heroview")->name("admin.view.hero");
    Route::post("register/", "registerdatas")->name("admin.store.hero");
    Route::get("edit/data/{id}", "edit")->name("admin.edit.data");
    Route::post("update/{id}", "update")->name("admin.update");
    
    Route::get("detail", "detailview")->name("admin.detail");
    Route::post("detail/store", "storeDetail")->name("admin.store.detail");
    Route::post("detaol/{id}", "actualizarDetalhes")->name("admin.detalhes.update");


    Route::get("infowhy", "infowhy")->name("admin.infowhy");
    Route::get("infowhy/edit/{id}", "editwhy")->name("admin.infowhy.edit");
    Route::post("infowhy/update/{id}", "actualizar")->name("admin.infowhy.update");
    Route::post("infowhy/store", "storeinfowhy")->name("store.infowhy");

    //Contacto e Footer
    Route::get("footer", "footer")->name("admin.footer");
    Route::post("contacto", "contactStore")->name("admin.footer.store");
    Route::get("contact/{id}", "editContact")->name("admin.edit.conatct");
    Route::post("contact/update/{id}", "actualizarContact")->name("admin.contact.update");
    
    //Detalhes
    Route::get("admin/datalhes/{id}", "editDetalhes")->name("admin.edit.detalhes");

    //About
    Route::get("about", "about")->name("admin.about");
    Route::post("about/store", "storeAbout")->name("admin.store.about");
    Route::get("about/edit/{id}", "editAbout")->name("admin.edit.about");
    Route::post("about/actualizar/{id}", "actualizarAbout")->name("admin.about.update");
    
    Route::get("service", "viewservice")->name("admin.view.services");
    Route::post("service", "storeservice")->name("admin.store.service");
    Route::get("service/{id}", "editservice")->name("admin.view.edit.service");
    Route::post("actualizar/{id}", "actualizarservice")->name("admin.update.service");

    //Alteração de cores do website
    Route::get("cor", "colorview")->name("anuncio.management.view.color");
    Route::post("cor/save", "storecolor")->name("anuncio.management.store.color");
    Route::post("cor/actualizar", "selectColor")->name("anuncio.management.actualizar.color");
    Route::get("fundo", "imagebackground")->name("anuncio.management.view.fundo");
    Route::post("fundo/save", "imagebackgroundstore")->name("anuncio.management.store.fundo");
    Route::post("fundo/actualizar", "imageactualizar")->name("anuncio.mamnagement.actualizar.fundo");

    Route::post("started/store/", "storeStarted")->name("admin.management.store.started");

    //profile
    Route::get("perfi/", "profileUser")->name("admin.management.user.profile");
    Route::post("perfi/edit/{id}", "updateProfile")->name("admin.management.update.profile");
});

Route::middleware("auth")->controller(ConditionsController::class)->prefix("/admin/")->group(function(){
    Route::get("termos/condições", "conditionsView")->name("admin.conditions.view");
    Route::post("termos/condições/save", "conditionsCreate")->name("admin.conditions.create");
    Route::put('/items/update-status', 'termoStatus')->name('items.updateStatus');
});

Route::controller(LoginController::class)->group(function(){
    Route::get("/login/view", "loginview")->name("anuncio.login.view");
    Route::post("/login", "login")->name("anuncio.login");
    Route::get("/sair", "logout")->name("anuncio.logout");
});

Route::middleware("auth")->controller(ConfigSiteController::class)->group(function(){
    Route::get("/config/site", "configView")->name("admin.config.view");
    Route::put("/config/status", "updateStatus")->name("admin.update.status.company");
});
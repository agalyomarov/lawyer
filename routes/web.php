<?php

use App\Http\Controllers\Admin\EntryController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServiceForSimpleClient;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('home');

Route::group(['prefix' => 'yuridicheskoe-obsluzhivanie-fiz-lic', 'as' => 'serviceForSimpleClient.'], function () {
   Route::get('/', [ServiceForSimpleClient::class, 'index'])->name('index');
   Route::get('/advokat-po-ugolovnym-delam', [ServiceForSimpleClient::class, 'pageAdvokatPoUgalownymDelam'])->name('pageAdvokatPoUgalownymDelam');
   Route::get('/advokat-po-administrativnym-delam', [ServiceForSimpleClient::class, 'pageAdvokatPoAdministrativnymDelam'])->name('pageAdvokatPoAdministrativnymDelam');
   Route::get('/advokat-po-dtp', [ServiceForSimpleClient::class, 'pageAdvokatPoDtp'])->name('pageAdvokatPoDtp');
   Route::get('/vzyskanie-dolgov-s-fizicheskih-lic', [ServiceForSimpleClient::class, 'pageVzyskanieDolgovSFizicheskihLic'])->name('pageVzyskanieDolgovSFizicheskihLic');
});

Route::post('/getentry', [MainController::class, 'getentry']);
Route::get('/getentry', [MainController::class, 'getentry']);



Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
   Route::get('/', [AdminMainController::class, 'index'])->name('home');

   Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
      Route::get('/', [ServiceController::class, 'index'])->name('index');
      Route::get('/create', [ServiceController::class, 'create'])->name('create');
      Route::post('/store', [ServiceController::class, 'store'])->name('store');
      Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');
      Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
      Route::get('/{service}/delete', [ServiceController::class, 'delete'])->name('delete');
   });

   Route::group(['prefix' => 'speciality', 'as' => 'speciality.'], function () {
      Route::get('/', [SpecialityController::class, 'index'])->name('index');
      Route::post('/store', [SpecialityController::class, 'store'])->name('store');
      Route::get('/{speciality}/edit', [SpecialityController::class, 'edit'])->name('edit');
      Route::put('/{speciality}', [SpecialityController::class, 'update'])->name('update');
      Route::get('/{speciality}/delete', [SpecialityController::class, 'delete'])->name('delete');
   });

   Route::group(['prefix' => 'personal', 'as' => 'personal.'], function () {
      Route::get('/', [PersonalController::class, 'index'])->name('index');
      Route::get('/create', [PersonalController::class, 'create'])->name('create');
      Route::post('/store', [PersonalController::class, 'store'])->name('store');
      Route::get('/{personal}/edit', [PersonalController::class, 'edit'])->name('edit');
      Route::put('/{personal}', [PersonalController::class, 'update'])->name('update');
      Route::get('/{personal}/delete', [PersonalController::class, 'delete'])->name('delete');
   });

   Route::group(['prefix' => 'entry', 'as' => 'entry.'], function () {
      Route::get('/', [EntryController::class, 'index'])->name('index');
      Route::get('/create/{personal}', [EntryController::class, 'create'])->name('create');
      Route::post('/store/{personal}', [EntryController::class, 'store'])->name('store');
      Route::post('/update/{personal}', [EntryController::class, 'update'])->name('update');
      Route::delete('/delete/{personal}', [EntryController::class, 'delete'])->name('delete');
   });
});

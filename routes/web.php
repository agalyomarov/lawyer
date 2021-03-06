<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DostController;
use App\Http\Controllers\Admin\EntryController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\ArticleController as ControllersArticleController;
use App\Http\Controllers\DostController as ControllersDostController;
use App\Http\Controllers\KassaController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController as ControllersNewsController;
use App\Http\Controllers\PersonalController as ControllersPersonalController;
use App\Http\Controllers\PersonalsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController as ControllersServiceController;
use App\Http\Controllers\ServiceForSimpleClient;
use App\Http\Controllers\ServiceForYuridLic;
use App\Http\Controllers\VariableController;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/login_personal', [ControllersPersonalController::class, 'login'])->name('login_personal');
Route::post('/login_personal', [ControllersPersonalController::class, 'login_store'])->name('login_personal.store');

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
   Route::get('/', [ProfileController::class, 'index'])->name('index');
   Route::post('/update', [ProfileController::class, 'update'])->name('update');
   Route::get('/online_entries', [ProfileController::class, 'entries'])->name('entries');
   Route::post('/get_entry_data', [ProfileController::class, 'entryData'])->name('entry_data');
   Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');
   Route::get('/login', [ProfileController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'personal', 'as' => 'personal.', 'middleware' => ['personal']], function () {
   Route::get('/', [ControllersPersonalController::class, 'index'])->name('index');
   Route::get('/logout', [ControllersPersonalController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'personals', 'as' => 'personals.'], function () {
   Route::get('/', [PersonalsController::class, 'index'])->name('index');
   Route::get('/{person}', [PersonalsController::class, 'viewPersonal'])->name('view_personal');
});

Route::group(['prefix' => 'yuridicheskoe-obsluzhivanie-fiz-lic/', 'as' => 'serviceForSimpleClient.'], function () {
   Route::get('/', [ServiceForSimpleClient::class, 'index'])->name('index');
   Route::get('/advokat-po-ugolovnym-delam', [ServiceForSimpleClient::class, 'pageAdvokatPoUgalownymDelam'])->name('pageAdvokatPoUgalownymDelam');
   Route::get('/advokat-po-administrativnym-delam', [ServiceForSimpleClient::class, 'pageAdvokatPoAdministrativnymDelam'])->name('pageAdvokatPoAdministrativnymDelam');
   Route::get('/advokat-po-dtp\/', [ServiceForSimpleClient::class, 'pageAdvokatPoDtp'])->name('pageAdvokatPoDtp');
   Route::get('/vzyskanie-dolgov-s-fizicheskih-lic', [ServiceForSimpleClient::class, 'pageVzyskanieDolgovSFizicheskihLic'])->name('pageVzyskanieDolgovSFizicheskihLic');
   Route::get('/advokat-po-zhilishchnym-voprosam', [ServiceForSimpleClient::class, 'pageAdvokatPoZhilishchnymVoprosam'])->name('pageAdvokatPoZhilishchnymVoprosam');
   Route::get('/advokat-po-nasledstvennym-delam', [ServiceForSimpleClient::class, 'pageAdvokatPoNasledstvennymDelam'])->name('pageAdvokatPoNasledstvennymDelam');
   Route::get('/yurist-po-trudovym-sporam', [ServiceForSimpleClient::class, 'pageYuristPoTrudovymSporam'])->name('pageYuristPoTrudovymSporam');
   Route::get('/predstavlenie-interesov-v-arbitrazhnom-sude', [ServiceForSimpleClient::class, 'pagePredstavlenieInteresovVArbitrazhnomSude'])->name('pagePredstavlenieInteresovVArbitrazhnomSude');
   Route::get('/programma-loyalnosti', [ServiceForSimpleClient::class, 'pageProgrammaLoyalnosti'])->name('pageProgrammaLoyalnosti');
});

Route::group(['prefix' => 'obsluzhivanie-yuridicheskih-lic', 'as' => 'serviceForYuridLic.'], function () {
   Route::get('/', [ServiceForYuridLic::class, 'index'])->name('index');
   Route::get('/dosudebnoe-uregulirovanie-sporov', [ServiceForYuridLic::class, 'pageDosudebnoeUregulirovanieSporov'])->name('pageDosudebnoeUregulirovanieSporov');
   Route::get('/advokat-po-arbitrazhnym-delam', [ServiceForYuridLic::class, 'pageAdvokatPoArbitrazhnymDelam'])->name('pageAdvokatPoArbitrazhnymDelam');
   Route::get('/predstavitelstvo', [ServiceForYuridLic::class, 'pagePredstavitelstvo'])->name('pagePredstavitelstvo');
   Route::get('/professionalnie-konsultatsii-advokata', [ServiceForYuridLic::class, 'pageProfessionalnieKonsultatsiiAdvokata'])->name('pageProfessionalnieKonsultatsiiAdvokata');
   Route::get('/yuridicheskaya-konsultaciya-ip', [ServiceForYuridLic::class, 'pageYuridicheskayaKonsultaciyaIp'])->name('pageYuridicheskayaKonsultaciyaIp');
});

Route::get('/uslugi/{service}', [ControllersServiceController::class, 'index'])->name('service.index');

Route::post('/getentry', [MainController::class, 'getentry']);
// Route::get('/getentry', [MainController::class, 'getentry']);

Route::post('/verification', [MainController::class, 'verification']);
Route::post('/verification/check', [MainController::class, 'verificationCheck']);
Route::post('/verification/store', [MainController::class, 'verificationStore']);
Route::post('/verification/profile/phone', [MainController::class, 'verificationProfilePhone']);
Route::post('/verification/profile/phone/check', [MainController::class, 'verificationProfilePhoneCheck']);
Route::post('/verification/profile/phone/call_turn', [MainController::class, 'verificationProfilePhoneCallTurn']);



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
      Route::post('/get_all_hourses/{personal}', [EntryController::class, 'getAllHourses']);
      Route::post('/disable_entry', [EntryController::class, 'disable_entry']);
   });

   Route::group(['prefix' => 'link', 'as' => 'link.'], function () {
      Route::get('/', [LinkController::class, 'index'])->name('index');
      Route::post('/store', [LinkController::class, 'store'])->name('store');
      Route::get('/delete/{link}', [LinkController::class, 'delete'])->name('delete');
      Route::get('/get_count', [LinkController::class, 'getCount']);
   });

   Route::group(['prefix' => 'variable', 'as' => 'variable.'], function () {
      Route::get('/', [VariableController::class, 'index'])->name('index');
      Route::post('/', [VariableController::class, 'store'])->name('store');
   });

   Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
      Route::get('/', [NewsController::class, 'index'])->name('index');
      Route::get('/create', [NewsController::class, 'create'])->name('create');
      Route::post('/', [NewsController::class, 'store'])->name('store');
      Route::get('/{news}', [NewsController::class, 'edit'])->name('edit');
      Route::put('/{news}', [NewsController::class, 'update'])->name('update');
      Route::get('delete/{news}', [NewsController::class, 'delete'])->name('delete');
   });

   Route::group(['prefix' => 'dostizheniya', 'as' => 'dost.'], function () {
      Route::get('/', [DostController::class, 'index'])->name('index');
      Route::get('/create', [DostController::class, 'create'])->name('create');
      Route::post('/', [DostController::class, 'store'])->name('store');
      Route::get('/{dost}', [DostController::class, 'edit'])->name('edit');
      Route::put('/{dost}', [DostController::class, 'update'])->name('update');
      Route::get('delete/{dost}', [DostController::class, 'delete'])->name('delete');
   });


   Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
      Route::get('/', [ArticleController::class, 'index'])->name('index');
      Route::get('/create', [ArticleController::class, 'create'])->name('create');
      Route::post('/', [ArticleController::class, 'store'])->name('store');
      Route::get('/{article}', [ArticleController::class, 'edit'])->name('edit');
      Route::put('/{article}', [ArticleController::class, 'update'])->name('update');
      Route::get('delete/{article}', [ArticleController::class, 'delete'])->name('delete');
   });

   Route::group(['prefix' => 'review', 'as' => 'review.'], function () {
      Route::get('/', [ReviewController::class, 'index'])->name('index');
      Route::get('/create', [ReviewController::class, 'create'])->name('create');
      Route::post('/', [ReviewController::class, 'store'])->name('store');
      Route::get('/{review}', [ReviewController::class, 'edit'])->name('edit');
      Route::put('/{review}', [ReviewController::class, 'update'])->name('update');
      Route::get('delete/{review}', [ReviewController::class, 'delete'])->name('delete');
   });
});



Route::get('/kassa/buy', [KassaController::class, 'oplataUslugi']);
Route::get('/kassa/check', [KassaController::class, 'checkOplata']);
Route::get('/kassa/disabled', [KassaController::class, 'disabledOplata']);

Route::get('/news', [ControllersNewsController::class, 'index'])->name('news.index');
Route::get('news/{chpu}', [ControllersNewsController::class, 'view'])->name('news.view');

Route::get('/dostizheniye', [ControllersDostController::class, 'index'])->name('dost.index');
Route::get('dostizheniye/{chpu}', [ControllersDostController::class, 'view'])->name('dost.view');


Route::get('/article', [ControllersArticleController::class, 'index'])->name('article.index');
Route::get('article/{chpu}', [ControllersArticleController::class, 'view'])->name('article.view');

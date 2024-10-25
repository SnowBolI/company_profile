<?php
use App\Http\Controllers\UserController;

use App\Http\Controllers\HomeYTController;

use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\HomeDepositoController;
use App\Http\Controllers\HomeTabunganController;
use App\Http\Controllers\HomeThumbnailController;
use App\Http\Controllers\ProfileBannerController;
use App\Http\Controllers\ProfileTentangController;
use App\Http\Controllers\ProfileStrukturController;
use App\Http\Controllers\ProfileMilestoneController;
use App\Http\Controllers\ProfileSejarahVisiController;


Route::get('/', function(){return redirect('/home');});


Route::get('/home', 'UserController@home')->name('home');
Route::get('/blog', 'UserController@blog')->name('blog');
Route::get('/blog/{slug}', 'UserController@show_article')->name('blog.show');
Route::get('/destination', 'UserController@destination')->name('destination');
Route::get('/destination/{slug}', 'UserController@show_destination')->name('destination.show');
Route::get('/contact', 'UserController@contact')->name('contact');

// route profile
Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::get('/profile/sejarah', 'ProfileController@showSejarah')->name('profile.sejarah');
Route::get('/profile/visi-misi', 'ProfileController@showVisiMisi')->name('profile.visi-misi');
Route::get('/profile/struktur-organisasi', 'ProfileController@showStrukturOrganisasi')->name('profile.struktur-organisasi');
Route::get('/profile/milestone', 'ProfileController@showMilestone')->name('profile.milestone');


Route::prefix('admin')->group(function(){

  Route::get('/', function(){
    return view('auth/login');
  });
  
  // handle route register
  Route::match(["GET", "POST"], "/register", function(){ 
    return redirect("/login"); 
  })->name("register");
  
  Auth::routes();
  
  // Route Dashboard
  Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
  
  // route categories
  Route::get('/categories/{category}/restore', 'CategoryController@restore')->name('categories.restore');
  Route::delete('/categories/{category}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
  Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');
  Route::resource('categories', 'CategoryController')->middleware('auth');
  
  // route article
  Route::post('/articles/upload', 'ArticleController@upload')->name('articles.upload')->middleware('auth');
  Route::resource('/articles', 'ArticleController')->middleware('auth');
  
  // route destination
  Route::resource('/destinations', 'DestinationController')->middleware('auth');
    
  // Route about
  Route::get('/abouts', 'AboutController@index')->name('abouts.index')->middleware('auth');
  Route::get('/abouts/{about}/edit', 'AboutController@edit')->name('abouts.edit')->middleware('auth');
  Route::put('/abouts/{about}', 'AboutController@update')->name('abouts.update')->middleware('auth');
    

  Route::resource('/home_slider',HomeSliderController::class)->middleware('auth');
  Route::resource('/home_youtube',HomeYTController::class)->middleware('auth');
  Route::resource('/home_thumbnail',HomeThumbnailController::class)->middleware('auth');
  Route::resource('/home_tabungan',HomeTabunganController::class)->middleware('auth');
  Route::resource('/home_deposito',HomeDepositoController::class)->middleware('auth');


  Route::resource('/profile_banner',ProfileBannerController::class)->middleware('auth');
  Route::resource('/profile_sejarah_visi',ProfileSejarahVisiController::class)->middleware('auth');
  Route::resource('/profile_struktur',ProfileStrukturController::class)->middleware('auth');
  Route::resource('/profile_milestone',ProfileMilestoneController::class)->middleware('auth');
  Route::resource('/profile_tentang',ProfileTentangController::class)->middleware('auth');



});
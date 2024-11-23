<?php
use App\Http\Controllers\UserController;

use App\Http\Controllers\KarirController;

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeYTController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KantorKasController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\ProdukPPOBController;
use App\Http\Controllers\KarirBannerController;
use App\Http\Controllers\PesanKontakController;
use App\Http\Controllers\PesanKreditController;
use App\Http\Controllers\BeritaBannerController;
use App\Http\Controllers\HomeDepositoController;
use App\Http\Controllers\HomeTabunganController;
use App\Http\Controllers\KantorBannerController;
use App\Http\Controllers\KantorCabangController;
use App\Http\Controllers\KontakBannerController;
use App\Http\Controllers\ProdukBannerController;
use App\Http\Controllers\ProdukKreditController;
use App\Http\Controllers\EdukasiBannerController;
use App\Http\Controllers\HomeThumbnailController;
use App\Http\Controllers\LaporanBannerController;
use App\Http\Controllers\PesanDepositoController;
use App\Http\Controllers\PesanTabunganController;
use App\Http\Controllers\ProfileBannerController;
use App\Http\Controllers\HomeBackgroundController;
use App\Http\Controllers\ProdukDepositoController;
use App\Http\Controllers\ProdukTabunganController;
use App\Http\Controllers\ProfileTentangController;
use App\Http\Controllers\ProfileStrukturController;
use App\Http\Controllers\ProfileMilestoneController;
use App\Http\Controllers\ProfilePenghargaanController;
use App\Http\Controllers\ProfileSejarahVisiController;


Route::get('/', function(){return redirect('/home');});

Route::get('/api/tabungan-types', [UserController::class, 'getTabunganTypes']);
Route::get('/api/deposito-types', [UserController::class, 'getDepositoTypes']);

Route::get('/home', 'UserController@home')->name('home');
Route::get('/blog_edukasi', 'UserController@edukasi')->name('blog_edukasi');
Route::get('/blog_edukasi/baca/{slug}', 'UserController@show_edukasi')->name('blog_edukasi.show');
// Route::get('/cabang', 'UserController@cabang')->name('cabang');
// Route::get('/cabang/kas/{id}', 'UserController@show_cabang')->name('cabang.show');
Route::get('/cabang', 'UserController@cabang')->name('cabang');
Route::get('/cabang/{id}', 'UserController@kas')->name('cabang.single');


// Route::get('/blog_karir/kantorkas/{id}', 'UserController@show_karir')->name('blog_karir.show');
Route::get('/blog_karir', 'UserController@karir')->name('blog_karir');
Route::get('/blog_karir/baca/{slug}', 'UserController@show_karir')->name('blog_karir.show');
Route::get('/blog_berita', 'UserController@berita')->name('blog_berita');
Route::get('/blog_berita/baca/{slug}', 'UserController@show_berita')->name('blog_berita.show');
Route::get('/laporan', 'UserController@laporan')->name('laporan');
Route::get('/destination', 'UserController@destination')->name('destination');
Route::get('/destination/{slug}', 'UserController@show_destination')->name('destination.show');
Route::get('/contact', 'UserController@contact')->name('contact');
Route::post('/contact/store', 'UserController@contact_store')->name('contact.store');
// route produk
Route::get('/tabungan', 'UserController@tabungan')->name('tabungan');
Route::post('/tabungan/store', 'UserController@tabungan_store')->name('tabungan.store');

Route::get('/deposito', 'UserController@deposito')->name('deposito');
Route::post('/deposito/store', 'UserController@deposito_store')->name('deposito.store');


Route::get('/kredit', 'UserController@kredit')->name('kredit');
Route::post('/kredit/store', 'UserController@kredit_store')->name('kredit.store');


Route::get('/ppob', 'UserController@ppob')->name('ppob');

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
  Route::resource('/home_background',HomeBackgroundController::class)->middleware('auth');
  Route::resource('/home_youtube',HomeYTController::class)->middleware('auth');
  Route::resource('/home_thumbnail',HomeThumbnailController::class)->middleware('auth');
  Route::resource('/home_tabungan',HomeTabunganController::class)->middleware('auth');
  Route::resource('/home_deposito',HomeDepositoController::class)->middleware('auth');


  Route::resource('/profile_banner',ProfileBannerController::class)->middleware('auth');
  Route::resource('/profile_sejarah_visi',ProfileSejarahVisiController::class)->middleware('auth');
  Route::resource('/profile_struktur',ProfileStrukturController::class)->middleware('auth');
  Route::resource('/profile_milestone',ProfileMilestoneController::class)->middleware('auth');
  Route::resource('/profile_penghargaan',ProfilePenghargaanController::class)->middleware('auth');
  Route::resource('/profile_tentang',ProfileTentangController::class)->middleware('auth');

  Route::resource('/produk_tabungan',ProdukTabunganController::class)->middleware('auth');
  Route::resource('/produk_banner',ProdukBannerController::class)->middleware('auth');
  Route::resource('/produk_deposito',ProdukDepositoController::class)->middleware('auth');
  Route::resource('/produk_kredit',ProdukKreditController::class)->middleware('auth');
  Route::resource('/produk_ppob',ProdukPPOBController::class)->middleware('auth');


  Route::resource('/edukasi_banner',EdukasiBannerController::class)->middleware('auth');
  Route::resource('/edukasi',EdukasiController::class)->middleware('auth');

  Route::resource('/kantor_banner',KantorBannerController::class)->middleware('auth');
  Route::resource('/kantor_cabang',KantorCabangController::class)->middleware('auth');
  Route::prefix('kantor_cabang/{idkantorcabang}')->group(function () {
    Route::resource('kantor_kas', KantorKasController::class)->middleware('auth');
  }); 

  Route::resource('/karir_banner',KarirBannerController::class)->middleware('auth');
  Route::resource('/karir',KarirController::class)->middleware('auth');

  Route::resource('/berita_banner',BeritaBannerController::class)->middleware('auth');
  Route::resource('/berita',BeritaController::class)->middleware('auth');


  Route::resource('/laporan_banner',LaporanBannerController::class)->middleware('auth');
  Route::resource('/laporan',LaporanController::class)->middleware('auth');


  Route::resource('/kontak_banner',KontakBannerController::class)->middleware('auth');
  Route::resource('/kontak',KontakController::class)->middleware('auth');

  Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('pesan_kontak', PesanKontakController::class);
    Route::resource('pesan_tabungan', PesanTabunganController::class);
    Route::resource('pesan_deposito', PesanDepositoController::class);
    Route::resource('pesan_kredit', PesanKreditController::class);
});





});
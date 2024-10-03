<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ManajemenController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Admin;
use App\Models\Menu;
use App\Http\Controllers\pertama;
use App\Http\Controllers\MessageController;


Route::get('/', function () {
    return view('welcome');
});
//home
Route::get('/home/depan', [AuthController::class, 'homeDepan'])->name('home.depan')->middleware('guest');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// Rute untuk Admin
Route::middleware(AdminMiddleware::class)->group(function () {
  Route::get('admin/dashboard', action: [AdminController::class, 'index'])->name('admin.dashboard');
  // Tambahkan rute admin lainnya di sini
});

// Rute untuk User
Route::middleware(AdminMiddleware::class)->group( function () {
  Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
  // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
  //   Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
});

//buku dan kategori
// Buku Routes
Route::middleware(AdminMiddleware::class)->group(function () {
  Route::get('/bukus/{id}/edit', [BukuController::class, 'edit'])->name('bukus.edit');
  Route::post('/bukus', [BukuController::class, 'store'])->name('bukus.store');
});
// Kategori Routes
Route::middleware(AdminMiddleware::class)->group(function () {
  Route::resource('kategoris', KategoriController::class);
});



//photo
Route::get('/photo', function () {
  return view('photo');
})->middleware('auth'); // Menambahkan middleware 'auth'

Route::post('/upload-photo', [PhotoController::class, 'upload'])
  ->middleware('auth'); // Menambahkan middleware 'auth'



  
// Route untuk Map Quest
Route::middleware(AdminMiddleware::class)->group(function () {
  Route::get('/map', function () {
      return view('map');
  })->name('map');
});

Route::middleware([admin::class])->group(function () {
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');

    // Rute untuk Edit Menu
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});


Route::middleware([admin::class])->group(function () {
    Route::get('/admin/add-barang', [BarangController::class, 'create'])->name('admin.add-barang');
    Route::post('/admin/add-barang', [BarangController::class, 'store'])->name('admin.store-barang');
});

Route::get('/bebas',function(){
  return view('dashboard',[
    'menus' => Menu::all()
]);
});


Route::middleware([admin::class])->group(function ()  {
    // Rute untuk menampilkan formulir tambah user
    Route::get('/admin/add-user', [AdminController::class, 'showAddUserForm'])->name('admin.add-user');

    // Rute untuk menyimpan user baru ke database
    Route::post('/admin/store-user', [AdminController::class, 'storeUser'])->name('admin.storeUser');

});

 Route::middleware(['auth'])->group(function () {
  Route::get('/messages/detail/{id}', [MessageController::class, 'detail'])->name('messages.detail');
  Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create')->middleware('auth'); // Menggunakan middleware auth untuk mengamankan rute
  Route::post('/messages/send', [MessageController::class, 'sendMessage'])->name('send-message')->middleware('auth');
 });
 Route::get('/messages/{id}', [MessageController::class, 'showDetail'])->name('messages.detail')->middleware('auth');
 Route::post('/messages/reply/{id}', [MessageController::class, 'reply'])->name('reply-message');

 Route::middleware(['auth'])->group(function () {
  Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
  Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
});
Route::middleware([admin::class])->group(function () {// Pastikan hanya admin yang dapat mengakses

    Route::get('/menu', [ManajemenController::class, 'index'])->name('menu.manajemen');
    Route::post('/menu/update', [ManajemenController::class, 'update'])->name('menu.update');
});

// Rute untuk menampilkan dashboard
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

// Rute untuk menyimpan foto yang diunggah
Route::post('/post-photo', [PostController::class, 'store'])->name('post.photo');

// Rute untuk menambahkan komentar
Route::post('/posts/{id}/comments', [PostController::class, 'addComment'])->name('posts.comments');

// Rute untuk menyukai postingan
Route::post('/posts/{id}/like', [PostController::class, 'likePost'])->name('posts.like');

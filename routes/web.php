<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('pages.guest.home');
})->name('welcome');

Route::get('/ourMenu', function () {
    return view('pages.guest.our-menu');
})->name('our.menu');

Route::get('/contact', function () {
    return view('pages.guest.contact');
})->name('contact');


Route::get('register', [AuthenticatedController::class, 'register'])->name('register');
Route::post('register_post', [AuthenticatedController::class, 'postRegistration'])->name('register.post');
Route::get('login', [AuthenticatedController::class, 'login'])->name('login');
Route::post('login_post', [AuthenticatedController::class, 'postLogin'])->name('login.post');
Route::get('logout', [AuthenticatedController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthenticatedController::class, 'dashboard'])->name('home');
Route::get('food', [AuthenticatedController::class, 'show_food'])->name('food');
Route::get('profile', [AuthenticatedController::class, 'profile'])->name('profile');
Route::get('order', [AuthenticatedController::class, 'order'])->name('order');
Route::get('review', [AuthenticatedController::class, 'review'])->name('review');


Route::get('user', [AuthenticatedController::class, 'userinsert'])->name('user');
Route::post('user_create', [AuthenticatedController::class, 'user_create'])->name('user.post');
Route::post('user_update/{id}', [AuthenticatedController::class, 'updateUserInfo'])->name('user.updare');
Route::get('edit-user/{id}', [AuthenticatedController::class, 'editUser'])->name('user.edit');
Route::get('delete-user/{id}', [AuthenticatedController::class, 'deleteUser'])->name('user.delete');


Route::post('role_create', [RoleController::class, 'store_role'])->name('role.post');
Route::get('role_edit/{id}', [RoleController::class, 'edit_role'])->name('role.edit');
Route::post('role_update/{id}', [RoleController::class, 'update_role'])->name('role.update');
Route::get('delete_role/{id}', [RoleController::class, 'delete_role'])->name('role.delete');


Route::get('show-item-cat', [AuthenticatedController::class, 'showItemAndCat'])->name('item-insert');
Route::post('category-insert', [CategoryController::class, 'categoryInsert'])->name('category.insert');
Route::get('category-edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
Route::post('category-update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
Route::get('category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

Route::post('item-insert', [ItemController::class, 'itemInsert'])->name('item.insert');
Route::get('item-edit/{id}', [ItemController::class, 'itemEdit'])->name('item.edit');
Route::post('item-update/{id}', [ItemController::class, 'itemUpdate'])->name('item.update');
Route::get('item-delete/{id}', [ItemController::class, 'itemDelete'])->name('item.delete');

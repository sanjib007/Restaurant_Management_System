<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\orderController;
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



Route::get('/', [AuthenticatedController::class, 'show_food'])->name('welcome');

Route::get('/ourMenu', [ItemController::class, 'showOurMenu'])->name('our.menu');
Route::get('/item/{id}', [ItemController::class, 'showItemDetail'])->name('item.detail');

Route::get('/contact', function () {
    return view('pages.guest.contact');
})->name('contact');


Route::get('register', [AuthenticatedController::class, 'register'])->name('register');
Route::post('register_post', [AuthenticatedController::class, 'postRegistration'])->name('register.post');
Route::get('login', [AuthenticatedController::class, 'login'])->name('login');
Route::post('login_post', [AuthenticatedController::class, 'postLogin'])->name('login.post');
Route::get('logout', [AuthenticatedController::class, 'logout'])->name('logout');

Route::get('forgot-password', [AuthenticatedController::class, 'forgotPassword'])->name('password.request');
Route::post('forgot-password', [AuthenticatedController::class, 'postForgotPassword'])->name('password.email');
Route::get('reset-password/{token}', [AuthenticatedController::class, 'resetPassword'])->name('password.reset');
Route::post('reset-password', [AuthenticatedController::class, 'postResetPassword'])->name('password.update');
Route::get('dashboard', [AuthenticatedController::class, 'dashboard'])->name('home');
Route::get('food', [AuthenticatedController::class, 'show_food'])->name('food');
Route::middleware(['auth', 'permission:Profile.View'])->group(function () {
    Route::get('profile', [AuthenticatedController::class, 'profile'])->name('profile');
});
Route::middleware(['auth', 'permission:Order.View'])->group(function () {
    Route::get('order', [AuthenticatedController::class, 'order'])->name('order');
});
Route::middleware(['auth', 'permission:Review.View'])->group(function () {
    Route::get('review', [AuthenticatedController::class, 'review'])->name('review');
});
Route::middleware(['auth', 'permission:Review.Create'])->group(function () {
    Route::post('review-insert', [AuthenticatedController::class, 'reviewInsert'])->name('review.insert');
});


Route::middleware(['auth', 'permission:User.View'])->group(function () {
    Route::get('user', [AuthenticatedController::class, 'userShow'])->name('user');
});
Route::middleware(['auth', 'permission:User.Create'])->group(function () {
    Route::post('user_create', [AuthenticatedController::class, 'user_create'])->name('user.post');
});
Route::middleware(['auth', 'permission:User.Update'])->group(function () {
    Route::post('user_update/{id}', [AuthenticatedController::class, 'updateUserInfo'])->name('user.updare');
    Route::get('edit-user/{id}', [AuthenticatedController::class, 'editUser'])->name('user.edit');
});
Route::middleware(['auth', 'permission:User.Delete'])->group(function () {
    Route::get('delete-user/{id}', [AuthenticatedController::class, 'deleteUser'])->name('user.delete');
});
Route::middleware(['auth', 'permission:Profile.Update'])->group(function () {
    Route::Post('userImageUpload', [AuthenticatedController::class, 'userImageUpload'])->name('user.imageUpload');
});

Route::middleware(['auth', 'permission:Role.Create'])->group(function () {
    Route::post('role_create', [RoleController::class, 'store_role'])->name('role.post');
});
Route::middleware(['auth', 'permission:Role.Update'])->group(function () {
    Route::get('role_edit/{id}', [RoleController::class, 'edit_role'])->name('role.edit');
    Route::post('role_update/{id}', [RoleController::class, 'update_role'])->name('role.update');
});
Route::middleware(['auth', 'permission:Role.Delete'])->group(function () {
    Route::get('delete_role/{id}', [RoleController::class, 'delete_role'])->name('role.delete');
});

Route::middleware(['auth', 'permission:Category.View'])->group(function () {
    Route::get('show-item-cat', [AuthenticatedController::class, 'showItemAndCat'])->name('item-insert');
});
Route::middleware(['auth', 'permission:Category.Create'])->group(function () {
    Route::post('category-insert', [CategoryController::class, 'categoryInsert'])->name('category.insert');
});
Route::middleware(['auth', 'permission:Category.Update'])->group(function () {
    Route::get('category-edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('category-update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
});
Route::middleware(['auth', 'permission:Category.Delete'])->group(function () {
    Route::get('category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
});

Route::middleware(['auth', 'permission:Slider.View'])->group(function () {
    Route::get('slider', [App\Http\Controllers\SliderController::class, 'index'])->name('slider.index');
});
Route::middleware(['auth', 'permission:Slider.Create'])->group(function () {
    Route::post('slider', [App\Http\Controllers\SliderController::class, 'store'])->name('slider.store');
});
Route::middleware(['auth', 'permission:Slider.Update'])->group(function () {
    Route::get('slider/{id}/edit', [App\Http\Controllers\SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider/{id}', [App\Http\Controllers\SliderController::class, 'update'])->name('slider.update');
});
Route::middleware(['auth', 'permission:Slider.Delete'])->group(function () {
    Route::get('slider/{id}/delete', [App\Http\Controllers\SliderController::class, 'destroy'])->name('slider.destroy');
});

Route::middleware(['auth', 'permission:Item.Create'])->group(function () {
    Route::post('item-insert', [ItemController::class, 'itemInsert'])->name('item.insert');
});
Route::middleware(['auth', 'permission:Item.Update'])->group(function () {
    Route::get('item-edit/{id}', [ItemController::class, 'itemEdit'])->name('item.edit');
    Route::post('item-update/{id}', [ItemController::class, 'itemUpdate'])->name('item.update');
});
Route::middleware(['auth', 'permission:Item.Delete'])->group(function () {
    Route::get('item-delete/{id}', [ItemController::class, 'itemDelete'])->name('item.delete');
});
Route::get('getItem/{id}', [ItemController::class, 'getItemWithJson'])->name('item.getItem');
Route::post('setOrder', [ItemController::class, 'setOrderitem'])->name('item.setOrder');
Route::get('removeOrder/{id}', [ItemController::class, 'removeItemFromSession'])->name('item.removeOrder');
Route::get('getAllSessionItem', [ItemController::class, 'getAllSessionItem'])->name('item.getAllSessionItem');
Route::get('deleteRequestedItem/{id}', [ItemController::class, 'deleteRequestedItem'])->name('item.deleteRequestedItem');
Route::post('changeItemQuantity', [ItemController::class, 'changeItemQuantity'])->name('item.changeItemQuantity');

Route::middleware(['auth', 'permission:Order.Create'])->group(function () {
    Route::post('submitOrder', [orderController::class, 'submitOrder'])->name('order.submitOrder');
});
Route::middleware(['auth', 'permission:Order.Process'])->group(function () {
    Route::get('submitOrderProcess/{id}', [orderController::class, 'submitOrderProcess'])->name('order.process');
});
Route::middleware(['auth', 'permission:Order.Complete'])->group(function () {
    Route::get('submitOrderComplete/{id}', [orderController::class, 'submitOrderComplete'])->name('order.complete');
});
Route::middleware(['auth', 'permission:Order.Paid'])->group(function () {
    Route::get('orderPaid/{id}', [orderController::class, 'orderPaid'])->name('order.paid');
});
Route::middleware(['auth', 'permission:Order.Cancel'])->group(function () {
    Route::get('orderCancel/{id}', [orderController::class, 'orderCancel'])->name('order.cancel');
});
Route::middleware(['auth', 'permission:Order.View'])->group(function () {
    Route::get('order-detail/{id}', [orderController::class, 'getOrderDetail'])->name('order.detail');
});

// Cancel Request routes
Route::middleware(['auth', 'permission:CancelRequest.Create'])->group(function () {
    Route::post('cancel-request', [orderController::class, 'submitCancelRequest'])->name('order.cancelRequest');
});
Route::middleware(['auth', 'permission:CancelRequest.View'])->group(function () {
    Route::get('cancel-requests', [orderController::class, 'cancelRequests'])->name('order.cancelRequests');
});
Route::middleware(['auth', 'permission:CancelRequest.Approve'])->group(function () {
    Route::post('cancel-request/{id}/approve', [orderController::class, 'approveCancelRequest'])->name('order.cancelRequest.approve');
});
Route::middleware(['auth', 'permission:CancelRequest.Reject'])->group(function () {
    Route::post('cancel-request/{id}/reject', [orderController::class, 'rejectCancelRequest'])->name('order.cancelRequest.reject');
});

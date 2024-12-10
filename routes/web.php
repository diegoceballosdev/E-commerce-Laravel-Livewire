<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShippingController;
use App\Livewire\AboutUs;
use App\Livewire\AddCategoryForm;
use App\Livewire\AddProductForm;
use App\Livewire\AdminDashboard;
use App\Livewire\CategoryReportForm;
use App\Livewire\ContactSection;
use App\Livewire\EditCategory;
use App\Livewire\EditProduct;
use App\Livewire\ManageCategory;
use App\Livewire\ManageOrder;
use App\Livewire\ManageProduct;
use App\Livewire\ManageUser;
use App\Livewire\MyPurchases;
use App\Livewire\OrderDetails;
use App\Livewire\OrderReportForm;
use App\Livewire\ProductCategoryList;
use App\Livewire\ProductDetails;
use App\Livewire\ProductReportForm;
use App\Livewire\ShoppingCartComponent;
use App\Livewire\UserEditRole;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// ADMIN -----------------------------------------------------------------------

Route::get('/dashboard-admin',AdminDashboard::class)->middleware('role:Admin');

Route::get('/users',ManageUser::class)->middleware('role:Admin');

Route::get('/users/edit-role/{id}',UserEditRole::class)->middleware('role:Admin');

Route::get('/products',ManageProduct::class)->middleware('role:Admin');

Route::get('/products/addProduct',AddProductForm::class)->middleware('role:Admin');

Route::get('/products/report',ProductReportForm::class)->middleware('role:Admin');

Route::get('/products/editProduct/{id}',EditProduct::class)->middleware('role:Admin');

Route::get('/categories',ManageCategory::class)->middleware('role:Admin');

Route::get('/categories/addCategory',AddCategoryForm::class)->middleware('role:Admin');

Route::get('/categories/editCategory/{id}',EditCategory::class)->middleware('role:Admin');

Route::get('/categories/report',CategoryReportForm::class)->middleware('role:Admin');

Route::get('/orders',ManageOrder::class)->middleware('role:Admin');

Route::get('/orders/report',OrderReportForm::class)->middleware('role:Admin');


// Tienda -----------------------------------------------------------------------

Route::get('/product-details/{id}',ProductDetails::class);

Route::get('/product-category-list/{id}',ProductCategoryList::class)->name("product-category-list");

Route::get('/contact',ContactSection::class);

Route::get('/about-us',AboutUs::class);

Route::get('/shopping-cart',ShoppingCartComponent::class)->middleware('role:Admin|User');

Route::post('/shipping',[ShippingController::class, 'index'])->middleware('role:Admin|User');

Route::get('/purchases',MyPurchases::class)->name('purchases')->middleware('role:Admin|User');

Route::get('/order-details/{id}',OrderDetails::class)->middleware('role:Admin|User');


// CHECKOUT

Route::get('/cancel-buy', 'App\Http\Controllers\StripeController@cancelBuy')->name('cancel-buy')->middleware('role:Admin|User');

Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session')->middleware('role:Admin|User');

Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success')->middleware('role:Admin|User');


// LOGIN AND REGISTER -----------------------------------------------------------

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('Kong');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

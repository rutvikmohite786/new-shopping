<?php

use App\Http\Controllers\Admin\Product\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Product\SubCategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\http\Controllers\User\UserManageController;
use App\http\Controllers\HomeController;
use App\http\Controllers\Admin\Auth\AdminAuthController;
use App\http\Controllers\Admin\Product\ColorController;
use App\http\Controllers\Admin\Product\ProductColorController;
use App\http\Controllers\Admin\Product\AttributeController;
use App\http\Controllers\User\UserLoginController;
use App\http\Controllers\Admin\Product\ProductAttributeController;
use App\http\Controllers\Admin\Product\ProductPricestocksController;
use App\http\Controllers\Admin\Product\BrandController;
use App\http\Controllers\Admin\Product\BannerController;
use App\http\Controllers\Front\DashboardController;
use App\http\Controllers\Front\ProductController as FrontProductController;
use App\http\Controllers\Admin\FilterController;
use App\http\Controllers\Front\PaymentController;
use App\http\Controllers\Front\Payment\PaypalPaymentController;
use App\http\Controllers\Front\Payment\SubscriptionController;
use App\http\Controllers\Admin\SocialController;




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

Route::group(['middleware' => ['adminauth']], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
        Route::get('/home', 'index')->name('home');
    });

    //user management by admin
    Route::controller(UserManageController::class)->group(function () {
        Route::get('/user', 'index')->name('index.user');
        Route::post('/user/store', 'store');
        Route::post('/user/update', 'update');
        Route::get('/user/edit/{id}', 'edit');
        Route::get('/user/delete/{id}', 'delete');
        Route::get('/user/add', 'add');
        Route::get('user/password/reset/{id}', 'passwordReset');
    });

    Route::controller(SocialController::class)->group(function () {
        Route::get('/social', 'index')->name('index.social');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('index.category');
        Route::post('/category/store', 'store');
        Route::post('/category/update', 'update');
        Route::get('/category/edit/{id}', 'edit');
        Route::get('/category/delete/{id}', 'delete');
        Route::get('/category/add', 'add');
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/subcategory', 'index')->name('index.subcategory');
        Route::get('/subcategory/add', 'add');
        Route::post('/subcategory/store', 'store');
        Route::get('/subcategory/edit/{id}', 'edit');
        Route::post('/subcategory/update', 'update');
        Route::get('/subcategory/delete/{id}', 'delete');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('index.product');
        Route::post('/product/store', 'store');
        Route::get('/product/edit/{id}', 'edit');
        Route::get('/product/delete/{id}', 'delete');
        Route::get('/product/add', 'add');
        Route::post('/product/update', 'update');
        Route::get('/product/image/edit/{id}', 'productImageEdit');
        Route::post('/product/image/update', 'productImageUpdate');
    });

    Route::controller(ColorController::class)->group(function () {
        Route::get('/color/product', 'index')->name('index.color');
        Route::get('/color/add', 'add')->name('color.add');
        Route::post('/color/store', 'store')->name('color.store');
        Route::get('/color/edit/{id}', 'edit')->name('color.edit');
        Route::post('/color/update', 'update')->name('color.update');
        Route::get('/color/delete/{id}', 'delete')->name('color.delete');
    });

    Route::controller(ProductColorController::class)->group(function () {
        Route::get('/products/color', 'index')->name('index.product.color');
        Route::get('products/color/add', 'add')->name('product.color.add');
        Route::post('products/color/store', 'store')->name('product.color.store');
        Route::get('products/color/edit/{id}', 'edit')->name('product.color.edit');
        Route::post('products/color/update', 'update')->name('product.color.update');
        Route::get('products/color/delete/{id}', 'delete')->name('product.color.delete');
    });

    Route::controller(AttributeController::class)->group(function () {
        Route::get('attribute/', 'index')->name('index.attribute');
        Route::get('attribute/add', 'add')->name('attribute.add');
        Route::post('attribute/store', 'store')->name('attribute.store');
        Route::get('attribute/edit/{id}', 'edit')->name('attribute.edit');
        Route::post('attribute/update', 'update')->name('attribute.update');
        Route::get('attribute/delete/{id}', 'delete')->name('attribute.delete');
    });

    Route::controller(ProductAttributeController::class)->group(function () {
        Route::get('atter/product', 'index')->name('index.attribute.product');
        Route::get('atter/product/add', 'add')->name('attribute.product.add');
        Route::post('atter/product/store', 'store')->name('attribute.product.store');
        Route::get('atter/product/edit/{id}', 'edit')->name('attribute.product.edit');
        Route::post('atter/product/update', 'update')->name('attribute.product.update');
        Route::get('atter/product/delete/{id}', 'delete')->name('attribute.product.delete');
    });

    Route::controller(ProductPricestocksController::class)->group(function () {
        Route::get('pricestock/product', 'index')->name('index.pricestock.product');
        Route::get('pricestock/product/add', 'add')->name('pricestock.product.add');
        Route::post('pricestock/product/store', 'store')->name('pricestock.product.store');
        Route::get('pricestock/product/edit/{id}', 'edit')->name('pricestock.product.edit');
        Route::post('pricestock/product/update', 'update')->name('pricestock.product.update');
        Route::get('pricestock/product/delete/{id}', 'delete')->name('pricestock.product.delete');
    });

    Route::controller(BrandController::class)->group(function () {
        Route::get('brand/product', 'index')->name('index.brand.product');
        Route::get('brand/product/add', 'add')->name('brand.product.add');
        Route::post('brand/product/store', 'store')->name('brand.product.store');
        Route::get('brand/product/edit/{id}', 'edit')->name('brand.product.edit');
        Route::post('brand/product/update', 'update')->name('brand.product.update');
        Route::get('brand/product/delete/{id}', 'delete')->name('brand.product.delete');
    });

    Route::controller(BannerController::class)->group(function () {
        Route::get('banner/product', 'index')->name('index.banner.product');
        Route::get('banner/product/add', 'add')->name('banner.add');
        Route::post('banner/product/store', 'store')->name('banner.store');
        Route::get('banner/product/edit/{id}', 'edit')->name('banner.edit');
        Route::post('banner/product/update', 'update')->name('banner.update');
        Route::get('banner/product/delete/{id}', 'delete')->name('banner.delete');
    });

    //filter
    Route::controller(FilterController::class)->group(function () {
        Route::any('filter/user', 'userFilter')->name('user.filter');
        Route::post('user/brand/filter', 'brandFilter')->name('user.brand.filter');
    });
});

Route::group(['middleware' => ['userauth']], function () {
    Route::controller(FilterController::class)->group(function () {
        Route::post('user/brand/filter', 'brandFilter')->name('user.brand.filter');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/user/new', 'index')->name('user');
    });

    Route::controller(PaymentController::class)->group(function () {
        Route::get('user/payment/detail', 'produtPaymentDetail')->name('web.payment.detail');
        Route::post('stripe','stripePost')->name('stripe.post');
    }); 
    
    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('user/subscription/plan', 'index')->name('web.subscription.detail');
        Route::get('user/subscription/{id}', 'paymentSubscription')->name('web.subscription.show');
        Route::post('user/subscription/plan/store', 'buySubscription')->name('web.subscription.store');
    });

    Route::controller(PaypalPaymentController::class)->group(function () {
        Route::post('paypal', 'postPaymentWithpaypal')->name('web.paypal');
        Route::get('sucess', 'success')->name('payment.success');
        Route::get('cancel', 'cancel')->name('payment.cancel');
    });
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('contact', 'contactUs')->name('contact');
    Route::post('contact/store','contactStore')->name('contact.store');
    Route::get('about', 'aboutUs')->name('about');
    Route::get('service', 'servicePage')->name('service');
});

Route::controller(FrontProductController::class)->group(function () {
    Route::get('user/categoryId={id}', 'catgoryProductList')->name('web.category');
    Route::get('user/subcategoryId={id}', 'subcatgoryProductList')->name('web.subcategory');
    Route::get('user/product={id}', 'getproductDetail')->name('web.product.detail');
    Route::post('user/add/card', 'addtoCart')->name('web.product.add');
    Route::post('user/remove/card', 'removetoCart')->name('web.product.remove');
    Route::post('user/change/atter', 'changeAtter')->name('web.product.change.atter');
});


//user login routes
Route::controller(UserLoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('custom-login', 'customLogin')->name('login.custom');
    Route::get('registration', 'registration')->name('register-user');
    Route::post('custom-registration', 'customRegistration')->name('register');
    Route::get('logout', 'signOut')->name('logout');

    //social login
    Route::get('auth/google', 'redirectToGoogle')->name('redirect.google');
    Route::get('auth/google/callback', 'handleGoogleCallback')->name('handel.google');
});

//admin login routes
Route::controller(AdminAuthController::class)->group(function () {
    Route::get('admin/login', 'index')->name('admin.login');
    Route::post('admin/custom-login', 'customLogin')->name('admin.login.custom');
    Route::get('admin/logout', 'signOut')->name('admin.logout');
});

//email verification
Route::controller(UserManageController::class)->group(function () {
    Route::get('{email}/password/{token}', 'passwordVerify')->name('user.email.verify');
    Route::post('/password/change', 'passwordChange')->name('password.change');
});

//Google
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
//Facebook
Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);
//Github
Route::get('/login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('/login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);

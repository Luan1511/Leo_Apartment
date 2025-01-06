<?php

use App\Events\MessageSent;
use App\Http\Controllers\Admin\AccountController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\ApartmentController;
=======
use App\Http\Controllers\Admin\Banner;
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
use App\Http\Controllers\Admin\BannerController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\LaptopController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BuyingApartmentController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\NotifyController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RentingApartmentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
<<<<<<< HEAD
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PusherController;
=======
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\RatingController;
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use App\Http\Middleware\AuthAdmin;
use App\Mail\LeoEmail;
use App\Models\Admin\Apartment;
use App\Models\Admin\BookingApartment;
use App\Models\Admin\BuyingApartment;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Temp route views
Route::view('/apartmentTest', 'Admins.components.apartments.list');


// Pages
Route::get('/', [PagesController::class, 'getHome'])->name('home-page');
Route::get('about', [PagesController::class, 'getAbout'])->name('about-page');
// --contact
Route::get('contact', [PagesController::class, 'getContact'])->name('contact-page');
Route::get('test-email', function () {
    Mail::raw('This is a test email from Laravel!', function ($message) {
        $message->to('luanpvc.23ai@vku.udn.vn')
            ->subject('Test Email');
    });

    return 'Email sent successfully!';
});

// --service
Route::get('service', [PagesController::class, 'getService'])->name('service-page');
Route::get('service/{id}', [ServiceController::class, 'serviceDetail'])->name('service-detail');

// Apartments page
Route::get('apartments-page', [PagesController::class, 'getApartmentsPage'])->name('apartments-page');
Route::get('/apartment/search', [ApartmentController::class, 'searchInPage'])->name('search-page');

// Products page
Route::get('product-page', [PagesController::class, 'getProductPage'])->name('product-page');
Route::get('/product-page/search', [PagesController::class, 'searchInPage'])->name('search-page');
Route::get('/product/search', [PagesController::class, 'searchInSinglePage'])->name('search-filter');

// Wishlist routes
Route::get('wishlist/{id}', [PagesController::class, 'getWishlist'])->name('wishlist-page');
Route::get('getWishlist', [WishListController::class, 'getWishlist'])->name('getWishlist');
Route::get('wishlist/{id}/add', [WishListController::class, 'add'])->name('addToWishlist');
Route::get('wishlist/{id}/delete', [WishListController::class, 'remove'])->name('removeFromWishlist');

// Cart routes
Route::get('cart/{id}', [PagesController::class, 'getCart'])->name('cart-page');
Route::get('getCart', [CartController::class, 'getCart'])->name('getCart');
Route::get('cart/{id}/addSingle', [CartController::class, 'addSingle'])->name('addSingleToCart');
Route::get('cart/add/{id}/{qty}', [CartController::class, 'addByQuantity'])->name('addMultiToCart');
Route::get('cart/{id}/{qty}', [CartController::class, 'updateQuantity'])->name('updateQuantity');
Route::get('cart/{id}/delete', [CartController::class, 'remove'])->name('removeFromCart');

Route::get('checkout', [PagesController::class, 'getCheckout'])->name('checkout-page');
Route::get('cart', [PagesController::class, 'getCart'])->name('cart-page');
Route::get('login', [LoginController::class, 'getLogin'])->name('login-page');
Route::post('login', [LoginController::class, 'postLogin'])->name('post-login');
Route::get('register', [LoginController::class, 'getRegister'])->name('register-page');
Route::post('register', [LoginController::class, 'postRegister'])->name('post-register');
<<<<<<< HEAD

// Profile
Route::get('/profile/{type}/{content}', [ProfileController::class, 'show'])->name('profile-page');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('user-update');
Route::get('myApartment', [ProfileController::class, 'getMyApartment'])->name('getMyApartment');
// --buy
Route::get('buyRequest/get', [ProfileController::class, 'getBuyRequest'])->name('user-getBuyRequest');
Route::get('buyRequest/getResponsing', [ProfileController::class, 'getBuyRequestResponsing'])->name('user-getBuyRequestResponsing');
Route::get('buyRequest/getApproved', [ProfileController::class, 'getBuyRequestApproved'])->name('user-getBuyRequestApproved');
Route::get('buyRequest/getDenied', [ProfileController::class, 'getBuyRequestDenied'])->name('user-getBuyRequestDenied');
// --rent
Route::get('rentRequest/get', [ProfileController::class, 'getRentRequest'])->name('user-getRentRequest');
Route::get('rentRequest/getResponsing', [ProfileController::class, 'getRentRequestResponsing'])->name('user-getRentRequestResponsing');
Route::get('rentRequest/getApproved', [ProfileController::class, 'getRentRequestApproved'])->name('user-getRentRequestApproved');
Route::get('rentRequest/getDenied', [ProfileController::class, 'getRentRequestDenied'])->name('user-getRentRequestDenied');
// -- bills
Route::get('/rentings/{id}/calendar', [RentingApartmentController::class, 'getRentalCalendar']);
Route::post('/rentings/{id}/mark-paid', [RentingApartmentController::class, 'markMonthAsPaid']);
Route::get('/profile/bill/{id}/detail', [ProfileController::class, 'detailBill']);
// -- maintain
Route::get('report', [ProfileController::class, 'maintainRequest']);
Route::post('report/create', [ProfileController::class, 'createMaintainRequest'])->name('createMaintainRequestHandle');


=======
// Route::get('profile', [PagesController::class, 'getProfile'])->name('profile-page');
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
Route::get('logout', [LoginController::class, 'getLogout'])->name('logout');
Route::post('check_login', [PagesController::class, 'check_login']);
Route::get('loginAdmin', [LoginController::class, 'getLoginAdmin'])->name('loginAdmin');
Route::post('loginAdmin', [LoginController::class, 'postLoginAdmin'])->name('loginAdmin');
Route::post('send-email', [ContactController::class, 'sendEmail'])->name('send.email');

<<<<<<< HEAD
// Checkout
Route::post('checkout/buyApart', [BuyingApartmentController::class, 'buyApart'])->name('buy-apartment');
Route::post('checkout/rentApart', [RentingApartmentController::class, 'rentApart'])->name('rent-apartment');

// Single Apartment
Route::get('apartment/{id}', [PagesController::class, 'getSingleApartment'])->name('single-apartment');
// Route::get('apartment/search/{name}', [PagesController::class, 'getApartmentByName'])->name('single-apartment-name');
// Route::get('apartment/{id}/getDetail', [PagesController::class, 'getDetailApartment'])->name('getDetailApartment');
=======
// Order
Route::post('/apply-voucher', [OrderController::class, 'applyVoucher'])->name('apply-voucher');
Route::post('checkout/place-order', [OrderController::class, 'placeOrder'])->name('place-order');

// Single Laptop
Route::get('laptop/{id}', [PagesController::class, 'getSingleLaptop'])->name('single-laptop');
Route::get('laptop/search/{name}', [PagesController::class, 'getLaptopByName'])->name('single-laptop-name');
Route::get('laptop/{id}/getDetail', [PagesController::class, 'getDetailLaptop'])->name('getDetailLaptop');
// Compare
Route::get('laptop/fetch/compare/{id}', [PagesController::class, 'getLaptopCompare']);
Route::get('laptop/compare/{id_1}/{id_2}', [PagesController::class, 'comparePage']);
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10

// Language
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'vi'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('changeLanguage');

// Search
Route::get('/search', [PagesController::class, 'search'])->name('search');

<<<<<<< HEAD
// Actions in list apartments
Route::get('apartment/{id}/buy', [PagesController::class, 'buyApart'])->name('buyApartment');
Route::get('apartment/{id}/rent', [PagesController::class, 'rentApart'])->name('rentApartment');

Route::prefix('community')->group(function () {
    Route::get('/create-form', [PagesController::class, 'getCommunityCreatePost'])->name('community-createForm');
    Route::post('/community-posts', [CommunityPostController::class, 'store'])->name('community-posts.store');
    Route::get('/', [CommunityPostController::class, 'index'])->name('community.index');
    Route::post('/post', [CommunityPostController::class, 'store']);
    Route::get('/post/{id}', [CommunityPostController::class, 'show']);
    Route::post('/post/{id}/comment', [CommentController::class, 'store']);
    Route::middleware('admin')->group(function () {
        Route::get('/post/{id}/delete', [CommunityPostController::class, 'remove']);
    });
    Route::post('/post/comment/{id}/reply', [CommentController::class, 'reply'])->name('comments.reply');
});

// Chatting
Route::prefix('chatting')->group(function () {
    Route::get('/', 'App\Http\Controllers\PusherController@index');
    Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
    Route::post('/receive', 'App\Http\Controllers\PusherController@receive');
=======

Route::prefix('chatting')->group(function () {
    Route::get('/', [PusherController::class, 'index']);
    Route::post('/broadcast', [PusherController::class, 'broadcast']);
    Route::post('/receive', [PusherController::class, 'receive']);
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    Route::get('/messages', [PusherController::class, 'fetchMessages'])->name('messages.fetch');
    Route::get('/messages/{id}', [PusherController::class, 'fetchMessagesAdmin_user']);
});

<<<<<<< HEAD
// Notify
Route::prefix('notify')->group(function () {
    Route::get('/', [NotificationController::class, 'getNoti']);
    Route::get('/read/{id}', [NotificationController::class, 'readNoti']);
    Route::get('/delete/{id}', [NotificationController::class, 'removeNoti']);
=======
Route::prefix('notify')->group(function () {
    Route::get('/', [NotifyController::class, 'getNoti']);
    Route::get('/read/{id}', [NotifyController::class, 'readNoti']);
    Route::get('/delete/{id}', [NotifyController::class, 'removeNoti']);
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    // Route::post('/receive', [NotifyController::class, 'receive']);
    // Route::get('/messages', [NotifyController::class, 'fetchMessages'])->name('messages.fetch');
    // Route::get('/messages/{id}', [NotifyController::class, 'fetchMessagesAdmin_user']);
});

<<<<<<< HEAD
=======

// Router User
Route::prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profileView'])->name('profile-page');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('user-update');
    // Purchase
    Route::get('purchase', [ProfileController::class, 'purchaseView']);
    Route::get('purchase/making', [ProfileController::class, 'purchaseMaking']);
    Route::get('purchase/delivering', [ProfileController::class, 'purchaseDelivering']);
    Route::get('purchase/completed', [ProfileController::class, 'purchaseCompleted']);
    Route::get('purchase/denied', [ProfileController::class, 'purchaseDenied']);
    Route::get('purchase/received/{id}', [ProfileController::class, 'purchaseReceived']);
    // Voucher
    Route::get('voucher/create/{discount}', [ProfileController::class, 'createVoucher']);
    Route::get('voucher', [ProfileController::class, 'voucherView']);
    // Report
    Route::get('report', [ProfileController::class,'reportView']);
    Route::post('report/create', [ProfileController::class, 'createReport'])->name('createReportHandle');
    // Route::post('report/createHandle', [ProfileController::class, 'createReportHandle'])->name('createReportHandle');
    // Route::get('report/view/{id}', [ProfileController::class, 'viewReport']);
});

>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
// Router Admin
Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', [AdminAdminController::class, 'getAdminDashboard'])->name('admin-dashboard-page');

        // Apartment
        Route::prefix('apartment')->group(function () {
            Route::get('get', [ApartmentController::class, 'getApartment'])->name('admin-getApartment');
            Route::get('show', [ApartmentController::class, 'showApartment'])->name('admin-showApartment');
            Route::get('add', [ApartmentController::class, 'addApartment'])->name('admin-showAddApartment');
            Route::post('addHandle', [ApartmentController::class, 'addApartmentHandle'])->name('admin-addApartmentHandle');
            Route::get('{id}/detail', [ApartmentController::class, 'showDetailApartment'])->name('admin-detailApartment');
            Route::get('{id}/delete', [ApartmentController::class, 'destroy'])->name('admin-destroyApartment');
            Route::get('{id}/edit', [ApartmentController::class, 'edit'])->name('admin-editApartment');
            Route::put('{id}/edit', [ApartmentController::class, 'update'])->name('admin-updateApartment');
        });

        // Service
        Route::prefix('service')->group(function () {
            Route::get('get', [ServiceController::class, 'getService'])->name('admin-getService');
            Route::get('show', [ServiceController::class, 'showService'])->name('admin-showService');
            Route::get('add', [ServiceController::class, 'addService'])->name('admin-showAddService');
            Route::post('addHandle', [ServiceController::class, 'addServiceHandle'])->name('admin-addServiceHandle');
            Route::get('{id}/detail', [ServiceController::class, 'showDetailService'])->name('admin-detailService');
            Route::get('{id}/delete', [ServiceController::class, 'destroy'])->name('admin-destroyService');
            Route::get('{id}/edit', [ServiceController::class, 'edit'])->name('admin-editService');
            Route::put('{id}/edit', [ServiceController::class, 'update'])->name('admin-updateService');
        });

        // Account
        Route::prefix('account')->group(function () {
            Route::get('get', [AccountController::class, 'getAccount'])->name('admin-getAccount');
            Route::get('show', [AccountController::class, 'showAccount'])->name('admin-showAccount');
            Route::get('{id}/delete', [AccountController::class, 'destroy'])->name('admin-destroyAccount');
        });

        // Orders
        Route::prefix('order')->group(function () {
            Route::get('get', [OrderController::class, 'getOrder'])->name('admin-getOrder');
            Route::get('getNotApproved', [OrderController::class, 'getOrderNotApproved'])->name('admin-getOrderNotApproved');
            Route::get('getApproved', [OrderController::class, 'getOrderApproved'])->name('admin-getOrderApproved');
            Route::get('show', [OrderController::class, 'showOrder'])->name('admin-showOrder');
            Route::get('{id}/detail', [OrderController::class, 'detail'])->name('admin-detailOrder');

            // Actions
            Route::get('{id}/deny', [OrderController::class, 'deny'])->name('admin-denyOrder');
            Route::get('{id}/delete', [OrderController::class, 'delete'])->name('admin-deleteOrder');
            Route::get('{id}/approve', [OrderController::class, 'approve'])->name('admin-approveOrder');
        });

        // Buy requests
        Route::prefix('buyRequest')->group(function () {
            Route::get('get', [BuyingApartmentController::class, 'getBuyRequest'])->name('admin-getBuyRequest');
            Route::get('show', [BuyingApartmentController::class, 'showBuyRequest'])->name('admin-showBuyRequest');
            Route::get('{id}/detail', [BuyingApartmentController::class, 'detail'])->name('admin-detailBuyRequest');

            // Actions
            Route::get('{id}/deny', [BuyingApartmentController::class, 'deny'])->name('admin-denyBuyRequest');
            Route::get('{id}/delete', [BuyingApartmentController::class, 'delete'])->name('admin-deleteBuyRequest');
            Route::get('{id}/{user}/approve', [BuyingApartmentController::class, 'approve'])->name('admin-approveBuyRequest');
        });

        // Rent requests
        Route::prefix('rentRequest')->group(function () {
            Route::get('get', [RentingApartmentController::class, 'getRentRequest'])->name('admin-getRentRequest');
            Route::get('show', [RentingApartmentController::class, 'showRentRequest'])->name('admin-showRentRequest');
            Route::get('{id}/detail', [RentingApartmentController::class, 'detail'])->name('admin-detailRentRequest');

            // Actions
            Route::get('{id}/deny', [RentingApartmentController::class, 'deny'])->name('admin-denyRentRequest');
            Route::get('{id}/delete', [RentingApartmentController::class, 'delete'])->name('admin-deleteRentRequest');
            Route::get('{id}/approve', [RentingApartmentController::class, 'approve'])->name('admin-approveRentRequest');
        });

        // Payment method
        Route::prefix('payment')->group(function () {
            Route::get('get', [PaymentController::class, 'getPayment'])->name('admin-getPayment');
            Route::get('show', [PaymentController::class, 'showPayment'])->name('admin-showPayment');
            Route::get('add', [PaymentController::class, 'addPayment'])->name('admin-addPayment');
            Route::post('addHandle', [PaymentController::class, 'addPaymentHandle'])->name('admin-addPayment-handle');
            Route::get('{id}/delete', [PaymentController::class, 'destroy'])->name('admin-destroyPayment');
            Route::get('{id}/edit', [PaymentController::class, 'edit'])->name('admin-editPayment');
            Route::put('{id}/edit', [PaymentController::class, 'update'])->name('admin-updatePayment');
        });

        // Banner
        Route::prefix('banner')->group(function () {
            Route::get('getAdsBanner', [BannerController::class, 'getAdsBanner'])->name('admin-getAdsBanner');
            Route::get('show', [BannerController::class, 'showBanner'])->name('admin-showBanner');
            Route::post('update', [BannerController::class, 'updateBanners'])->name('admin-addBanner');
            Route::get('delete/{id}', [BannerController::class, 'destroy'])->name('admin-destroyBanner');
        });
    });
});

Route::get('verify-account/{email}', [LoginController::class, 'verify'])->name('verify');

Route::get('change-password', [LoginController::class, 'change_password'])->name('change_password');
Route::post('change-password', [LoginController::class, 'check_change_password'])->name('check_change_password');

Route::get('forgot-password', [LoginController::class, 'forgot_password'])->name('forgot_password');
Route::post('forgot-password', [LoginController::class, 'check_forgot_password'])->name('check_forgot_password');

Route::get('reset-password/{token}', [LoginController::class, 'reset_password'])->name('reset_password');
Route::post('reset-password/{tokenn}', [LoginController::class, 'check_reset_password'])->name('check_forgot_password');

Route::get('laptop/{id}comment/fetch', [RatingController::class, 'getAllComment'])->name('comment-section');
Route::get('comment/{id}', [RatingController::class, 'getComment'])->name('comment-page');
// Route::group(['prefix' => 'ajax', 'middleware' => 'CheckLoginUser'], function () {
    Route::post('comment/post', [RatingController::class, 'saveRating'])->name('post.rating.product');
// });

// Handle errors
Route::prefix('error')->group(function () {
    Route::get('point', [ErrorController::class, 'error_point'])->name('error.point');
});
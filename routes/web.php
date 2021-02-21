<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'PageController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::redirect('/home', '/');

Route::redirect('/admin', '/');

Route::get('register/verify/{confirmationCode}', 'UserDashboardController@confirm');
Route::redirect('/submit', '/');
// Searching Routes
Route::get('search', 'SearchController@homeSearch');
Route::get('filtersearch', 'SearchController@filterSearch');
Route::get('homefilter', 'SearchController@filter');
Route::get('allfilter', 'SearchController@allfilter');
Route::get('blogsearch', 'SearchController@blogSearch');


Route::get('home-list', 'PageController@list_show');
Route::get('category', 'PageController@category_show');
Route::get('category-dtl/{slug}', 'PageController@cat_dtl_show');
Route::get('coupon', 'PageController@coupon_show');
Route::get('coupon-dtl/{slug}', 'PageController@coupon_dtl_show');
Route::get('forum', 'PageController@forum_show');
Route::get('deal-dtl/{slug}', 'PageController@deal_dtl_show');
Route::get('deal', 'PageController@deal_show');
Route::get('discussion', 'PageController@discussion_show');
Route::get('discussion-dtl/{$slug}', 'PageController@forum_dtl_show');
Route::get('forum-dtl/{slug}', 'PageController@forum_dtl_show');
Route::get('post/{uniID}/{slug}', 'PageController@post_show')->name('postpage');
Route::get('store', 'PageController@store_show');
Route::get('store-dtl/{slug}', 'PageController@store_dtl_show');
Route::get('faq', 'PageController@faq_show');
Route::get('tag/{slug}', 'PageController@tag_show');
Route::get('blog', 'PageController@blog_show');
Route::get('blog-dtl/{uniId}/{slug}', 'PageController@blog_dtl_show');
Route::get('contact', 'PageController@contact_show')->name('contact');
Route::post('contact', 'PageController@contact_post');
Route::get('counter', 'PageController@post_counter');

Route::get('profile/{id}', 'PageController@profile_show');


// Admin Dashboard Routes
Route::group(['middleware' => ['web','auth','is_admin']], function () {
    Route::get('/admin', 'AdminDashboardController@dashboard_show');
    Route::get('admin/profile', function () {
        $auth = Auth::user();
        return view('admin.profile', compact('auth'));
    });
    Route::post('admin/profile-update', 'AdminDashboardController@update_profile');
    Route::resource('admin/category', 'CategoryController');
    Route::post('admin/category/bulk_delete', 'CategoryController@bulk_delete');
    Route::resource('admin/store', 'StoreController');
    Route::post('admin/store/bulk_delete', 'StoreController@bulk_delete');
    Route::resource('admin/forumcategory', 'ForumCategoryController');
    Route::post('admin/forumcategory/bulk_delete', 'ForumCategoryController@bulk_delete');
    Route::resource('admin/discussion', 'DiscussionController');
    Route::post('admin/discussion/bulk_delete', 'DiscussionController@bulk_delete');
    Route::resource('admin/coupon', 'CouponController');
    Route::post('admin/coupon/bulk_delete', 'CouponController@bulk_delete');
    Route::get('dropdown', 'CouponController@dropdown');
    // Route::resource('admin/deal', 'DealController');
    //  Route::post('admin/deal/bulk_delete', 'DealController@bulk_delete');
    Route::resource('admin/user', 'UserController');
    Route::post('admin/user/bulk_delete', 'UserController@bulk_delete');
    Route::resource('admin/faqcategory', 'FaqCategoryController');
    Route::post('admin/faqcategory/bulk_delete', 'FaqCategoryController@bulk_delete');
    Route::resource('admin/faq', 'FaqController');
    Route::post('admin/faq/bulk_delete', 'FaqController@bulk_delete');
    Route::resource('admin/social', 'SocialController');
    Route::post('admin/social/bulk_delete', 'SocialController@bulk_delete');
    Route::resource('admin/slider', 'SliderController');
    Route::post('admin/slider/bulk_delete', 'SliderController@bulk_delete');
    Route::patch('admin/slider_update/{id}', 'AdminDashboardController@slider_update');
    Route::get('admin/settings', 'SettingsController@general_show');
    Route::patch('admin/settings_update/{id}', 'SettingsController@general_update');
    Route::resource('admin/comment', 'CommentController');
    Route::post('admin/comment/status/{id}', 'CommentController@status_update');
    Route::post('admin/comment/bulk_delete', 'CommentController@bulk_delete');
    Route::resource('admin/tag', 'TagController');
    Route::post('admin/tag/bulk_delete', 'TagController@bulk_delete');
    Route::resource('admin/blog', 'BlogController');
    Route::post('admin/blog/bulk_delete', 'BlogController@bulk_delete');
    Route::resource('admin/pages', 'PagesController');
    Route::post('admin/pages/bulk_delete', 'PagesController@bulk_delete');
});

// User Dashboard Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('user/profile-edit', 'UserDashboardController@profile_edit');
    Route::patch('user/profile-update/{id}', 'UserDashboardController@profile_update');
    Route::patch('user/profile-edit', 'UserDashboardController@change_password');
});

// User Dashboard Routes
Route::group(['middleware' => ['auth','is_verified']], function () {
    Route::post('submit-coupon', 'UserDashboardController@coupon_post');
    Route::post('submit-discussion', 'UserDashboardController@discussion_post');
    Route::get('user/account', 'UserDashboardController@dashboard_show');
    Route::post('profile/follow', 'UserDashboardController@follow_user')->name('user.follow');
    Route::post('post/like', 'UserDashboardController@post_like')->name('post.like');
    //Route::get('submit', 'UserDashboardController@deal_submit');
    Route::post('post/write', 'UserDashboardController@comment_store')->name('post.write');
    // Route::post('post/count', 'UserDashboardController@post_counter')->name('post.counter');
});


// OAuth Routes
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Mail Subscription
Route::post('emailsubscribe', 'EmailSubscribeController@subscribe');

Route::get('{page}', 'PageController@page_show');

<?php

namespace App\Providers;

use Auth;
use App\Social;
use App\Settings;
use App\Store;
use App\ForumCategory;
use App\Category;
use App\Coupon;
use App\Discussion;
use App\Pages;
use App\Blog;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{        
		Schema::defaultStringLength(191);

		view()->composer('*', function ($view)
		{			
			$p_store = Store::where('is_active','1')->where('is_featured','1')->get()->take(5);
			$blogs=Blog::where('is_active','1')->orderBy('created_at','desc')->get()->take(5);
			$r_post = collect();
			$r_post->push(Coupon::where('is_active','1')->orderBy('created_at','desc')->get()->take(5));
			$r_post->push(Discussion::where('is_active','1')->orderBy('created_at','desc')->get()->take(5));
			$r_post = $r_post->flatten()->sortbydesc('created_at')->take(5);
			$forumcategory = ForumCategory::all();
			$coupon = Coupon::where('type','c')
											->where('is_active','1')
								      ->where('is_verified','1')
								      ->where('is_featured','1')->orderBy('created_at','desc')->get();
			$category = Category::where('is_active','1')->get();
			$store = Store::where('is_active','1')->orderBy('created_at', 'DESC')->get();
            $featured = Store::where('is_active','1')->where("is_featured",1)->orderBy('created_at', 'DESC')->get();
			$social = Social::all();
			$settings = Settings::first();
			$auth = Auth::user();
			$footer = Pages::all();
			$view->with(['auth' => $auth, 'social' => $social, 'settings' => $settings, 'category_list' => $category, 'forumcategory_list' => $forumcategory, 'store_list' => $store, 'f_coupon' => $coupon, 'featured_stores'=>$featured,'p_store' => $p_store, 'r_post' => $r_post, 'f_menu' => $footer,'blogs_side' => $blogs]);
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		
		Schema::defaultStringLength(191);
		//utilisa esto para enviar la variable globalmente al inicio de index de Post
		view()->composer('partials.navigation', function ($view) {
				return $view->with('muestras', \Auth::user()->unreadNotifications()->count());
			});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}

<?php

if (! function_exists('multiAuth')) {
	function multiAuth($guard = null){
		return Illuminate\Support\Facades\Auth::guard($guard);
	}
}

if (! function_exists('multiAuthLoginRoutes')) {
	function multiAuthLoginRoutes($controller = "Auth\AuthController"){
		app('router')->get('login', "$controller@showLoginForm");
	    app('router')->get('logout', "$controller@logout");
	    app('router')->post('login', "$controller@login");
	}
}

if (! function_exists('multiAuthRegisterRoutes')) {
	function multiAuthRegisterRoutes($controller = "Auth\AuthController"){
	    app('router')->get('register', "$controller@showRegistrationForm");
	    app('router')->post('register', "$controller@register");
	}
}

if (! function_exists('multiAuthPasswordRoutes')) {
	function multiAuthPasswordRoutes($controller = "Auth\AuthController"){
	    app('router')->get('password/reset/{token?}', "$controller@showResetForm");
	    app('router')->post('password/email', "$controller@sendResetLinkEmail");
	    app('router')->post('password/reset', "$controller@reset");
	}
}

if (! function_exists('multiAuthRoutes')) {
	function multiAuthRoutes($controller = "Auth\AuthController"){
		multiAuthLoginRoutes($controller);
		multiAuthRegisterRoutes($controller);
		multiAuthPasswordRoutes($controller);
	}
}
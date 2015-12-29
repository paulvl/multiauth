<?php

if (! function_exists('multiAuth')) {
	function multiAuth($guard = null){
		return Illuminate\Support\Facades\Auth::guard($guard);
	}
}

if (! function_exists('multiAuthLoginRoutes')) {
	function multiAuthLoginRoutes($controller = "Auth\AuthController"){
		app('router')->get('login', "$controller@getLogin");
	    app('router')->get('logout', "$controller@getLogout");
	    app('router')->post('login', "$controller@postLogin");
	}
}

if (! function_exists('multiAuthRegisterRoutes')) {
	function multiAuthRegisterRoutes($controller = "Auth\AuthController"){
	    app('router')->get('register', "$controller@getRegister");
	    app('router')->post('register', "$controller@postRegister");
	}
}

if (! function_exists('multiAuthPasswordRoutes')) {
	function multiAuthPasswordRoutes($controller = "Auth\PasswordController"){
	    app('router')->get('password/reset/{token?}', "$controller@getEmail");
	    app('router')->post('password/email', "$controller@postEmail");
	    app('router')->post('password/reset', "$controller@getReset");
	}
}

if (! function_exists('multiAuthRoutes')) {
	function multiAuthRoutes($controller = "Auth\AuthController"){
		multiAuthLoginRoutes($controller);
		multiAuthRegisterRoutes($controller);
		multiAuthPasswordRoutes($controller);
	}
}
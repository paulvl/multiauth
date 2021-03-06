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
	    app('router')->get('password/email', "$controller@getEmail");
	    app('router')->post('password/email', "$controller@postEmail");
	    app('router')->get('password/reset/{token?}', "$controller@getReset");
	    app('router')->post('password/reset', "$controller@postReset");
	}
}

if (! function_exists('multiAuthRoutes')) {
	function multiAuthRoutes($authController = "Auth\AuthController", $passwordController = "Auth\PasswordController"){
		multiAuthLoginRoutes($authController);
		multiAuthRegisterRoutes($authController);
		multiAuthPasswordRoutes($passwordController);
	}
}
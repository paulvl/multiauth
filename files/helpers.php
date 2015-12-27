<?php

if (! function_exists('multiAuth')) {
	function multiAuth($guard = null){
		return Illuminate\Support\Facades\Auth::guard($guard);
	}
}
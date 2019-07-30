<?php

namespace App\Helpers;

use App\User;
use App\Role;
use Auth;


class Helper {

	public static function truncate($string, $length = 200){
    	$limit=abs((int)$length);
    	if(strlen($string)>$limit){
    		$string=preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1...',$string);
		}
    	return $string;
   	}
}
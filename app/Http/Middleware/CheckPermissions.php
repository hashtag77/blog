<?php
namespace App\Http\Middleware;

use Closure;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $permissions = include("acl.php");
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('@', $controllerAction);
        if( array_key_exists($controller, $permissions) && in_array( $action, $permissions[$controller] ) ) {
            return redirect('/')->with('error','Sorry!!! You cannot perform this action.');
        } 
        else {
            return $next($request);
        }
    }
}

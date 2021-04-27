<?php

namespace App\Http\Middleware;
use App\Posts;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // to do: check neu khong co quyen
        // session storage -> get role
        $roles = Auth::user()->role;
        $array_roles = explode(',',$roles);
        if (!in_array('1', $array_roles) && !in_array(strval($role), $array_roles)) {
            return redirect('admin');
        }
        return $next($request);
    }
}

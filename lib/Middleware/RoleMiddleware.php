<?php

namespace NikitinUser\userManagementModule\lib\Middleware;

use Closure;
use NikitinUser\userManagementModule\lib\Helpers\HasRoles;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role = "")
    {
        if (!auth()?->check()) {
            return response('Unauthorized.', 401);
        }

        $role = preg_replace("/[^0-9 A-Za-z]/", "", $role);
        if (empty($role)) {
            return response('Bad role.', 400);
        }

        if (!HasRoles::hasRole(auth()->user()->id, $role)) {
            return response('Unavailable.', 403);
        }

        return $next($request);
    }
}

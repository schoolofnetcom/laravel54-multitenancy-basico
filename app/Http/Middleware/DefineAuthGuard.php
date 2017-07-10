<?php

namespace App\Http\Middleware;

use App\Tenant\TenantManager;
use Closure;

class DefineAuthGuard
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
        /** @var TenantManager $tenantManager */
        $tenantManager = app(TenantManager::class);
        if(!$tenantManager->getTenant() && !$tenantManager->isSubdomainExcept()){
            abort(404);
        }


        if(!$tenantManager->isSubdomainExcept()){
            config([
                'auth.defaults.guard' => 'web_tenants',
                'auth.defaults.passwords' => 'user_accounts'
            ]);
        }
        return $next($request);
    }
}

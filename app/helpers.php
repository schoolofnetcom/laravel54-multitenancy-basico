<?php

if (!function_exists('routeTenant')) {
    function routeTenant($name, $params = [], $absolute = true)
    {
        $tenantManager = app(\App\Tenant\TenantManager::class);
        $tenantParam = $tenantManager->routeParam();
        return route($name, $params + [
                config('tenant.route_param') => $tenantParam
            ], $absolute);
    }
}

if (!function_exists('layoutTenant')) {
    function layoutTenant()
    {
        $tenantManager = app(\App\Tenant\TenantManager::class);
        $isSubdomainExcept = $tenantManager->isSubdomainExcept();
        return !$isSubdomainExcept ? 'layouts.app' : 'layouts.admin';
    }
}
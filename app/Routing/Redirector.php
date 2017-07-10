<?php

namespace App\Routing;


use Illuminate\Routing\Redirector as RedirectorLaravel;

class Redirector extends RedirectorLaravel
{
    public function routeTenant($name, $params = [], $status = 302, $headers = [])
    {
        $tenantManager = app(\App\Tenant\TenantManager::class);
        $tenantParam = $tenantManager->routeParam();
        return $this->route($name, $params + [
                config('tenant.route_param') => $tenantParam
            ], $status, $headers);
    }
}
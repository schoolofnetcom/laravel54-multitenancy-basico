<?php
namespace App\Scopes;

use App\Tenant\TenantManager;
use Illuminate\Database\Eloquent\Model;

trait TenantModels
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope());

        static::creating(function(Model $model){
            /** @var TenantManager $tenantManager */
            $tenantManager = app(TenantManager::class);
            if($tenantManager->getTenant()){
                $accountId = $tenantManager->getTenant()->id;
                $model->account_id = $accountId;
            }
        });
    }
}
<?php

namespace Src\Domain\Location\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Src\Domain\Location\Entities\LocationVendors::class => \Src\Domain\Location\Policies\LocationVendorsPolicy::class,
		\Src\Domain\Location\Entities\Locationclients::class => \Src\Domain\Location\Policies\LocationclientsPolicy::class,
		###POLICIES###
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}

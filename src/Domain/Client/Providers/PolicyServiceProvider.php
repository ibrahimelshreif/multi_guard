<?php

namespace Src\Domain\Client\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Src\Domain\Client\Entities\Client::class => \Src\Domain\Client\Policies\ClientPolicy::class,
		\Src\Domain\Client\Entities\Category::class => \Src\Domain\Client\Policies\CategoryPolicy::class,
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

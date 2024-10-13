<?php

namespace App\Providers;

use App\Repositories\Dices\RollHistoryRepository;
use App\Repositories\Dices\RollHistoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RollHistoryRepositoryInterface::class, RollHistoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

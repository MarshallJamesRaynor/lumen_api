<?php
namespace App\Providers;

use App\Order;
use App\Services\OrderGeneratorService;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;


class OrderGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('OrderGeneratorService', function ($app) {
            return new OrderGeneratorService();
        });
    }


}



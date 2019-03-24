<?php
/**
 * Name:  EventServiceProvider
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: ServiceProvider class
 *
 * Requirements: PHP5 or above
 * @package   lamiassignment
 * @author    Paolo Combi
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @since     Version 1.0.0
 * @filesource
 *
 *
 */
namespace App\Providers;

use App\Order;
use App\Services\OrderGeneratorService;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

/**
 * OrderGeneratorServiceProvider
 **
 *
 * @package     lamiassignment
 * @category    ServiceProvider
 * @author      Paolo Combi
 */
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



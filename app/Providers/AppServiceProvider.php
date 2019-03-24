<?php
/**
 * Name:  AppServiceProvider
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
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

/**
 * AppServiceProvider
 **
 *
 * @package     lamiassignment
 * @category    ServiceProvider
 * @author      Paolo Combi
 */
class AppServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
    //    Resource::withoutWrapping();
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

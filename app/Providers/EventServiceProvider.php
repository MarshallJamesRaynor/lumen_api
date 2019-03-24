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

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;
/**
 * EventServiceProvider
 **
 *
 * @package     lamiassignment
 * @category    ServiceProvider
 * @author      Paolo Combi
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ExampleEvent' => [
            'App\Listeners\ExampleListener',
        ],
    ];
}

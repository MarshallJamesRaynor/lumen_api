<?php
/**
 * Name:  AfterOrder
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: class used to do something after all the operation
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
namespace App\Http\Middleware;
use Closure;
/**
 * AfterOrder
 *
 * middleware use to do something after all the operation
 *
 * @package     lamiassignment
 * @category    Middleware
 * @author      Paolo Combi
 */

class AfterOrder
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Perform action

        return $response;
    }
}

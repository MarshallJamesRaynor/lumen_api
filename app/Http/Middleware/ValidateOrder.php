<?php
/**
 * Name:  ValidateOrder
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: class used to validate the order value
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
use Validator;
use Illuminate\Validation\Rule;
/**
 * ValidateOrder
 *
 * middleware use to validate the value before the execution
 *
 * @package     lamiassignment
 * @category    Middleware
 * @author      Paolo Combi
 */
class ValidateOrder
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'country' => 'required|string|exists:countries,name',
            'format_invoice' =>  [
                'required',
                Rule::in(['json', 'html']),
            ],
            'send_email' => 'required|boolean',
            'product.*.uuid' => 'required|uuid|exists:products',
            'product.*.quantity' => 'required|numeric',
        ]);

        if($validator->passes()){
            return $next($request);
        }else{
            return $validator->errors();
        }
    }
}

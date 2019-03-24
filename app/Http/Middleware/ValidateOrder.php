<?php
namespace App\Http\Middleware;
use Closure;
use Validator;
use Illuminate\Validation\Rule;

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
            'country' => 'required|string|max:50',
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

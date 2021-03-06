<?php
/**
 * Name:  Order
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: definition of JsonResource class
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
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * Order
 *
 * class used for transforming collections of models
 *
 * @package     lamiassignment
 * @category    Resources
 * @author      Paolo Combi
 */
class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'order',
            'uuid' => (string) $this->uuid,
            'attributes' =>[
                'invoice_number' =>  (boolean) $this->invoices_number,
                'data' =>  (boolean)  $this->invoices_data,
                'total_price' => $this->total_products,
                'discount' => (string) $this->total_discount,
                'total_tax' => (boolean) $this->total_paid_tax,
                'total' =>  $this->total_paid,

            ],
            'links' => [
                'self' => route('order.show', ['uuid' => $this->uuid]),
            ]
        ];
    }
    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'jsonapi' => [
                'version' => env('APP_VERSION_API'),
            ],
        ];
    }
}

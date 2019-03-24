<?php
/**
 * Name:  Product
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
 * Product
 *
 * class used for transforming collections of models
 *
 * @package     lamiassignment
 * @category    Resources
 * @author      Paolo Combi
 */
class Product extends JsonResource
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
            'type' => 'product',
            'uuid' => (string) $this->uuid,
            'attributes' =>[
                'price' => $this->price,
                'name' => (string) $this->name,
                'ean' =>  $this->ean,
                'out_of_stock' => (boolean) $this->out_of_stock,
                'on_sale' =>  (boolean) $this->on_sale,
                'active' =>  (boolean)  $this->active,
            ],
            'links' => [
                'self' => route('product.show', ['uuid' => $this->uuid]),
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

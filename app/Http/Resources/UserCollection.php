<?php
/**
 * Name:  UserCollection
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: definition of ResourceCollection class
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
use Illuminate\Http\Resources\Json\ResourceCollection;
/**
 * UserCollection
 *
 * class used for transforming collections of models
 *
 * @package     lamiassignment
 * @category    Resources
 * @author      Paolo Combi
 */
class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
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

<?php
/**
 * Name:  User
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
 * User
 *
 * class used for transforming collections of models
 *
 * @package     lamiassignment
 * @category    Resources
 * @author      Paolo Combi
 */
class User extends JsonResource
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
            'type' => 'user',
            'uuid' => (string) $this->uuid,
            'attributes' =>[
                'name' => (string)$this->username,
                'email' => $this->email,
                'birthday' => $this->birthday,
                'gender' => $this->gender,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
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

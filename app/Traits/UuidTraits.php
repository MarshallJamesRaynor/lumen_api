<?php
/**
 * Name:  UuidTraits
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: Traits class
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
namespace App\Traits;

/**
 * UuidTraits
 *
 * Traits use to extends model function for the UUID field
 * 
 * @package     lamiassignment
 * @category    Traits
 * @author      Paolo Combi
 */
trait UuidTraits
{
    public static function bootHasUUID()
    {
        static::creating(function ($model) {
            $uuidFieldName = $model->getUUIDFieldName();
            if (empty($model->$uuidFieldName)) {
                $model->$uuidFieldName = static::generateUUID();
            }
        });
    }

    public function getUUIDFieldName()
    {
        if (! empty($this->uuidFieldName)) {
            return $this->uuidFieldName;
        }

        return 'uuid';
    }

    public static function generateUUID()
    {
        return \Uuid::generate()->string;
    }

    public function scopeByUUID($query, $uuid)
    {
        return $query->where($this->getUUIDFieldName(), $uuid);
    }

    public static function findByUuid($uuid)
    {
        return static::byUUID($uuid)->first();
    }
}

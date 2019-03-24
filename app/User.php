<?php
/**
 * Name:  User
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description:  The Eloquent ORM included with Laravel provides a beautiful,
 *      simple ActiveRecord implementation for working with your database.
 *      Each database table has a corresponding "Model" which is used to interact with that table.
 *      Models allow you to query for data in your tables, as well as insert new records into the table.
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

namespace App;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Laravel\Passport\HasApiTokens;
/**
 * User
 *
 * Model class used to interact with that table
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */

class User extends Model implements AuthenticatableContract, AuthorizableContract{

    use Authenticatable, Authorizable,HasApiTokens,Traits\UuidTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email',];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password',];

    /**
     * addresses
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the Address model.
     * @return  App\Address[]
     */
    public function addresses(){
        return $this->hasMany('App\Address');
    }

}

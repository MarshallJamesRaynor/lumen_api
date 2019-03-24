<?php
/**
 * Name:  OrderController
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: class used to manage product
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

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;

/**
 * ProductController
 *
 * controller use to manage product API
 *
 * @package     lamiassignment
 * @category    Controllers
 * @author      Paolo Combi
 */
class ProductController extends BaseController


{
    /**
     * show
     *
     * Display the specified Product.
     * @param  uuid $uuid
     * @return ProductResource
     */
    public function show($uuid){

        $validator = Validator::make(['uuid' => $uuid],['uuid' => 'uuid']);

        if($validator->passes()){
            if($product = Product::findByUuid($uuid)){
                return new ProductResource($product);
            }else{
                return $validator->errors();
            }
        }else{
            return $validator->errors();
        }


    }

    /**
     * index
     *
     * Display list of Product.
     *
     * @return ProductCollection
     */
    public function index(){
        return new ProductCollection(Product::paginate());
    }

    /**
     * create
     *
     * create and display a fake product
     *
     * @return ProductResource
     */
    public function create(){
        $product = factory(Product::class, 1)->create();
        return new ProductResource(Product::findByUuid($product[0]->uuid));
    }


}

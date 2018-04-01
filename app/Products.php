<?php

namespace App;

use App\Library\VariableCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Products extends Model
{


    //protected $fillable = ['name', 'author', 'edition', 'price', 'description', 'category_id'];
    protected $guarded = [];

    public static function searchProducts($q){
        $variables = new VariableCollection();
        $terms = explode(" ", $q);
        $query_parts = array();
        foreach ($terms as $val) {
            $query_parts[] = "'%".($val)."%'";
        }

        $string = implode(' OR name LIKE ', $query_parts);
        $q = "select id from products where name like $string or author like $string";
        $results = DB::select($q);

        $ids = [];
        foreach ($results as $result){
            array_push($ids, $result->id);
        }
        $products = Products::whereIn('id', $ids)->get();
        $productImgPrefix = $variables->awsUrlPrefix();
        foreach ($products as $product){
            $product->product_img_url = $productImgPrefix."/".$variables->awsBucketName()."/".$product->img_url;
        }

        return $products;
    }
}

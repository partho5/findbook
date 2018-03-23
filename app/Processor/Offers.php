<?php

/**
 * Created by PhpStorm.
 * User: partho
 * Date: 3/21/18
 * Time: 2:45 PM
 */

namespace App\Processor;

class Offers
{


    function __construct()
    {
    }

    public function getDeliveryCharge($quantity){
        $charge = 0;
        if ($quantity >=1 && $quantity <= 4){
            $charge = 30;
        }
        return $charge;
    }

    public function getDiscount($quantity){
        $discount = 0;
        if($quantity >= 5 && $quantity <= 9){
            $discount = 100;
        }
        if($quantity >= 10 && $quantity <= 19){
            $discount = 200;
        }
        if($quantity >= 20 && $quantity <= 29){
            $discount = 300;
        }
        if($quantity >= 30 && $quantity <= 39){
            $discount = 400;
        }
        if($quantity >= 40 && $quantity <= 49){
            $discount = 500;
        }
        if($quantity >= 50){
            $discount = 600;
        }
        return $discount;
    }
}
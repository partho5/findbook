<?php

/**
 * Created by PhpStorm.
 * User: partho
 * Date: 3/13/18
 * Time: 8:55 PM
 */

namespace App\Library;

class Library
{


    function __construct()
    {
    }

    public function getPricingCalculation($orderedUnit){
        $shippingCost = 30;
        $discount = 0;

        if($orderedUnit < 5){
            $discount = 0;
        }
        elseif($orderedUnit >=5 && $orderedUnit <= 9){
            $discount = 0;
            $shippingCost = 0;
        }
        elseif($orderedUnit >=10 && $orderedUnit <= 19){
            $discount = 100;
            $shippingCost = 0;
        }
        elseif($orderedUnit >=20 && $orderedUnit <= 49){
            $discount = 200;
            $shippingCost = 0;
        }

        return [
            'shippingCost'          => $shippingCost,
            'discount'              => $discount,
        ];

    }
}
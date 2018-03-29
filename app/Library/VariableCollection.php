<?php
/**
 * Created by PhpStorm.
 * User: partho
 * Date: 3/21/18
 * Time: 2:18 PM
 */

namespace App\Library;


class VariableCollection
{

    function __construct()
    {

    }


    public function awsUrlPrefix(){
        return 'https://s3.ap-south-1.amazonaws.com';
    }


    public function awsBucketName(){
        return 'findbook';
    }

    public function awsFolderName(){
        return 'products';
    }

    public function orderStatus(){
        return [

            0   => 'Order cancelled',
            5   => 'Order placed',
            10  => 'Order received',
            15  => 'Shipped to your address',
            20  => 'You received product in hand', // THIS status_code "MUST ALWAYS" BE FIXED, change others if required.

            25  => 'Returned order', //due to damaged product
            30  => 'Change order pending'
        ];
    }


    public $sendMailFrom = 'findbook.link@gmail.com';
    public $mailSubjectOnCreateOrder = "Order Received";
}
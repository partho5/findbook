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
}
<?php

namespace App\Http\Controllers;

use App\Library\VariableCollection;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $variables;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->variables = new VariableCollection();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::where('img_url', '!=', null)->get();
        $productImgPrefix = $this->variables->awsUrlPrefix();

        foreach ($products as $product){
            $product->product_img_url = $productImgPrefix."/".$this->variables->awsBucketName()."/".$product->img_url;
        }

        //return $products;
        if(count($products) == 0){
            return redirect('/product/create');
        }


        return view('pages.index', [
            'products'      => $products,
        ]);



        /*
        $url = "http://code--projects.com/findbook/";
        $storeInfo = $this->getStoreInfo($url);
        $products = $storeInfo['products'];
        $rootCategories = $storeInfo['rootCategories'];

        //dd($products);

        return view('pages.index', [
            'products'         => $products,
            'rootCategories'   => $rootCategories
        ]);
        */
    }



    private function getStoreInfo($url){
        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        return json_decode($result, true);
    }


}

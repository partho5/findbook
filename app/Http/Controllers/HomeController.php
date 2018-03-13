<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();

        return view('pages.index', [
            'products'      => $products,
        ]);

        $url = "http://code--projects.com/findbook/";
        $storeInfo = $this->getStoreInfo($url);
        $products = $storeInfo['products'];
        $rootCategories = $storeInfo['rootCategories'];

        //dd($products);

        return view('pages.index', [
            'products'         => $products,
            'rootCategories'   => $rootCategories
        ]);
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

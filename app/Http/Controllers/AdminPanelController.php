<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{

    function __construct()
    {
        //$this->middleware('auth');
    }


    public function url_get_contents ($Url) {
        if (!function_exists('curl_init')){
            die('CURL is not installed!');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function index(Request $request){

//        $bookData = $this->url_get_contents('http://choriyedao.com/api/books?key=yoyo');
//
//        return view('pages.two_site_data_combine', [
//            'bookData'      => json_decode($bookData)
//        ]);

        return view('pages.admin.orders');
    }
}

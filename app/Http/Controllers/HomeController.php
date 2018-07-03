<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Library\VariableCollection;
use App\Menu;
use App\Products;
use App\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


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
        return view('/home');
    }


    public function showMenus(){
        $menus = Menu::all()->load('submenu');

        dd($menus);
    }

    public function showHomePage(){

        $products = Products::where('price', '>', 0)->get();
        $productImgPrefix = $this->variables->awsUrlPrefix();

        foreach ($products as $product){
            $product->product_img_url = $productImgPrefix."/".$this->variables->awsBucketName()."/".$product->img_url;
        }

        //return $products;
        if(count($products) == 0){
            return redirect('/product/create');
        }

        $submenuId = @$_GET['subcat'];
        $matchedProducts = null; $submenuName = null;
        if($submenuId){
            $submenuName = SubMenu::find($submenuId)->submenu_name;
            $matchedProducts = Products::where('category_id', $submenuId)->get();
        }

        return view('pages/index', [
            'products'              => $products,
            'matchedProducts'       => $matchedProducts,
            'submenuName'           => $submenuName,
        ]);
    }


    public function showCategoryBooks($id){
        $submenu = SubMenu::find($id);
        return $submenu;
        return view('pages/show-category-books');
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

    public function searchQuery(){
        $q = @$_GET['q'];
        $searchResult = Products::searchProducts( $q );

        Mail::send('pages.mail.searched', ['searchResult' => $searchResult, 'q'=>$q], function ($mail) use ($searchResult, $q){
            $mail->from("user@unknown.host", "FindBook Customer");
            $mail->to("findbook.link@gmail.com")->subject($q);
        });

        Session::put('searchResult', $searchResult);
        return redirect('/');
    }

}

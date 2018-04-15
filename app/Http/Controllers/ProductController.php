<?php

namespace App\Http\Controllers;

use App\Library\VariableCollection;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $variables;

    function __construct()
    {
        //$this->middleware('auth');
        $this->variables = new VariableCollection();
    }

    public function index()
    {
        $products = Products::all()->take(20);

        foreach ($products as $product){
            $product->product_img_url = $this->variables->awsUrlPrefix()."/".$this->variables->awsBucketName()."/".$product->img_url;
        }

        return view('pages.product.index', [
            'products'      => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.product.create', [
            'isAdmin'       => $this->isAdmin(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileObj = $request->file('product_img');
        if($fileObj){
            $fileOriginalName = $fileObj->getClientOriginalName();
            $uniqueName = $fileObj->hashName();
            $filePath = ( $this->variables->awsFolderName() )."/$fileOriginalName/$uniqueName";
            $request['img_url'] = $filePath;

            $pathToUpload = ( $this->variables->awsFolderName() )."/".$fileOriginalName;
            Storage::disk('s3')->put($pathToUpload, $fileObj, "public");
        }

        $product = Products::create($request->except(['product_img']));
        if($this->isAdmin()){
            Session::put('success_msg', "Product Added Successfully. You can edit from <a href='/product/".($product->id)."/edit'>here</a>");
        }else{
            Session::put('success_msg', "<p style='color: #1b6d85'>Thank you. Please add more if you can remember</p>");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);

        return view('pages.product.edit', [
            'product'       => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();

        if( $request->file('product_img') ){
            $fileObj = $request->file('product_img');
            $fileOriginalName = $fileObj->getClientOriginalName();
            $uniqueName = $fileObj->hashName();
            $filePath = ( $this->variables->awsFolderName() )."/$fileOriginalName/$uniqueName";
            $request['img_url'] = $filePath;

            $pathToUpload = ( $this->variables->awsFolderName() )."/".$fileOriginalName;
            Storage::disk('s3')->put($pathToUpload, $fileObj, "public");
        }

        unset($request['_token']);
        unset($request['_method']);

        //return $request->except(['product_img']);

        Products::where('id', $id)->update($request->except(['product_img']));

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::findOrFail($id)->delete();

        return redirect()->back();
    }


    private function isAdmin(){
        return (in_array(Auth::id(), [1,2,3,4]));
    }
}

<?php

namespace App\Http\Controllers;

use App\CustomOrder;
use App\Library\Library;
use App\Library\VariableCollection;
use App\Orders;
use App\Processor\Offers;
use App\Processor\OrderControllerHelper;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Mockery\Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $Lib, $offers, $variables, $orderHelper;

    function __construct()
    {
        $this->Lib = new Library();
        $this->offers = new Offers();
        $this->variables = new VariableCollection();
    }

    public function index()
    {
        $orders = Orders::where('browser_id', Cookie::get("browser_id"))->where('status_code', '!=', 20)
            ->orderBy('updated_at', 'desc')->get();
        // status_code < 20 implies -----> customer didn't get the product in hand, i.e. a pending order

        $numberOfProduct = 1;
        foreach ($orders as $order){
            $product = Products::findOrFail($order->product_id);

            $order->product_img_url = $this->variables->awsUrlPrefix()."/".$this->variables->awsBucketName()."/".$product->img_url;
            $order->product_name = $product->name;
            $order->author = $product->author;
            $order->price = $product->price;
            if($numberOfProduct++ > $this->offers->minQtyForFreeDelivery){
                //if more than $minQtyForFreeDelivery product(s)
                $order->delivery_charge = 0;
            }else{
                $order->delivery_charge = $this->offers->getDeliveryCharge($order->quantity);
            }
            $order->discount = $this->offers->getDiscount($order->quantity);
        }

        //return $orders;

        return view('pages.order.index', [
            'orders'        => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = @$_GET['product_id'];
        $product = Products::findOrFail($id);

        $product->product_img_url = $this->variables->awsUrlPrefix()."/".$this->variables->awsBucketName()."/".$product->img_url;

        return view('pages.order.create', [
            'product'       => $product,
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

        //return $request->all();
        $order = Orders::create($request->all());

        $data['order'] = $order;
        $product = Products::find($request['product_id']);
        $order['product'] = $product;
        $order['shipping_cost'] = $this->offers->getDeliveryCharge($order->quantity);
        $order['discount'] = $this->offers->getDiscount($order->quantity);
        $this->orderHelper = new OrderControllerHelper();
        $this->orderHelper->sendMailOnCreate($data);

        return redirect('/order')->withCookie(cookie("browser_id", $request['browser_id'], 60*24*365*2));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show single details
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkOrder = Orders::where('browser_id', Cookie::get("browser_id"))->where('id', $id)->get();
        if(count($checkOrder) == 0 ){
            return abort(401);
        }

        $order = Orders::findOrFail($id);
        $order['product'] = Products::findOrFail($order->product_id);

        $order->product_img_url = $this->variables->awsUrlPrefix()."/".$this->variables->awsBucketName()."/".$order['product']->img_url;
        $order['pricingCalculator'] = $this->Lib->getPricingCalculation($order->quantity);

        //return $order;

        return view('pages.order.edit', [
            'order'       => $order,
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

        unset($request['_token']);
        unset($request['_method']);
        Orders::where('id', $id)->update($request->all());
        return redirect('/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Orders::find($id)->update(['deleted_at' => Carbon::now()]);

        Orders::find($id)->delete();
        return redirect()->back();
    }

    public function showInvoice(){
        return view('pages.mail.invoice');
    }

    public function requestCustomOrder(Request $request){
        unset($request['_token']);
        try{
            CustomOrder::create($request->all());

            echo 'success';
        }catch (Exception $e){}
    }
}

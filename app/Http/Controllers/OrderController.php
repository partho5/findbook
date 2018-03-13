<?php

namespace App\Http\Controllers;

use App\Library\Library;
use App\Orders;
use App\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $Lib;

    function __construct()
    {
        $this->Lib = new Library();
    }

    public function index()
    {
        $orders = Orders::orderBy('updated_at', 'desc')->get();
        //return $orders;
        foreach ($orders as $order){
            $product = Products::findOrFail($order->product_id);
            $order->product_name = $product->name;
            $order->author = $product->author;
            $order->price = $product->price;
        }

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

        return redirect('/order');
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
        $order = Orders::findOrFail($id);
        $order['product'] = Products::findOrFail($order->product_id);
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
}

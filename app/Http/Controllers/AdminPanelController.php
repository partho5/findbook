<?php

namespace App\Http\Controllers;

use App\Library\VariableCollection;
use App\Orders;
use App\Processor\OrderControllerHelper;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{

    private $orderHelper, $variables;

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
        $orders = Orders::where('status_code', '<', 20)->Where('status_code', '>', 0)->get();
        // 0=cancel , 20=You received product in hand
        $this->orderHelper = new OrderControllerHelper();
        $orders = $this->orderHelper->completeOrderInfoForAdmin($orders);

        $this->variables = new VariableCollection();
        $orderStatus = $this->variables->orderStatus();

        //return $orders;

        return view('pages.admin.orders', [
            'orders'        => $orders,
            'orderStatus'   => $orderStatus,
        ]);
    }

    public function saveOrderStatus(Request $request){
        $orderId = $request['orderId'];
        $selectedStatus = $request['selectedStatus'];
        Orders::where('id', $orderId)->update(['status_code' => $selectedStatus]);
        echo 'success';
    }
}

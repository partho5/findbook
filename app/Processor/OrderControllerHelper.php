<?php
/**
 * Created by PhpStorm.
 * User: partho
 * Date: 3/26/18
 * Time: 1:19 PM
 */

namespace App\Processor;


use App\Library\VariableCollection;
use App\Products;
use Illuminate\Support\Facades\Mail;

class OrderControllerHelper
{

    private $variables, $offers;

    function __construct()
    {
        $this->variables = new VariableCollection();
    }


    public function sendMailOnCreate($data){

        //dd($data);

        Mail::send('pages.mail.invoice', $data, function ($mail) use ($data){
            $mail->from($this->variables->sendMailFrom, "FindBook");
            $mail->to($data['order']['email'])->subject($this->variables->mailSubjectOnCreateOrder);
        });
    }
    
    
    public function completeOrderInfo($orders){
        $numberOfProduct = 1;
        foreach ($orders as $order){
            $product = Products::findOrFail($order->product_id);

            $order->product_img_url = $this->variables->awsUrlPrefix()."/".$this->variables->awsBucketName()."/".$product->img_url;
            $order->product_name = $product->name;
            $order->author = $product->author;
            $order->price = $product->price;
            $this->offers = new Offers();
            if($numberOfProduct++ > $this->offers->minQtyForFreeDelivery){
                //if more than $minQtyForFreeDelivery product(s)
                $order->delivery_charge = 0;
            }else{
                $order->delivery_charge = $this->offers->getDeliveryCharge($order->quantity);
            }
            $order->discount = $this->offers->getDiscount($order->quantity);
            $order->total_payable = $order->price * $order->quantity + $order->delivery_charge - $order->discount;
        }

        return $orders;
    }


    public function completeOrderInfoForAdmin($orders){
        foreach ($orders as $order){
            $product = Products::findOrFail($order->product_id);

            $order->product_img_url = $this->variables->awsUrlPrefix()."/".$this->variables->awsBucketName()."/".$product->img_url;
            $order->product_name = $product->name;
            $order->author = $product->author;
            $order->price = $product->price;
            $this->offers = new Offers();
            $order->delivery_charge = $this->offers->getDeliveryCharge($order->quantity);
            $order->discount = $this->offers->getDiscount($order->quantity);
            $order->total_payable = $order->price * $order->quantity + $order->delivery_charge - $order->discount;
        }

        return $orders;
    }
}
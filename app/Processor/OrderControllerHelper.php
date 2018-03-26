<?php
/**
 * Created by PhpStorm.
 * User: partho
 * Date: 3/26/18
 * Time: 1:19 PM
 */

namespace App\Processor;


use App\Library\VariableCollection;
use Illuminate\Support\Facades\Mail;

class OrderControllerHelper
{

    private $variavles;

    function __construct()
    {
        $this->variavles = new VariableCollection();
    }


    public function sendMailOnCreate($data){

        //dd($data);

        Mail::send('pages.mail.invoice', $data, function ($mail) use ($data){
            $mail->from($this->variavles->sendMailFrom, "FindBook");
            $mail->to($data['order']['email'])->subject($this->variavles->mailSubjectOnCreateOrder);
        });
    }
}
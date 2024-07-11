<?php

namespace App\Services\Api;

use App\Mail\SendMail;
use App\Services\BaseService;
use Illuminate\Support\Facades\Mail;

class EmailService extends BaseService
{
    //*** Getting Blogs Start here ***//
    public function emailsendServices($request){
        $quotationMailData = [
            'email' => $request["email"],
            'name' => $request["name"],
            'phone' => $request["phone"],
            'service' => $request["service"],
            'requirement' => $request["requirement"]
        ];
        $user=env('MAIL_RECIPIENT','meharmani212@gmail.com');
        Mail::to($user)->send(new SendMail($quotationMailData));
        return ('Success! Email has been sent successfully.');
    }

}

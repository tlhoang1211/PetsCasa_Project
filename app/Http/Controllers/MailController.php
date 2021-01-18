<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{


    public function customer_regis_receive_mail(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
        ]);
        $mail = new Mail();
        $findByEmail = Mail::where("Email", "=", $request->Email)->where('Status', '=', 1)->get();
        if (isset($findByEmail) && sizeof($findByEmail) == 0) {
            $mail['Email'] = $request->Email;
            $mail['Status'] = 1;
            $mail->save();
            return redirect(route('success'));
        } else return redirect(route('error'));
    }
}

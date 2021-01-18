<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = array('name' => "$request->name", 'contact_message' => "$request->contact_message", 'transaction' => 'as');
        Mail::send('user.contact.email', $data, function ($message) use ($request) {
            $message->to("$request->email", "$request->name")->subject("$request->subject");
            $message->from("petscasavn@gmail.com", "Pet Casa");
        });
        return redirect(route('success'));
    }

    public function report_send(Request $request)
    {
//        dd($request);
        $report = DB::transaction(function () use ($request) {
            $request->validate([
                'PhoneNumber' => 'required|numeric',
                'Address'     => 'required',
            ], [
                'PhoneNumber.required' => 'Vui lòng điền số điện thoại để chúng tôi có thể liên lạc với bạn',
                'Address.required'     => 'Vui lòng điền địa chỉ để chúng tôi có mặt tại địa điểm sớm nhất',
            ]);
//            dd("Stop here SendMailController@report_send");
            $report = new Report($request->all());
            if (!$request->has('FullName') || $request->FullName == null) {
                $report['FullName'] = "Không có tên";
            }
            if ($request->has('Messenger') && $request->Messenger != null) {
                $report['Content'] = $request->Messenger;
            } else {
                $report['Content'] = "Không có nội dung";
            }
            if ($request->has('thumbnails')) {
                foreach ($request->thumbnails as $thumb) {
                    $report['Thumbnails'] .= $thumb . ",";
                }
            } else {
                $report['Thumbnails'] = "PetCasa/noimages_aaqvrt_opnyoy.png";
            }
            $report['Status'] = 0;
//            dd($report);
            $report->save();
//            dd($request->PhoneNumber);
//            dd("Start send notification");
            /* Start Send notification to admin */
            /* Gmail */
            $Messenger = "Có một yêu cầu báo cáo mới ! Yêu cầu quản lý vào kiểm tra";
            $Name      = "Yêu cầu hỗ trợ";
            $data      = array('name' => "$Name", 'contact_message' => "$Messenger", 'transaction' => 'as');
            Mail::send('user.contact.email', $data, function ($message) use ($request) {
                $message->to("petscasavn@gmail.com", "Pet Casa")->subject("Báo cáo yêu cầu hỗ trợ");
                $message->from("t1908e@gmail.com", "$request->FullName");
            });
            /* Telegram */
            $contentTele     = "\n + Tại khu vực : $request->Address " . "\n + Họ và tên : $request->FullName " . "\n + Số điện thoại : $request->PhoneNumber" . "\n + Nội dung : $request->Messenger";
            $contentTeleSend = urlencode("Báo cáo mới \n- Từ: $request->FullName  \n- Nội dung: " . $contentTele);
            $roomId          = -1001421358819;
            $bot_token       = "bot1325493252:AAHl6t46WUA-xB2Q6VeqC8CPb-vRmqcy4DI";
            //            $url = "https://api.telegram.org/bot1325493252:AAHl6t46WUA-xB2Q6VeqC8CPb-vRmqcy4DI/sendMessage?chat_id=-1001421358819&text='Xin Chào'";
            $url     = "https://api.telegram.org/$bot_token/sendMessage?chat_id=$roomId&text=$contentTeleSend";
            $urldone = file_get_contents($url);
            /* End Send notification to admin */

            /* Start Send SMS to phoneNumber */
            $basic  = new \Nexmo\Client\Credentials\Basic('8c320b03', 'WiVYqmFnHapIR69j');
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to'   => "$request->PhoneNumber",
                'from' => 'Pet Casa',
                'text' => 'Thank you for contacting us! Your support request has been submitted. We will process your request as soon as possible! Thanks for trusting us <3!'
            ]);
            /* End Send SMS to phoneNumber */

            return $report;
        });
        return redirect('success');
    }
}

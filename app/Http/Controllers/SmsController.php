<?php

namespace App\Http\Controllers;

class SmsController extends Controller
{
    // Failed Twillo
    public function sendSms()
    {
        $to           = "0583788236";
        $accountSid   = env('TWILIO_ACCOUNT_SID', 'AC5e5fc8b99fa780631baf61667b62ca7a');
        $authToken    = env('TWILIO_AUTH_TOKEN', 'b85ea72b083116710b56d1ea4fc37c04');
        $twilioNumber = env('TWILIO_NUMBER', '+13604696773');

        $client = new Client($accountSid, $authToken);

        try {
            $client->messages->create(
                $to,
                [
                    "body" => "Test mail",
                    "from" => $twilioNumber
                    //   On US phone numbers, you could send an image as well!
                    //  'mediaUrl' => $imageUrl
                ]
            );
            Log::info('Message sent to ' . $twilioNumber);
        } catch (TwilioException $e) {
            Log::error(
                'Could not send SMS notification.' .
                ' Twilio replied with: ' . $e
            );
        }
    }

    // Success Vonage
    public function Nexom_SmS()
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('8c320b03', 'WiVYqmFnHapIR69j');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to'   => '84583788236',
            'from' => 'Pet Casa',
            'text' => 'Hello from Vonage SMS API'
        ]);
    }


}
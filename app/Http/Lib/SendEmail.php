<?php
namespace App\Http\Lib;
use GuzzleHttp\Client;
class SendEmail
{
    public static function SendOtp($messageData=null)
    {
        $mailjetApiKey = env('MAILJET_API_KEY');
        $mailjetApiSecret = env('MAILJET_SECRET_KEY');
        $mailjetUrl = 'https://api.mailjet.com/v3.1/send';
        //accepted message data
        $messageData = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => 'no-reply@otp.arti-help-desk',
                        'Name' => 'Arti Help Desk',
                    ],
                    'To' => [
                        [
                            'Email' => 'md.sahadathossain.ld@gmail.com',
                            'Name' => 'ARTI HELP-DESK',
                        ],
                    ],
                    'Subject' => 'OTP Verification',
                    'TextPart' => "Your OTP is: 554533",
                    'HTMLPart' => "<p>Your OTP is: <strong>552578</strong></p>",
                ],
            ],
        ];
        try {
            $client = new Client([
                'base_uri' => $mailjetUrl,
                'auth' => [$mailjetApiKey, $mailjetApiSecret],
            ]);
            $response = $client->post('', [
                'json' => $messageData,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);
            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);
            return [
                'success' => $statusCode === 200,
                'response' => $responseBody,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }
}
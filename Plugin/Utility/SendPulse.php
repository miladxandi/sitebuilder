<?php


namespace Plugins\Utility;


use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

trait SendPulse
{
    public static $client_id='bcf631348340df1a8c097c8910acb33b',
        $client_secret='99edc8a03baa42283d92dbc9028d9ac9',
        $access_token='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjUxN2I1ODNmMmYxNDgzY2NmYWM5NjlhZTcwZTMxMGI1OTU0NzNmMWZmYTQxYjQzN2Q2NjA4NGU0YWNlYWM3NWRmNWYxNDk5ODYyMzg0YmIzIn0.eyJhdWQiOiJiY2Y2MzEzNDgzNDBkZjFhOGMwOTdjODkxMGFjYjMzYiIsImp0aSI6IjUxN2I1ODNmMmYxNDgzY2NmYWM5NjlhZTcwZTMxMGI1OTU0NzNmMWZmYTQxYjQzN2Q2NjA4NGU0YWNlYWM3NWRmNWYxNDk5ODYyMzg0YmIzIiwiaWF0IjoxNjQzNTUzODI3LCJuYmYiOjE2NDM1NTM4MjcsImV4cCI6MTY0MzU1NzQyNywic3ViIjoiIiwic2NvcGVzIjpbXSwidXNlciI6eyJpZCI6Nzk0OTM1MiwiZ3JvdXBfaWQiOm51bGwsInBhcmVudF9pZCI6bnVsbCwiYXJlYSI6InJlc3QifX0.kxRozTI_3R1qQOnmjB8A7JRFkQQY6Ch6duCyXhBekdftWFfccuPruqtab5bw3Exf-aeBsJOvBSB2ZOypLSYcRRTZYmGRiVPSpdQ_acY22_kpPnjqjXR154iUS5p5P-u4T5XTMiXZ7hWoERLMqUlVjieRseyPnUsu8GOuSdu5wuFnIcUXR1g9cv-RIty6y4g4mn3euSgW06U5o6UonW3GTg2A1uszYUxsnKnazocZP6pA-qVeLhNMMy_0ek3Ew-hllMHpB1N0BgSmZrPDLmHn8Wg5Lsbz_d8q5aRZSnq6sx-lw6m2CZ_QvoIW94_leGACbF1ZoCDlYGP6Q64JdqVMZQ',
        $base_address='https://api.sendpulse.com/';


    public static function makeAcessToken()
    {
        $client = new Client();
        $response =$client->post(self::$base_address.'oauth/access_token',[
            RequestOptions::JSON=>[
                'grant_type'=>'client_credentials',
                'client_id'=>self::$client_id,
                'client_secret'=>self::$client_secret,
            ]
        ])->getBody()->getContents();
        return json_decode($response);
    }

    public static function sendEmail($id,$name,$email)
    {
        $client = new Client();
        $response =$client->post(self::$base_address.'smtp/emails',[
            RequestOptions::JSON=>[
                'email'=>[
                    'text'=>'http://localhost:8000/api/email/verification/verify?token='.self::encrypt($id,123456789),
                    'subject'=>'Webker Email Verification',
                    'from'=>[
                        'name'=>'eastCloud',
                        'email'=>'test@eastcloud.ir',
                    ],
                    'to'=>[
                        [
                            'name'=>$name, 'email'=>$email,
                        ]
                    ]
                ]
            ],
            RequestOptions::HEADERS=>[
                'Authorization'=>'Bearer '.self::$access_token
            ]
        ])->getBody()->getContents();
        return json_decode($response);
    }

    public static function encrypt($plainText, $key) {
        $secretKey = md5($key);
        $iv = substr( hash( 'sha256', "aaaabbbbcccccddddeweee" ), 0, 16 );
        $encryptedText = openssl_encrypt($plainText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $iv);
        return base64_encode($encryptedText);
    }

    //Decrypt Function
    public static function decrypt($encryptedText, $key) {
        $key = md5($key);
        $iv = substr( hash( 'sha256', "aaaabbbbcccccddddeweee" ), 0, 16 );
        $decryptedText = openssl_decrypt(base64_decode($encryptedText), 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
        return $decryptedText;
    }
}

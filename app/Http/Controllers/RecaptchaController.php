<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class RecaptchaController extends Controller
{
    const RECAPTCHA_ERRORS = array(
        'missing-input-secret' => 'The secret parameter is missing.',
        'invalid-input-secret' => 'The secret parameter is invalid or malformed.',
        'missing-input-response' => 'The response parameter is missing.',
        'invalid-input-response' => 'The response parameter is invalid or malformed.',
        'bad-request' => 'The request is invalid or malformed.',
        'timeout-or-duplicate' => 'The response is no longer valid: either is too old or has been used previously.'
    );

    public function verify($response, $ip)
    {
        try {
            $recaptchaResponseObj = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', array(
                'secret' => env('MIX_GOOGLE_CAPTCHA_SECRET_KEY'),
                'response' => $response,
                'remoteip' => $ip
            ));
            $recaptchaResponse = json_decode($recaptchaResponseObj->body());
            if (!$recaptchaResponse->success) {
                $recaptchaResponseArr = (array)$recaptchaResponse;
                $recaptchaErrorsObj = self::RECAPTCHA_ERRORS;
                $errorMsgObj = array_map(function ($elm) use (&$recaptchaErrorsObj) {
                    return $recaptchaErrorsObj[$elm];
                }, $recaptchaResponseArr['error-codes']);

                $recaptchaResponse->errors = $errorMsgObj;
            }
        } catch (RequestException | ConnectionException $exception) {
            $recaptchaResponse = null;
        }
        return $recaptchaResponse;
    }
}

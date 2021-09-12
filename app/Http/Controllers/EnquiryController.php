<?php

namespace App\Http\Controllers;

use App\Mail\Enquiries;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function index()
    {
    }

    public function saveEnquiry(Request $request)
    {

        $recaptchaResponse = (new RecaptchaController())->verify($request->input('recaptcha_token'), (new Request)->ip());

        if ($recaptchaResponse->success) {

            $name = $request->input('name') ? $request->input('name') :
                $request->input('fname') . ' ' . $request->input('lname');

            $enquiry = Enquiry::create([
                'enquiry_type' => $request->input('enquiry_type'),
                'name' => $name,
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'query' => $request->input('query'),
                'source' => $request->input('source'),
                'destination' => $request->input('destination'),
                'depart_date' => date("Y-m-d", strtotime($request->input('departDate'))),
                'return_date' => date("Y-m-d", strtotime($request->input('returnDate'))),
                'adults' => $request->input('adults'),
                'children' => $request->input('children'),
                'infants' => $request->input('infants'),
                'cabin' => $request->input('cabin'),
                'carrier' => $request->input('carrier'),
                'accept_privacy' => $request->input('accept_privacy'),
            ]);

            $enquiryRef = Enquiry::find($enquiry->id);
            $enquiryRef->reference_id = str_replace('_', '', $enquiry->enquiry_type) . $enquiry->id;
            $enquiryRef->save();

            Mail::to($enquiry->email)->cc([
                'sales@bestflightdeals.co.uk',
                'info@bestflightdeals.co.uk',
                'admin@bestflightdeals.co.uk'
            ])->send(new Enquiries($enquiryRef));
            $recaptchaResponse->enquiry = $enquiry->id;
        }
        return (array)$recaptchaResponse;

    }
}

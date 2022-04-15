<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation_request;
use Validator;

class DonationsController extends Controller
{
    use ApiResponseTrait;

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required' ,
            'patient_phone' => 'required',
            'age' => 'required',
            'bag_blood_number' => 'required | numeric',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'hints' => 'required',
            'blood_type_id' => 'required| numeric',
            'city_id' => 'required| numeric',

        ]);
        if ($validator->fails()){

            return $this->apiResponse(null ,$validator->errors(),400);

        }
        $donation = Donation_request::Create( $request->all() );
        if($donation){

        return $this->apiResponse($donation ,'Donation request send successfully', 200);
            
        }
        return $this->apiResponse(null ,'Something error try again please.', 200);


    }

    public function donationsList(){
        $donations = Donation_request::all();
        return $this->apiResponse($donations ,'All donations requests', 200);

    }
    public function showDonation(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required| numeric',

        ]);
        if ($validator->fails()){

            return $this->apiResponse(null ,$validator->errors(),400);

        }
        $donation = Donation_request::find($request->id);
        return $this->apiResponse($donation ,'donation you orderd to show', 200);

    }
}
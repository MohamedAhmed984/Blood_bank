<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation_request extends Model 
{

    protected $table = 'donation_requests';
    protected $fillable = ['patient_name','patient_phone','age','bag_blood_number','hospital_name','hospital_address','longitude','latitude','hints','blood_type_id','city_id'];
    public $timestamps = true;

    public function blood_type()
    {
        return $this->belongsTo('Blood_type');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function notifications()
    {
        return $this->hasMany('Notification');
    }

}
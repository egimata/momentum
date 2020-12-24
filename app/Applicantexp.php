<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicantexp extends Model
{
    //
    public function applicant(){
        return $this->belongsTo('App\Applicant');
    }
}

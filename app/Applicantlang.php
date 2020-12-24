<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicantlang extends Model
{
    //
    public function applicant(){
        return $this->belongsTo('App\Applicant');
    }
}

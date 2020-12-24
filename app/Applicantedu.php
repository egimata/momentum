<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicantedu extends Model
{
    //
    public function applicant(){
        return $this->belongsTo('App\Applicant');
    }
}

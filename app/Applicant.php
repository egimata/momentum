<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    public function career(){
        return $this->belongsTo('App\Career');
    }

    public function applicantedus(){
        return $this->hasMany('App\Applicantedu');
    }

    public function applicantexps(){
        return $this->hasMany('App\Applicantexp');
    }

    public function applicantlangs(){
        return $this->hasMany('App\Applicantlang');
    }


}

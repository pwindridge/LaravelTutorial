<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class);
    }
}

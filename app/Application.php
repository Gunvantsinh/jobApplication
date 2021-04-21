<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function workExperiances()
    {
        return $this->hasMany(Workexperiance::class);
    }
}

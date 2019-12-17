<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicereport extends Model
{
    protected $fillable=['servicenum','equipment_id','servicedate','serviceduedate','servicereason','servicedby','phone','email'];

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }
}

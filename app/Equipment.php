<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable=['equipnumber','equipname','make','purchasedate','status','user_id','location_id'];

    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function servicereport(){
        return $this->hasMany(Servicereport::class);
    }
}

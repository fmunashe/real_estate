<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded=[];

    public function stands($id){
        $checks = Stand::all()->where('is_deleted', 0)->where('location_id',$id);
        return $checks;
    }
}

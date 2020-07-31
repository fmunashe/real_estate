<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stand extends Model
{
    protected $guarded = [];
    protected $table = "stands";

//    use SoftDeletes;

    public function location($id)
    {
        $names = Location::query()->where('id', $id)->first();
        return $names->name;
    }

    public function pay($stand_id){

        $pay=StandDetail::query()->where('stand_id',$stand_id)->first();
        return $pay;
    }
}

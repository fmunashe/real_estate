<?php

namespace App\Imports;

use App\Models\Stand;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StandsImport implements ToModel, WithHeadingRow
{

    public $location_id;

    public function __construct($location_id)
    {
        $this->location_id = $location_id;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user_id = Auth::id();
        $check=Stand::query()
            ->where('stand_number',$row['stand_number'])
            ->where('location_id',$this->location_id)
            ->where('is_deleted',0)
            ->exists();
        $check1=Stand::query()
            ->where('stand_number',$row['stand_number'])
            ->where('location_id',$this->location_id)
            ->where('is_deleted',1)
            ->first();
        if ($check) {

        }
        elseif ($check1){
          $check1->update([
              'is_deleted'=>0,
          ]);
        }
        else {
            return new Stand([
                'stand_number' => $row['stand_number'],
                'size' => $row['size'],
                'location_id' => $this->location_id,
                'created_by' => $user_id,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}

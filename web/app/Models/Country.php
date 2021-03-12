<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function items()
        {
            $items = [];
            $items[] = ['id'=>0,'name'=>'-- select --'];
            $result = \DB::table('countries')
                ->select('*')
                ->orderBy('briefname','asc')
                ->get();

            foreach($result as $one)
                $items[]=[
                    'id'=>$one->id,
                    'name'=>$one->briefname.' ('.$one->english.')'
                ];

            return $items;

        }
}

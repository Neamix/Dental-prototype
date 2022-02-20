<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    public function upsertInstance($data)
    {
        $assessment = self::updateOrCreate(
            ['id' => $data->id],
            [
                'diagnosis' =>$data->diagnosis,
                'prescription' => $data->prescription,
            ]
        );

        return $assessment;
    }

    public function deleteInstance()
    {
        $this->delete();
    }


    public function appoiment() 
    {
        return $this->belongsTo(Appoiment::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}

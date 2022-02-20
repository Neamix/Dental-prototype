<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function upsertInstance($data)
    {
        $patient = self::updateOrCreate(
            ['id' => $data->id],
            [
                'name' => $data->name,
                'phone' => $data->phone,
                'email' => $data->email,
                'age'   => $data->age
            ]
        );

        return $patient;
    }

    public function deleteInstance()
    {
        $this->delete();
    }
}

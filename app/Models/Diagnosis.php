<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function upsertInstance($data)
    {
        self::create(
            [
                'diagnosis'  => $data['diagnosis'],
                'appoiment_id' => $data['appoiment']->id
            ]);
        }

    public function deleteInstance()
    {
        $this->delete();
    }
}

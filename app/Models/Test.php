<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $guarded = [];


    static function upsertInstance($data)
    {
        self::create(
            [
                'test'  => $data['test'],
                'appoiment_id' => $data['appoiment']->id
            ]);
        }

    public function deleteInstance()
    {
        $this->delete();
    }
}

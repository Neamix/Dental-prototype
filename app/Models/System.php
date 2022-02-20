<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function upsertInstance($data)
    {
        self::updateOrCreate(
            ['key' => $data->key],
            [
                'value' => $data->value
            ]
        );
    }

    public function deleteInstance()
    {
        $this->delete();
    }

}

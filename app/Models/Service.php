<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    static function upsertInstance($data)
    {
        $service = self::updateOrCreate(
        ['id' => $data->id],
        [
            'name'  => $data->name,
            'fees' => $data->fees,
        ]);

        return $service;
    }

    public function deleteInstance()
    {
        $this->delete();
    }

    public function appoiments()
    {
        return $this->belongsToMany(Appoiment::class)->withPivot(['number','fees']);
    }

}

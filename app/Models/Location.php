<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['nama_lokasi', 'keterangan'];
    protected $table = 'locations';

    public function asets()
    {
        return $this->hasMany(Aset::class, 'location_id');
    }
}

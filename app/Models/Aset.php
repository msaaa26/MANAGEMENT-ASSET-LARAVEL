<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $fillable = ['kode_aset', 'nama_aset', 'category_id', 'location_id', 'kondisi', 'jumlah'];
    protected $table = 'asets';

    // relasi dengan Category dan lokasi
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }


}

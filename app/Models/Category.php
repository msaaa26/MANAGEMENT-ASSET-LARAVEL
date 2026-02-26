<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama_kategori'];
    protected $table = 'categories';

    public function asets()
    {
        return $this->hasMany(Aset::class, 'kategori_id');
    }

}
